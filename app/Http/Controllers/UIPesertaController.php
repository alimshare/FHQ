<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IPesertaRepository as BaseCrud;

class UIPesertaController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.peserta.peserta_list')->with('list',$list);
    }

    public function view($id){

    }

    public function add(){
        return view('modules.peserta.peserta_add');
    }

    public function edit(){

    }
}
