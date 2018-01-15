<?php 

namespace App\Repositories\impl;

use App\Repositories\IPesertaRepository;
use App\Repositories\impl\CRUDRepository;
use App\Repositories\IKelasRepository;

class PesertaRepository extends CRUDRepository  implements IPesertaRepository
{
    protected $modelClz 	  	= 'App\Model\Peserta';
    protected $modelClzSantri 	= 'App\Model\Santri';

	public function getPesertaByNIS($nomor_induk) {
		
        $santri = new $this->modelClzSantri;
        $santri = $santri::where('nomor_induk', '=', $nomor_induk)->first();

        if ($santri != null) {
	        $peserta = new $this->modelClz;
	        $peserta = $peserta::where('id_santri', '=', $santri->id)->get();

	        if (count($peserta) == 0) {
                return ['errorCode'=>'02','message' => 'peserta tidak ditemukan'];
	        }

	        foreach ($peserta as $key => $value) {
	        	$kelas 				= $value->getKelas();
	        	$kelas['level']		= $kelas->getLevel();
	        	$kelas['pengajar']	= $kelas->getPengajar();

	        	$value['kelas']		= $kelas;
	        	$value['santri'] 	= $santri;
	        }
        	
        	return $peserta;

        } else {
            return ['errorCode'=>'01','message' => 'santri tidak ditemukan'];
        }

	}

	/**
	*	@param $ids array of id_kelas in active semester
	*/
	public function getPesertaByKelasInSemesterActive($ids = array()){
		$peserta 	= new $this->modelClz;
        $list   	= $peserta::whereIn('id_kelas',$ids)->get();

        return $list;
	}
	
}
