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

    public function getKelas()
    {
        return Kelas::find($this->id_kelas);
    }

    public function getSantri()
    {
        return Santri::find($this->id_santri);
    }

    public function getInfaq()
    {
        return Infaq::where('id_peserta','=',$this->id)->get();        
    }

}
