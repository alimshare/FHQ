<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saran extends Model
{
	use SoftDeletes;
	
    protected 	$table 		= "saran";

    public function getSantri()
    {
    	return Santri::find($this->id_santri);
    }

    public function getStaff()
    {
    	return User::find($this->id_user);
    }
}
