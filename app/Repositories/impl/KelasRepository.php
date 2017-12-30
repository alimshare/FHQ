<?php 

namespace App\Repositories\impl;

use App\Repositories\IKelasRepository;
use App\Repositories\impl\CRUDRepository;

class KelasRepository extends CRUDRepository implements IKelasRepository 
{
    protected $modelClz = 'App\Model\Kelas';
	
}
