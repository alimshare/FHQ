<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IInfaqRepository as BaseCrud;

class UIInfaqController extends Controller
{
    protected $crud;
    
    public function __construct(BaseCrud $c) {
        $this->crud = $c;
        $this->middleware('auth');  
    }

    public function index(){
        $list = $this->crud->all();    
        return view('modules.infaq.infaq_list')->with('list',$list);
    }

    public function add(){
        return view('modules.infaq.infaq_add');
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.infaq.infaq_view')->with('object', $object);
    }

    public function edit($id){
        $object = $this->crud->get($id);
        return view('modules.infaq.infaq_edit')->with('object', $object);
    }
}
