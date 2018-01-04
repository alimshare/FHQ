<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IInfaqRepository as BaseCrud;
use Excel;

class UIInfaqController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.infaq.infaq_list')->with('list',$list);
    }

    public function add(){
        return view('modules.infaq.infaq_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.infaq.infaq_view')->with('object', $object);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.infaq.infaq_edit')->with('object', $object);
    }

    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('Infaq', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'Tanggal','NIS','Santri', 'Kelas', 'Pengajar','Nominal'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->tanggal, 
                        $value->getPeserta()->getSantri()->nomor_induk, 
                        $value->getPeserta()->getSantri()->nama, 
                        $value->getPeserta()->getKelas()->getLevel()->nama, 
                        $value->getPeserta()->getKelas()->getPengajar()->nama, 
                        $value->nominal,
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }
}
