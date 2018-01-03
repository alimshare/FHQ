<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
*	@author : Abdullah 'Alim (alimm.abdullah@gmail.com)
	@since 	: Nov 2017
*/
class Infaq extends Model
{
	use SoftDeletes;
	
    protected 	$table 		= "infaq";

    public function getPeserta()
    {
    	return Peserta::find($this->id_peserta);
    }

    public function getStaff()
    {
    	return User::find($this->id_user);
    }
}
