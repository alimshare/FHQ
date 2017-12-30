<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ISantriRepository as BaseCrud;

class UISantriController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.santri.santri_list')->with('list',$list);
    }

    public function view($id){

    }

    public function add(){
        return view('modules.santri.santri_add');
    }

    public function edit(){

    }
}
