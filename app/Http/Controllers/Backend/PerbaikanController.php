<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Perbaikan;
use App\Models\Kerusakan;
use Auth,Session,Helper;
use Carbon;

class PerbaikanController extends Controller
{
    private $base_view = 'backend.perbaikan.';

    public function __construct()
    {
        view()->share('base_view', $this->base_view);
    }

    public function index(Request $req)
    {
        if($req->input('start_date'))
        {
            $start = $req->input('start_date');
            $end =$req->input('end_date');
            $q = Perbaikan::whereBetween('created_at',[date('Y-m-d 23:59:59',strtotime($start)), date('Y-m-d 23:59:59',strtotime($end))])->orderBy('id', 'DESC')->paginate(15);

        }else{
            $q = Perbaikan::where('id', '>',0)->orderBy('id', 'DESC')->paginate(15);
        }
        $attr = 'Laporan Perbaikan';
        $perbaikan_ = 'class=active';
        $no = 1;
        $vars = ['q', 'attr', 'perbaikan_', 'no'];
        return view($this->base_view.'index', compact($vars));
    }

    public function setReport($id)
    {
        $q = Perbaikan::findOrFail($id);
        $attr = 'Laporan Perbaikan';
        $perbaikan_ = 'class=active';
        $vars = ['q', 'attr', 'perbaikan_'];
        return view($this->base_view.'add', compact($vars));
    }

    public function authReport($id, Request $request)
    {
        if(Auth::check())
        {
            $data = [
                'selesai'=>date('Y-m-d H:i:s'),
                'keterangan'=>$request->input('keterangan'),
            ];
            Perbaikan::whereId($id)->update($data);
            //update progress pada table kerusakan
            $get_ = Perbaikan::find($id);
            Kerusakan::whereId($get_->kerusakan_id)->update(['progress'=>3]);

            $msg = Helper::notif('sukses', 'Laporan Perbaikan telah berhasil disimpan');
            Session::flash('notif', $msg);
            return redirect()->route('perbaikan');
        }
        return redirect()->route('perbaikan');
    }
}

