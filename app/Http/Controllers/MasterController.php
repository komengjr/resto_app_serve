<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function master_user(){
        return view('master.user');
    }
    public function master_setting(){
        return view('master.setting');
    }
}
