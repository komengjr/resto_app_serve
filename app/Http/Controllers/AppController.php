<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function app_category(){
        return view('app.category');
    }
    public function app_product(){
        return view('app.product');
    }
    public function app_stok(){
        return view('app.stok');
    }
    public function inventaris(){
        return view('app.inventaris');
    }
    public function list_order(){
        return view('app.order-list');
    }
    public function menu_order(){
        return view('app.menu-order');
    }
}
