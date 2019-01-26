<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Traits\Report;
use App\Repositories\IPesertaRepository;
use App\Repositories\IKelasRepository;

class UILaporanController extends Controller
{    
    use Report;

    protected $crud;
    protected $crudKelas;
    
    public function __construct(IPesertaRepository $c, IKelasRepository $k) {
        $this->crud = $c;
        $this->crudKelas = $k;
        $this->middleware('auth');  
    }

    public function index(){
        return view('modules.laporan.laporan_list');
    }

    public function showFormJadwal(){
        // $listKelas = $this->crudKelas->all();
        // $ids = array();
        // foreach ($listKelas as $key => $value) {
        //     $value['peserta'] = $this->crudKelas->getListPeserta($value->id);
        // }
        // return $this->showPDF('modules.laporan.laporan_jadwal', array('data'=>$listKelas), 'jadwal.pdf','');
        return 'coming soon';
    }


    /**
    *   @override 
    *   replace method customPaper in Report Trait
    */
    protected function customPaper($pdf){
        $pdf->setPaper('a4', 'landscape')->setWarnings(true);
        return $pdf;
    }

}
