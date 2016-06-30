<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Kerusakan;
use App\Models\Divisi;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\Perbaikan;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session, Auth, Helper;

class KerusakanController extends Controller
{
    private $base_view = 'backend.kerusakan.';

    public function __construct()
    {
        view()->share('base_view', $this->base_view);
    }

    public function index(Request $req)
    {
        $qr = Kerusakan::whereUserId(Auth::Id())->count();
        if($req->input('start_date'))
        {
            $start = $req->input('start_date');
            $end =$req->input('end_date');
            $q = Kerusakan::whereBetween('created_at',[date('Y-m-d 23:59:59',strtotime($start)), date('Y-m-d 23:59:59',strtotime($end))])->orderBy('id', 'DESC')->paginate(15);
        }else{
            if(Auth::user()->level_user == 3 ){
                $q = Kerusakan::whereUserId(Auth::Id())->paginate(15);
            }else{
                $q = Kerusakan::where('id', '>',0)->orderBy('id', 'DESC')->paginate(15);
            }
        }

        
        $attr = 'Laporan Kerusakan';
        $kerusakan_ = 'class=active';
        $no = 1;
        $divisi = Divisi::orderBy('nama', 'ASC')->get();
        $vars = ['q', 'attr', 'kerusakan_', 'no', 'qr', 'divisi'];
        return view($this->base_view.'index', compact($vars));
    }

   
    public function create()
    {
        $attr = 'Laporan Kerusakan';
        $kerusakan_ = 'class=active';
        $divisi = Divisi::orderBy('nama', 'ASC')->get();
        $vars = ['q', 'attr', 'kerusakan_', 'divisi', 'perangkat'];
        return view($this->base_view.'add', compact($vars));

    }

    public function store(Request $request)
    {
        if(Auth::check())
        {
            $data = [
                'perangkat'=>$request->input('perangkat'),
                'divisi_id'=>$request->input('divisi_id'),
                'keterangan'=>$request->input('keterangan'),
                'progress'=>1,
                'user_id'=>Auth::Id(),
            ];
            Kerusakan::create($data);
            $msg = Helper::notif('sukses', 'Kerusakan Perangkat telah di laporkan ke pihak yang bertugas.');
            Session::flash('notif', $msg);
            return redirect()->route('admin.laporan.kerusakan.index');
        }
        return redirect()->route('admin.laporan.kerusakan.index');
    }

    public function doProses(Request $request)
    {
        $id = $request->input('id');
        if($id)
        {
            Kerusakan::whereId($request->input('id'))->update(['progress'=>2]);
            $msg = Helper::notif('sukses', 'Laporan Permasalahan Sedang dalam proses perbaikan.');
            #autoInserId into Perbaikan table
            Perbaikan::create(['kerusakan_id'=>$id, 'user_id'=>Auth::Id()]);
            Session::flash('notif', $msg);
            return redirect()->route('admin.laporan.kerusakan.index');
        }
        return redirect()->route('admin.laporan.kerusakan.index');
    }

}
