<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
	use SoftDeletes;
	
    protected 	$table 		= "buku";
}
