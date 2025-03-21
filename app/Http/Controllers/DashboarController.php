<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class DashboarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->access_code == 'admin') {
            $order = DB::table('m_order_list')->get();
            $ordertoday = DB::table('m_order_list')->where('m_order_date','like','%'.date('Y-m-d').'%')->get();
            return view('dashboard.admin',['order'=>$order,'ordertoday'=>$ordertoday]);
        } elseif (Auth::user()->access_code == 'kasir') {
            return view('dashboard.kasir');
        } elseif (Auth::user()->access_code == 'user') {
            return Redirect('/');
        }
    }
    public function profile(){
        return view('dashboard.profile');
    }
    public function setting(){
        return view('dashboard.setting');
    }
    public function news(){
        return view('dashboard.news');
    }
    public function actifity(){
        return view('dashboard.actifity');
    }
}
