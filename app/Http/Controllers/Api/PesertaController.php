<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\IPesertaRepository as BaseCrud;
use App\Http\Controllers\Controller;

class PesertaController extends Controller
{


    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->crud->all();        
        return  response()->json($list);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = $this->crud->get($id);        
        return  response()->json($object);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestBody = $request->json("request");
        $status = $this->crud->insert($requestBody);

        if ($status) {
            return response()->json(['errorCode'=>'00','message' => 'success']);
        } else {
            return response()->json(['errorCode'=>'05','message' => 'failed']);
        }       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestBody = $request->json("request");

        $object = $this->crud->get($id);
        if ($object != "") {
            $status = $this->crud->update($id, $requestBody);
        
            if ($status) {
                return response()->json(['errorCode'=>'00','message' => 'success']);
            } else {
                return response()->json(['errorCode'=>'05','message' => 'failed']);
            }             
        }  else {

            return response()->json(['errorCode'=>'03','message' => 'not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = model::find($id);
        if ($object != "") {

            $status = $object->delete(); 
        
            if ($status) {
                return response()->json(['errorCode'=>'00','message' => 'success']);
            } else {
                return response()->json(['errorCode'=>'05','message' => 'failed']);
            }             
        }  else {

            return response()->json(['errorCode'=>'03','message' => 'not found']);
        }
    }
}
