<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ISaranRepository as BaseCrud;
use Excel;

class UISaranController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.saran.saran_list')->with('list',$list);
    }

    public function add(){
        return view('modules.saran.saran_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.saran.saran_view')->with('object', $object);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.saran.saran_edit')->with('object', $object);
    }

    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('saran', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'id', 'nis','santri', 'pesan', 'tanggapan','staff'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->id, 
                        $value->getSantri()->nomor_induk, 
                        $value->getSantri()->nama, 
                        $value->pesan, 
                        $value->tanggapan,
                        $value->getStaff()->name
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }

    public function jawab($id){
        $object = $this->crud->get($id);
        return view('modules.saran.saran_tanggapi')->with('object', $object);
    }
}
