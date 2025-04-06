<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
class PublicController extends Controller
{

    public function list_menu()
    {
        $cat = DB::table('t_category')->get();
        $disc = DB::table('t_product')->where('t_product_disc', '>', 0)->get();
        $data = DB::table('t_product')->get();
        return view('public.shop', ['cat' => $cat, 'disc' => $disc, 'data' => $data]);
    }
    public function list_menu_notif(){
        return redirect("menu")->withError('Succsess Add Order Item');
    }
    public function list_menu_cart()
    {
        if (Auth::check()) {
            $data = DB::table('user_cart_log')->join('t_product','t_product.t_product_code','=','user_cart_log.t_product_code')->get();
            return view('public.shop.cart',['data'=>$data]);
        } else {
            return view('auth.login');
        }

    }
    public function menu_add_cart(Request $request)
    {
        $data = DB::table('t_product')->where('t_Product_code', $request->code)->first();
        return view('public.shop.modal-cart', ['data' => $data]);
    }
    public function menu_remove_cart(Request $request){
        DB::table('user_cart_log')->where('id_user_cart_log',$request->code)->where('userid',Auth::user()->userid)->delete();
        return 1;
    }
    public function menu_add_cart_product_user(Request $request)
    {
        if (Auth::check()) {
            $cek = DB::table('user_cart_log')->where('t_product_code',$request->code)->where('userid',Auth::user()->userid)->first();
            if ($cek) {
                DB::table('user_cart_log')->where('t_product_code',$request->code)->where('userid',Auth::user()->userid)->update([
                    't_product_qty' => $cek->t_product_qty + $request->qty,
                ]);
            } else {
                DB::table('user_cart_log')->insert([
                    't_product_code' => $request->code,
                    't_product_qty' => $request->qty,
                    'userid' => Auth::user()->userid,
                    'status' => 1,
                    'created_at' => now()
                ]);
            }


            return 1;
        } else {
            return 0;
        }
    }
    public function brand()
    {
        return view('public.brand');
    }
    public function about()
    {
        return view('public.about');
    }
    public function contact()
    {
        return view('public.contact');
    }
}
