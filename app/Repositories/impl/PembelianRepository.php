<?php 

namespace App\Repositories\impl;

use App\Repositories\IPembelianRepository;
use App\Repositories\impl\CRUDRepository;

class PembelianRepository extends CRUDRepository implements IPembelianRepository
{
    protected $modelClz = 'App\Model\Pembelian';
    protected $modelClzDetail  = 'App\Model\PembelianDetail';
	
    public function saveWithDetail(array $model){
    	$pembelian = $this->insert($model, true);

    	$listDetail = array();
    	foreach ($model['detail'] as $key => $detail) {
    		$detail['id_pembelian'] = $pembelian->id;
	        $detail = $this->insertDetail($detail);
	        $listDetail[] = $detail;
    	}

    	$pembelian->detail = $listDetail;

    	return $pembelian;
    }

    public function insertDetail(array $model){
		$_model = new $this->modelClzDetail;
		foreach($model as $key=>$val){
		    $_model->$key = $val;
		}
		$_model->save();
		return $_model;    	
    }

}
