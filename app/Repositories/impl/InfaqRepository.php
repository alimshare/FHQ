<?php 

namespace App\Repositories\impl;

use App\Repositories\IInfaqRepository;
use App\Repositories\impl\CRUDRepository;

class InfaqRepository extends CRUDRepository implements IInfaqRepository 
{
    protected $modelClz = 'App\Model\Infaq';
}
