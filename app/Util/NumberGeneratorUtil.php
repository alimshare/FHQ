<?php

/**
*	@author : Abdullah 'Alim (alimm.abdullah@gmail.com)
	@since 	: Dec 2017
*/
class NumberGeneratorUtil
{

	/**
	*	rumus :
	*		Location(2) + Angkatan(2) + JenisKelamin(1) + NomorUrut(4) + ValidsiAngka5(1)
	*	keterangan :
	*		ValidsiAngka5 : 
	*			melakukan penjumlahan setiap angka pada nomor urut, kemudian akan menambah nilai sehingga nomor urut berakhiran angka 5
	*	ex :
	*		0017100011
	*/
	public function generateNomorIndukSantri() {		
		$location 		= "00";
		$angkatan 		= "17";
		$jenisKelamin 	= "1";
		$NomorUrut 		= "0001";
		$validasi 		= "1";

		$nomor = $location.$angkatan.$jenisKelamin.$NomorUrut.$validasi;
		
		return $nomor;
	}

	public function generateNomorIndukPengajar() {

	}

}
