<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ITestimoniRepository as BaseCrud;
use Excel;

class UITestimoniController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.testimoni.testimoni_list')->with('list',$list);
    }

    public function add(){
        return view('modules.testimoni.testimoni_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.testimoni.testimoni_view')->with('object', $object);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.testimoni.testimoni_edit')->with('object', $object);
    }

    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('testimoni', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'id', 'nis', 'santri', 'pesan'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->id, 
                        $value->getSantri()->nomor_induk, 
                        $value->getSantri()->nama, 
                        $value->pesan
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }
}
