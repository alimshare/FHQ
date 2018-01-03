<?php 

namespace App\Repositories;

use App\Repositories\ICRUDRepository;

interface IKelasRepository extends ICRUDRepository
{
	public function detail();	
}
