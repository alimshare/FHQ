<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
*	@author : Abdullah 'Alim (alimm.abdullah@gmail.com)
	@since 	: Nov 2017
*/
class Santri extends Model
{
	use SoftDeletes;
	
    protected 	$table 		= "santri";

    public function peserta(){
    	$this->hasMany('App\Model\Peserta','id_santri','id');
    }
    
}
