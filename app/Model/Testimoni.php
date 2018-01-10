<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimoni extends Model
{
	use SoftDeletes;
	
    protected 	$table 		= "testimoni";
    
    public function getSantri()
    {
    	return Santri::find($this->id_santri);
    }
}
