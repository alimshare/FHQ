<?php 

namespace App\Repositories\impl;

use App\Repositories\ILevelRepository;
use App\Repositories\impl\CRUDRepository;

class LevelRepository extends CRUDRepository implements ILevelRepository 
{
    protected $modelClz = 'App\Model\Level';
	
}
