<?php 

namespace App\Repositories\impl;

use App\Repositories\ICRUDRepository;

class CRUDRepository implements ICRUDRepository
{
    protected $modelClz;

	public function all() {
        return call_user_func([$this->modelClz,'all']);
	}

	public function get($id) {
        return call_user_func([$this->modelClz,'find'],$id);
	}

	public function insert(array $model, $return = false) {
        $_model = new $this->modelClz;
        foreach($model as $key=>$val){
            $_model->$key = $val;
        }

        if ($return) {
            $_model->save();
            return $_model; // return model
        } else {
            return $_model->save(); // return insert status
        }

	}

	public function update($id, array $model) {
        $_model = $this->get($id);
        foreach($model as $key=>$val){
            $_model->$key = $val;
        }
        return $_model->save();
	}

	public function delete($id) {
        $_model = $this->get($id);
        return $_model->delete();
	}
	
}
