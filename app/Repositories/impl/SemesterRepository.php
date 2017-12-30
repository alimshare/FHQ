<?php 

namespace App\Repositories\impl;

use App\Repositories\ISemesterRepository;
use App\Repositories\impl\CRUDRepository;

class SemesterRepository extends CRUDRepository implements ISemesterRepository 
{
    protected $modelClz = 'App\Model\Semester';	
}
