<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IKelasRepository;
use App\Repositories\IPesertaRepository;

use App\Service\PesertaService;

class HomeController extends Controller
{

    protected $crudKelas;
    protected $pesertaService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IKelasRepository $k)
    {
        $this->crudKelas    = $k;
        $this->pesertaService     = new PesertaService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = new $this->crudKelas;
        $kelas = $kelas->all()->count();

        $peserta = $this->pesertaService->getPesertaByKelasInSemesterActive()->count();

        $count = array(
            'santri'    => \App\Model\Santri::count(),
            'pengajar'  => \App\Model\Pengajar::count(),
            'kelas'     => $kelas,
            'peserta'   => $peserta
        );
        
        return view('other.sample')->with('count', $count);
    }
}
