<?php 

namespace App\Service;

// use App\Repositories\IPesertaRepository;
// use App\Repositories\IKelasRepository;

use App\Repositories\impl\PesertaRepository;
use App\Repositories\impl\KelasRepository;

class PesertaService
{
	protected $kelasRepo;
	protected $pesertaRepo;

	function __construct()
	{
		$this->pesertaRepo = new PesertaRepository;
		$this->kelasRepo = new KelasRepository;
	}

	public function getPesertaByKelasInSemesterActive(){
        $listKelas = $this->kelasRepo->all();
        $ids = array();
        foreach ($listKelas as $key => $value) {
            $ids[] = $value->id;
        }
        $list      = $this->pesertaRepo->getPesertaByKelasInSemesterActive($ids);

        return $list;			
	}

}

 ?>