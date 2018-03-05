<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

class Pembelian extends Model
{
	use SoftDeletes;
	
    protected 	$table 		= "pembelian";
    public 		$detail;

    public function getDetail()
    {
        return PembelianDetail::where('id_pembelian','=',$this->id)->get();
    }

    public function getStaff()
    {
    	return User::find($this->id_user);
    }

    public function getTotal(){
    	$detail = $this->getDetail();

    	$total = 0;
    	foreach ($detail as $key => $value) {
    		$total += intval($value->harga * $value->qty);
    	}
    	return $total;
    }
}
