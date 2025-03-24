<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
use Illuminate\Support\Str;
use App\Models\UserMain;
class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function url_akses($user, $akses)
    {
        if ($user == Auth::user()->kd_akses) {
            $data = DB::table('user_mains')->where('kd_akses', $user)->where('kd_menu', $akses)->first();
            if ($data) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function master_user(){
        $data = DB::table('user_mains')->get();
        return view('master.user',['data'=>$data]);
    }
    public function master_user_add(){
        return view('master.user.form-add');
    }
    public function master_user_save(Request $request){
        UserMain::create([
            'userid' => 'UID-' . Str::random(4),
            'fullname' => $request['fullname'],
            'username' => $request['username'],
            'number_handphone' => $request['no_hp'],
            'email' => $request['email'],
            'access_code' => $request['akses'],
            'access_status' => '1',
            'remember_token' => Str::random(10),
            'password' => Hash::make($request['password']),

        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    // AKSES MENU
    public function master_akses_menu(){
        $akses = DB::table('z_access')->get();
        return view('master.menu-akses',['akses'=>$akses]);
    }
    public function master_akses_menu_detail(Request $request){
        $data = DB::table('user_mains')->where('access_code',$request->id)->get();
        return view('master.menu-akses.detail-akses',['data'=>$data]);
    }
    // SETTING
    public function master_setting(){
        return view('master.setting');
    }
}
