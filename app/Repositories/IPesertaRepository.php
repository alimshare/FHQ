<?php 

namespace App\Repositories;

use App\Repositories\ICRUDRepository;

interface IPesertaRepository extends ICRUDRepository
{
	public function getPesertaByNIS($nomor_induk);	
	public function getPesertaByKelasInSemesterActive($ids);
}
