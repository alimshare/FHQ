<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ILevelRepository as BaseCrud;
use Excel;
use DataTables;

class UILevelController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        return view('modules.level.level_list');
    }

    public function datatables(){
        $list = $this->crud->all();

        return Datatables::of($list)
        ->addColumn('action', function($list){
            return '<a href="'. url('/level/view/'.$list->id) .'" class="btn btn-outline-primary btn-sm">View</a>
                    <a href="'. url('/level/edit/'.$list->id) .'" class="btn btn-success btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal" data-target="#dangerModal" data-id="'. $list->id .'">Delete</button>
                  ';
        })
        ->make(true);
    }
    
    
    public function add(){
        return view('modules.level.level_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.level.level_view')->with('object', $object);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.level.level_edit')->with('object', $object);
    }    

    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('Level', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'tingkatan', 'deskripsi'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->nama, 
                        strip_tags($value->deskripsi)
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }
}
