<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
*	@author : Abdullah 'Alim (alimm.abdullah@gmail.com)
	@since 	: Nov 2017
*/
class Kelas extends Model
{
	use SoftDeletes;
	
    protected 	$table 		= "kelas";

    public function getSemester()
    {
    	return Semester::find($this->id_semester);
    }

    public function getLevel()
    {
    	return Level::find($this->id_level);
    }

    public function getPengajar()
    {
    	return Pengajar::find($this->id_pengajar);
    }

    public function getPeserta()
    {
        return Peserta::where('id_kelas','=',$this->id)->get();
    }
}
