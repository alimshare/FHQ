<?php 

namespace App\Repositories\impl;

use App\Repositories\ISantriRepository;
use App\Repositories\impl\CRUDRepository;

class SantriRepository extends CRUDRepository implements ISantriRepository
{
    protected $modelClz = 'App\Model\Santri';
	
}
