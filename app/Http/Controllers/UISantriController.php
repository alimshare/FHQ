<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ISantriRepository as BaseCrud;
use Excel;
use DataTables;

class UISantriController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        return view('modules.santri.santri_list');
    }

    public function datatables(){
        $list = $this->crud->all();

        return Datatables::of($list)
        ->editColumn('jenis_kelamin', function($list){
            return $list->jenis_kelamin == 'L' ? 'Ikhwan' : 'Akhwat';
        })
        ->addColumn('action', function($list){
            return '<a href="'. url('/santri/view/'.$list->id) .'" class="btn btn-outline-primary btn-sm">View</a>
                    <a href="'. url('/santri/edit/'.$list->id) .'" class="btn btn-success btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal" data-target="#dangerModal" data-id="'. $list->id .'">Delete</button>
                  ';
        })
        ->make(true);
    }
    
    public function add(){
        return view('modules.santri.santri_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.santri.santri_view')->with('object', $object);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.santri.santri_edit')->with('object', $object);
    }

    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('Santri', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'NIS', 'Nama', 'Jenis Kelamin', 'Telepon', 'Email'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->nomor_induk, $value->nama, ($value->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'), $value->telephone, $value->email
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }
}
