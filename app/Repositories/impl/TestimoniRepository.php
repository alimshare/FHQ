<?php 

namespace App\Repositories\impl;

use App\Repositories\ITestimoniRepository;
use App\Repositories\impl\CRUDRepository;

class TestimoniRepository extends CRUDRepository implements ITestimoniRepository
{
    protected $modelClz = 'App\Model\Testimoni';
	
}
