<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Snap;
use Midtrans\Config;
use Auth;
use DB;
class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $this->middleware('auth');
    }
    public function payemnt_token(Request $request)
    {
        $token = DB::table('m_order_list_detail')->where('no_reg_order',$request->id)->where('order_status',1)->sum('order_price');
        $params = [
            'transaction_details' => [
                'order_id' => Str::uuid(),
                'gross_amount' => $token,
            ],
            'item_details' => [
                [
                    'price' => $token,
                    'quantity' => 1,
                    'name' => $request->id,
                ]
            ],
            'credit_card' => [
                'secure' => true
            ],
            'customer_details' => [
                'first_name' => Auth::user()->fullname,
                'last_name' => '@BimoLin',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->number_handphone,
            ],
        ];


        $snapToken = Snap::getSnapToken($params);
        return $snapToken;

    }
}
