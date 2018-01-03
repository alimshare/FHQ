<?php 

namespace App\Repositories\impl;

use App\Repositories\IKelasRepository;
use App\Repositories\impl\CRUDRepository;

class KelasRepository extends CRUDRepository implements IKelasRepository 
{
    protected $modelClz = 'App\Model\Kelas';

    public function detail() {
        $list = call_user_func([$this->modelClz,'all']);
        foreach ($list as $key => $object) {
        	$object['semester'] = call_user_func([$object,'getSemester']);
        	$object['level'] 	= call_user_func([$object,'getLevel']);
        	$object['pengajar'] = call_user_func([$object,'getPengajar']);
        }
        return $list;        
    }

}