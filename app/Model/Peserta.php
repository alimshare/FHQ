<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
*	@author : Abdullah 'Alim (alimm.abdullah@gmail.com)
	@since 	: Nov 2017
*/
class Peserta extends Model
{
	use SoftDeletes;
	
    protected 	$table 		= "peserta";

    public function santri(){
    	return $this->belongTo('App\Model\Santri','id','id_santri');
    }
    
    public function kelas(){
    	return $this->belongTo('App\Model\Kelas','id','id_kelas');
    }


}
