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
            $total = DB::table('m_order_list_detail')->sum('order_price');
            $totalmin = DB::table('m_order_list_detail')->where('order_status',0)->sum('order_price');
            $item = DB::table('m_order_list_detail')->sum('order_qty');
            return view('dashboard.admin',[
                'order'=>$order,
                'ordertoday'=>$ordertoday,
                'total'=>$total,
                'totalmin'=>$totalmin,
                'item'=>$item,
            ]);
        } elseif (Auth::user()->access_code == 'kasir') {
            return view('dashboard.kasir');
        } elseif (Auth::user()->access_code == 'user') {
            return Redirect('/');
        }
    }
    public function transaction(){
        $data = DB::table('m_order_list')
        ->join('m_table_master','m_table_master.m_table_master_code','=','m_order_list.m_order_table')
        ->orderBy('m_order_list.id', 'DESC')->get();
        return view('dashboard.transaction',['data'=>$data]);
    }
    public function dashboard_notif(Request $request){
        $data = DB::table('m_order_list')
        ->select('user_mains.fullname','m_order_list.*')
        ->join('user_mains','user_mains.userid','=','m_order_list.userid')
        ->where('m_order_list.m_order_status',0)->get();
        return view('notif.notification',['data'=>$data]);
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
