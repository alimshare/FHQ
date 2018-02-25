<?php 

namespace App\Repositories\impl;

use App\Repositories\IUserRepository;
use App\Repositories\impl\CRUDRepository;

class UserRepository extends CRUDRepository implements IUserRepository
{
    protected $modelClz = 'App\Model\User';
	
}
