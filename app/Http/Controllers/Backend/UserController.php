<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Requests\User\UserRegistrationRequest;
use App\Http\Controllers\Controller;
use Session, Helper, Auth, Validator;

class UserController extends Controller
{
    private $user;
    private $base_view = 'backend.user.';

    public function __construct()
    {
        view()->share('base_view', $this->base_view);
    }

    public function index()
    {
        $query = User::where('id','>',0)->orderBy('id', 'DESC')->get();
        $attr = 'User Registered';
        $user_ = 'class=active';
        $no = 1;
        $vars = ['query', 'attr', 'user_', 'no'];
        return view($this->base_view.'index', compact($vars));
    }

    
    public function store(UserRegistrationRequest $request)
    {
        if(Auth::check())
        {
            $data = [
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'level_user' => $request->level_user,
                'is_aktif'=>1,
            ];
            User::create($data);
            Session::flash('notif', '<p class="alert alert-success"><strong><span class="fa fa-check-circle"></span>Sukses!</strong> Penambahan Data Pengguna Baru berhasil diproses.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
            return redirect()->route('admin.user.index');
        }
    }

    
    public function edit($id)
    {
        $q = User::findOrFail($id);
        $attr = 'Edit User Registered Account';
        $user_ = 'class=active';
        $vars = ['q', 'user_', 'attr'];
        return view($this->base_view.'edit', compact($vars));
    }

    public function change_password(){
        $q = User::findOrFail(Auth::Id());
        $attr = 'Ubah Kata Sandi';
        $user_ = 'class=active';
        $vars = ['q', 'user_', 'attr'];
        return view($this->base_view.'action.ubah_sandi', compact($vars));
    }

    public function auth_change_password(Request $request){
        $rule = [
             'password'=>'required|min:4|same:password2',
        ];
        $validator = Validator::make($request->all(), $rule);
        if($validator->fails())
        {
           return redirect()->route('admin.user.index')->withErrors();
        }
        $data = [
                'password' => bcrypt($request->password),
        ];
        User::whereId(Auth::Id())->update($data);
        $msg = Helper::notif('sukses','Perubahan kata sandi akun anda berhasil disimpan');
        Session::flash('notif', $msg);
        return redirect()->route('dashboard');
    }

   
    public function update(UserRegistrationRequest $request, $id)
    {
        if(Auth::check()){
            $data = [
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'level_user' => $request->level_user,
                'is_aktif'=>1,
            ];
            User::whereId($id)->update($data);
            Session::flash('notif', '<p class="alert alert-success"><strong><span class="fa fa-check-circle"></span> Sukses!</strong> Perubahan Data Pengguna berhasil diproses.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');
            
        }
        return redirect()->route('admin.user.index');
    }

    public function setStatus(Request $request)
    {
        $action = $request->input('action');
        $id = $request->input('id');

        if($request->isMethod('post'))
        {
            if($id == NULL)
            {
                $msg = Helper::notif('error', 'Maaf,Tidak ada data diseleksi atau dipilih.');
                Session::flash('notif', $msg);
                return redirect()->route('admin.user.index');
            }

            foreach($id as $id_user){
                User::whereId($id_user)->update(['is_aktif' => $action]);
            }
            $msg = Helper::notif('sukses', 'Perubahan Status berhasil di proses');
            Session::flash('notif', $msg);
        }
        return redirect()->route('admin.user.index');
    }

    
    public function destroy($id)
    {
        //
    }
}
