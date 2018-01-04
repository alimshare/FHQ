<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ISemesterRepository as BaseCrud;
use Excel;

class UISemesterController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.semester.semester_list')->with('list',$list);
    }

    public function add(){
        return view('modules.semester.semester_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.semester.semester_view')->with('object', $object);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.semester.semester_edit')->with('object', $object);
    }

    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('Semester', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'semester', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->nama, 
                        $value->deskripsi, 
                        $value->tanggal_mulai, 
                        $value->tanggal_selesai
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }

}
