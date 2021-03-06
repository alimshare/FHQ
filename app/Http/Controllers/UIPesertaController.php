<?php

namespace App\Http\Controllers;

use App\Repositories\IPesertaRepository as BaseCrud;
use App\Repositories\IKelasRepository;
use Excel;

class UIPesertaController extends Controller
{
    protected $crud;
    protected $crudKelas;
    
    public function __construct(BaseCrud $c, IKelasRepository $k) {
        $this->crud = $c;
        $this->crudKelas = $k;
        $this->middleware('auth');  
    }

    public function index(){
        $listKelas = $this->crudKelas->all();
        $ids = array();
        foreach ($listKelas as $key => $value) {
            $ids[] = $value->id;
        }
        $list      = $this->crud->getPesertaByKelasInSemesterActive($ids);
        return view('modules.peserta.peserta_list')->with('list',$list);
    }

    public function add(){
        return view('modules.peserta.peserta_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        $listInfaq = $object->getInfaq();
        return view('modules.peserta.peserta_view')->with('object', $object)->with('list', $listInfaq);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.peserta.peserta_edit')->with('object', $object);
    }

    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('Peserta', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'Semester','Level','Pengajar','Hari', 'NIS', 'Nama'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->getKelas()->getSemester()->nama, 
                        $value->getKelas()->getLevel()->nama, 
                        $value->getKelas()->getPengajar()->nama, 
                        $value->getKelas()->hari,
                        $value->getSantri()->nomor_induk,
                        $value->getSantri()->nama
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
        // ->export('xlsx'); // to xlsx
    }
    
}
