<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IPembelianRepository as BaseCrud;
use App\Repositories\IBukuRepository as CrudBuku;
use Excel;
use DataTables;
use App\Model\Pembelian;
use App\Model\PembelianDetail;
use Illuminate\Support\Facades\Auth;

class UIPembelianController extends Controller
{
    protected $crud;
    protected $crudBuku;
    
    public function __construct(BaseCrud $c, CrudBuku $d) {
        $this->crud = $c;
        $this->crudBuku = $d;
        $this->middleware('auth');  
    }

    public function index(){
        return view('modules.pembelian.pembelian_list');
    }

    public function datatables(){
        $list = $this->crud->all();

        return Datatables::of($list)
        ->addColumn('action', function($list){
            return '<a href="'. url('/pembelian/view/'.$list->id) .'" class="btn btn-outline-primary btn-sm">View</a>';
        })
        ->make(true);
    }
    
    
    public function add(){
        $listBuku = $this->crudBuku->all();
        return view('modules.pembelian.pembelian_add')->with('listBuku', json_encode($listBuku));
    }

    public function view($id){
        $object = $this->crud->get($id);
        return view('modules.pembelian.pembelian_view')->with('object', $object);
    }  

    public function export()
    {
        $list = $this->crud->all();

        if (!count($list)) { return false; }

        Excel::create('Pembelian', function($excel) use ($list) {
            $excel->sheet('Sheet1', function($sheet) use ($list) {

                $row = 1;

                // set header csv
                $sheet->row($row, array(
                     'tanggal', 'nomor_transaksi'
                )); $row++;

                // loop list
                foreach ($list as $value) {
                    $sheet->row($row, array(
                        $value->nama, 
                        strip_tags($value->deskripsi)
                    ));

                    $row++;
                }
            });
        })
        ->export('csv'); // to csv
    }

    public function save(Request $request){

        // set data pembelian
        $pembelian = array();
        $pembelian['tanggal'] = $request->tanggal;
        $pembelian['deskripsi'] = $request->deskripsi;
        $pembelian['nomor_transaksi'] = $request->nomor_transaksi;
        $pembelian['id_user'] = Auth::user()->id;
        
        
        // set data pembelian detail
        $pembelianDetail = array();
        for ($i=0; $i<count($request->buku); $i++) {
            $rowID = explode('|',$request->buku[$i]);
            
            $detail = array();
            $detail['id_buku'] = $rowID[0];
            $detail['harga'] = $rowID[1];
            $detail['qty'] = $request->qty[$i];

            $pembelianDetail[] = $detail;
        }
        $pembelian['detail'] = $pembelianDetail;
        

        $pembelian = $this->crud->saveWithDetail($pembelian);

        if ($pembelian->id != ""){
            $message = 'pembelian success. <a href="'.url('pembelian/view/'.$pembelian->id).'">lihat detail</a> ';
            return redirect('pembelian/add')->with('status',$message)->with('type','success');
        } else {
            return redirect('pembelian/add')->with('status','pembelian gagal')->with('type','danger');
        } 
        
    }
}
