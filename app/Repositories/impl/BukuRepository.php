<?php 

namespace App\Repositories\impl;

use App\Repositories\IBukuRepository;
use App\Repositories\impl\CRUDRepository;

class BukuRepository extends CRUDRepository implements IBukuRepository 
{
    protected $modelClz = 'App\Model\Buku';
	
}
