<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IKelasRepository as BaseCrud;
use Excel;

class UIKelasController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.kelas.kelas_list')->with('list',$list);
    }
    
    public function add(){
        return view('modules.kelas.kelas_add');
    }

    public function view($id){
        $object  = $this->crud->get($id);
        $listPeserta    = $object->getPeserta();
        return view('modules.kelas.kelas_view')->with('object', $object)->with('list',$listPeserta);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.kelas.kelas_edit')->with('object', $object);
    }

    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('Kelas', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'semester', 'level', 'pengajar', 'hari'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->getSemester()->nama, 
                        $value->getLevel()->nama, 
                        $value->getPengajar()->nama, 
                        $value->hari
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }
}
