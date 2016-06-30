<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session, Auth;

class DivisiController extends Controller
{
    private $base_view = 'backend.divisi.';

    public function __construct()
    {
        view()->share('base_view', $this->base_view);
    }

    public function index()
    {
        $query = Divisi::all();
        $attr = 'Satuan Kerja / Divisi';
        $div_ = 'class=active';
        $no = 1;
        $vars = ['query', 'attr', 'div_', 'no'];
        return view($this->base_view.'index', compact($vars));
    }

    
    public function store(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = [
                'nama' => $request->input('nama'),                
            ];
            Divisi::create($data);
            Session::flash('notif', '<p class="alert alert-success"><strong><span class="fa fa-check-circle"></span> Sukses!</strong> Penambahan Data Divisi/Satuan Kerja Baru berhasil diproses.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
            return redirect()->route('admin.divisi.index');
        }
    }

    
    public function edit($id)
    {
        $q = Divisi::findOrFail($id);
        $attr = 'Satuan Kerja / Divisi';
        $div_ = 'class=active';
        $vars = ['q', 'div_', 'attr'];
        return view($this->base_view.'edit', compact($vars));
    }

   
    public function update(Request $request, $id)
    {
        if(Auth::check()){
            $data = [
                'nama' => $request->input('nama')
            ];
            Divisi::whereId($id)->update($data);
            Session::flash('notif', '<p class="alert alert-success"><strong><span class="fa fa-check-circle"></span> Sukses!</strong> Perubahan Data Divisi/Satuan Kerja berhasil diproses.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
            
        }
        return redirect()->route('admin.divisi.index');
    }

    
    /*public function destroy($id)
    {
        Divisi::whereId($id)->delete();
        Session::flash('notif', '<p class="alert alert-success"><strong><span class="fa fa-check-circle"></span> Sukses!</strong> Satuan Kerja/Divisi yang anda pilih berhasil di Hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
        return redirect()->route('admin.divisi.index');
    }*/
}
