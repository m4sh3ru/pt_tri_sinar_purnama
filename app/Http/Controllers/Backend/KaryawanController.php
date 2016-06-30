<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Divisi;
use App\Models\User;
use App\Http\Requests;
use App\Http\Requests\Pegawai\AdmPegawaiRequest;
use App\Http\Controllers\Controller;
use Auth, Session, Helper;

class KaryawanController extends Controller
{
    private $pegawai;
    private $base_view = 'backend.pegawai.';

    public function __construct(Karyawan $pegawai)
    {
        $this->pegawai = $pegawai;
        view()->share('base_view', $this->base_view);
    }

    public function index()
    {
        $q = $this->pegawai->where('id','>',0)->orderBy('id', 'DESC')->get();
        $attr = 'Data Pegawai';
        $pegawai_ = 'class=active';
        $no = 1;
        
        $vars = ['q', 'attr', 'pegawai_', 'no'];
        return view($this->base_view.'index', compact($vars));
    }

   
    public function create()
    {
        $attr = 'Data Pegawai';
        $pegawai_ = 'class=active';
        $div = Divisi::orderBy('nama', 'ASC')->get();
        $vars = ['q', 'attr', 'pegawai_', 'div'];
        #dd(Helper::months());
        return view($this->base_view.'add', compact($vars));

    }

    public function store(AdmPegawaiRequest $request)
    {
        if($request->isMethod('post') && Auth::Id())
        {
            $data = [
                'nik'=>$request->nik,
                'nama_lengkap'=>ucwords($request->nama_lengkap),
                'tempat_lahir'=>$request->tempat_lahir,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'hp'=>$request->hp,
                'alamat'=>$request->alamat,
                'divisi_id'=>$request->input('divisi_id'),
                'is_aktif'=>1,
            ];
            Karyawan::create($data);
            //otomatis data karyawan akan membuat akun untuk ybs
            $akun = ['username'=>$request->nik,'password'=>bcrypt(1234), 'is_aktif'=>1];
            User::create($akun);
            //tampilkan pesan 
            Session::flash('notif', '<p class="alert alert-success"><strong><span class="fa fa-check-circle"> </span>Sukses!</strong> Penambahan Data Karyawan Baru berhasil diproses.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
            return redirect()->route('admin.pegawai.index');
        }
        Session::flash('notif', '<p class="alert alert-danger"><strong><span class="fa fa-exclamation-triangle"></span>Sukses!</strong> Input Data Karyawan baru gagal, Silahkan periksa data masukan anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
        return redirect()->route('admin.pegawai.index');
    }

    public function edit($id)
    {
        $attr = 'Data Pegawai';
        $pegawai_ = 'class=active';
        $div = Divisi::orderBy('nama', 'ASC')->get();
        $q = Karyawan::findOrFail($id);
        $vars = ['q', 'attr', 'pegawai_', 'div'];
        return view($this->base_view.'edit', compact($vars));
    }

    
    public function update(AdmPegawaiRequest $request, $id)
    {
        if(Auth::check())
        {
            $kar =  Karyawan::find($id);
            User::whereUsername($kar->nik)->update(['username'=>$request->nik]);
            $data = [
                'nik'=>$request->nik,
                'nama_lengkap'=>ucwords($request->nama_lengkap),
                'tempat_lahir'=>$request->tempat_lahir,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'hp'=>$request->hp,
                'alamat'=>$request->alamat,
                'divisi_id'=>$request->divisi_id,
                'is_aktif'=>1,
            ];
            Karyawan::where($id)->update($data);
            //tampilkan pesan 
            Session::flash('notif', '<p class="alert alert-success"><strong><span class="fa fa-check-circle"> </span>Sukses!</strong> Penambahan Data Karyawan Baru berhasil diproses.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
            return redirect()->route('admin.pegawai.index');
        }
    }

   
   /* public function destroy($id)
    {
        $q = $this->pegawai->find($id)->delete();
        Session::flash('notif', '<p class="alert alert-success"><strong><span class="fa fa-check-circle"></span> Sukses!</strong> Data Karyawan Berhasil dilakukan penghapusan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
        return redirect()->route('admin.pegawai.index');
    }*/
}
