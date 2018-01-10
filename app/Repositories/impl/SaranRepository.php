<?php 

namespace App\Repositories\impl;

use App\Repositories\ISaranRepository;
use App\Repositories\impl\CRUDRepository;

class SaranRepository extends CRUDRepository implements ISaranRepository
{
    protected $modelClz = 'App\Model\Saran';
	
}
