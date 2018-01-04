<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ILevelRepository as BaseCrud;
use Excel;

class UILevelController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.level.level_list')->with('list',$list);
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
