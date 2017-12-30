<?php 

namespace App\Repositories\impl;

use App\Repositories\IStaffRepository;
use App\Repositories\impl\CRUDRepository;

class StaffRepository extends CRUDRepository implements IStaffRepository
{
    protected $modelClz = 'App\Model\Staff';
	
}
