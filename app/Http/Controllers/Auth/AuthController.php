<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth, Session;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
   
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'log_out']);
    }

    public function authenticate(User $mst_user, Request $req)
    {
        $verifikasi = [
            'username'=>$req->input('username'),
            'password'=>$req->input('password'),
            'is_aktif'=>1,
        ];
        $remember = $req->input('remember');
        //verifikasi pengecekan data
        if(Auth::attempt($verifikasi, $remember))
        {
            Session::flash('notif', '<p class="alert alert-success"><strong><span class="fa fa-check-circle"></span> Sukses!</strong> Log In berhasil! Selamat Datang di Sistem Informasi Online Learning.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
            return redirect()->intended($this->redirectTo);
        }

        Session::flash('notif', '<p class="alert alert-danger"> <strong><span class="fa fa-times-circle"></span> Error!</strong> Nama yang anda masukkan tidak sesuai!</p>');
        return redirect('/');
    }

    public function log_out()
    {

        Auth::logout();
        Session::flush();
        Session::flash('notif', '<p class="alert alert-success"> Anda berhasil Log Out dari sistem!</p>');
        return redirect('/');
    }


}
