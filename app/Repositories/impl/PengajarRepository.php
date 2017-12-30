<?php 

namespace App\Repositories\impl;

use App\Repositories\IPengajarRepository;
use App\Repositories\impl\CRUDRepository;

class PengajarRepository extends CRUDRepository implements IPengajarRepository 
{
    protected $modelClz = 'App\Model\Pengajar';
	
}
