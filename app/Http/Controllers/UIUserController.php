<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IUserRepository as BaseCrud;
use Excel;
use DataTables;

class UIUserController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();
        return view('modules.user.user_list');
    }

    public function datatables(){
        $list = $this->crud->all();

        return Datatables::of($list)
        ->addColumn('action', function($list){
            return '<a href="'. url('/user/view/'.$list->id) .'" class="btn btn-outline-primary btn-sm">View</a>
                    <a href="'. url('/user/edit/'.$list->id) .'" class="btn btn-success btn-sm">Edit</a>
                    <button class="btn btn-warning btn-sm btnReset" data-toggle="modal" data-target="#resetPasswordModal" data-id="'. $list->id .'">Reset Password</button> '.
                    (($list->id == 1) ? '' :  '<button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal" data-target="#dangerModal" data-id="'. $list->id .'">Delete</button>');
        })
        ->make(true);
    }
    
    public function add(){
        return view('modules.user.user_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.user.user_view')->with('object', $object);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.user.user_edit')->with('object', $object);
    }


    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('user', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'Nama', 'Email'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->name, $value->email
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }

    public function update(Request $request, $id)
    {
        $requestBody = array (
        	'name' => $request->name,
        	'email'=> $request->email
        );

        $object = $this->crud->get($id);
        if ($object != "") {
            $status = $this->crud->update($id, $requestBody);
        
            if ($status) {
                return redirect('user/view/'.$id);
            } else {
                return redirect('user/edit/'.$id)->with('status','failed');
            }             
        }  

        return redirect('user');
    }

    public function remove(Request $request){
        $object = $this->crud->get($request->id);
        if ($object != "") {

            $status = $object->delete(); 
        
            if ($status) {
                return redirect('user')->with('status','failed');
            } else {
                return redirect('user')->with('status','failed');
            } 
        } 

        return redirect('user');
    }


    public function reset_password(Request $request)
    {
        $id = $request->id;

        $requestBody = array (
            'password' => bcrypt('password')
        );

        $object = $this->crud->get($id);
        if ($object != "") {
            $status = $this->crud->update($id, $requestBody);
        
            if ($status) {
                return redirect('user')->with('status','reset password success')->with('type','success');
            } else {
                return redirect('user')->with('status','reset password failed')->with('type','warning');
            }             
        }  

        return redirect('user')->with('status','data not found');
    }
}
