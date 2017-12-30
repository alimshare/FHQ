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
    // protected	$visible 	= array("id","nama","deskripsi","tanggal_mulai","tanggal_selesai");

    public function peserta(){
    	$this->hasMany('App\Model\Peserta','id_santri','id');
    }
    
}
