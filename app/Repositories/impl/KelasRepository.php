<?php 

namespace App\Repositories\impl;

use App\Repositories\IKelasRepository;
use App\Repositories\impl\CRUDRepository;

class KelasRepository extends CRUDRepository implements IKelasRepository 
{
    protected $modelClz = 'App\Model\Kelas';
    protected $modelClzPeserta  = 'App\Model\Peserta';
    protected $modelClzSemester = 'App\Model\Semester';

    /**
    *   Override: get Kelas by Semester Active
    */
    public function all() {
        $semester = new $this->modelClzSemester;
        $semester = $semester->getActive();

        $data = new $this->modelClz;
        $data = $data::where('id_semester','=',$semester->id)->get();

        return $data;
    }

    public function detail() {
        $list = $this->all();
        foreach ($list as $key => $object) {
        	$object['semester'] = call_user_func([$object,'getSemester']);
        	$object['level'] 	= call_user_func([$object,'getLevel']);
        	$object['pengajar'] = call_user_func([$object,'getPengajar']);
        }
        return $list;        
    }

    public function getListPeserta($id_kelas){
        $object = new $this->modelClzPeserta;
        $listPeserta = $object::where('id_kelas','=',$id_kelas)->get();
        return $listPeserta;
    }

}