<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{	
    protected 	$table 		= "pembelian_detail";

    public function getBuku()
    {
    	return Buku::find($this->id_buku);
    }

}
