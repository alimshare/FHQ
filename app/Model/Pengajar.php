<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
*	@author : Abdullah 'Alim (alimm.abdullah@gmail.com)
	@since 	: Nov 2017
*/
class Pengajar extends Model
{
	use SoftDeletes;
	
    protected 	$table 		= "pengajar";
    // protected	$visible 	= array("id","nama","deskripsi","tanggal_mulai","tanggal_selesai");
}
