<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ILevelRepository as BaseCrud;

class UILevelController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.level.level_list')->with('list',$list);
    }

    public function view($id){

    }

    public function add(){
        return view('modules.level.level_add');
    }

    public function edit(){

    }
}
