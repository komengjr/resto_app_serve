<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PublicController extends Controller
{
    public function list_menu(){
        $cat = DB::table('t_category')->get();
        $disc = DB::table('t_product')->where('t_product_disc','>',0)->get();
        $data = DB::table('t_product')->get();
        return view('public.shop',['cat'=>$cat,'disc'=>$disc,'data'=>$data]);
    }
}
