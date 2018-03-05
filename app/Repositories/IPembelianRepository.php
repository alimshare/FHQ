<?php 

namespace App\Repositories;

use App\Repositories\ICRUDRepository;

interface IPembelianRepository extends ICRUDRepository
{
	public function saveWithDetail(array $model);	
	public function insertDetail(array $model);
}
