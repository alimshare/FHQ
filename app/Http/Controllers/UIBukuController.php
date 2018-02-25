<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IBukuRepository as BaseCrud;
use Excel;
use DataTables;

class UIBukuController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        return view('modules.buku.buku_list');
    }

    public function datatables(){
        $list = $this->crud->all();

        return Datatables::of($list)
        ->editColumn('harga', function($list){
            return number_format($list->harga);
        })
        ->addColumn('action', function($list){
            return '<a href="'. url('/buku/view/'.$list->id) .'" class="btn btn-outline-primary btn-sm">View</a>
                    <a href="'. url('/buku/edit/'.$list->id) .'" class="btn btn-success btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm btnDelete" data-toggle="modal" data-target="#dangerModal" data-id="'. $list->id .'">Delete</button>
                  ';
        })
        ->make(true);
    }
    
    
    public function add(){
        return view('modules.buku.buku_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.buku.buku_view')->with('object', $object);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.buku.buku_edit')->with('object', $object);
    }    

    public function export()
    {
        $list = $this->crud->all();

        // if (!count($list)) { return false; }

        Excel::create('Buku', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'judul', 'pengarang', 'harga', 'tahun terbit', 'deskripsi'
                )); 

                $row++;

                // loop list
                foreach ($list as $value) {
                    
                    $sheet->row($row, array(
                        $value->judul, 
                        $value->pengarang, 
                        $value->harga,
                        $value->tahun_terbit,
                        $value->deskripsi
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }
}
