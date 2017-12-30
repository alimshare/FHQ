<?php 

namespace App\Repositories\impl;

use App\Repositories\IPesertaRepository;
use App\Repositories\impl\CRUDRepository;

class PesertaRepository extends CRUDRepository  implements IPesertaRepository
{
    protected $modelClz = 'App\Model\Peserta';
	
}
