<?php

namespace App\Http\Controllers;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use DB;
class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // CATEGORY
    public function app_category()
    {
        $data = DB::table('t_category')->get();
        return view('app.category', ['data' => $data]);
    }
    public function app_category_add()
    {
        return view('app.category.form-add');
    }
    public function app_category_save(Request $request)
    {
        DB::table('t_category')->insert([
            't_category_code' => mt_rand(1000000, 9999999),
            't_category_name' => $request->name,
            't_category_status' => 1,
            't_category_desc' => $request->desc,
            'created_at' => now(),
        ]);
        return redirect()->back()->withSuccess('Great! Kamu Telah Menambah SUb Event');
    }
    public function app_category_edit(Request $request)
    {
        $data = DB::table('t_category')->where('t_category_code', $request->code)->first();
        return view('app.category.form-edit', ['data' => $data]);
    }
    public function app_category_update(Request $request)
    {
        DB::table('t_category')->where('t_category_code', $request->code)->update([
            't_category_name' => $request->name,
            't_category_status' => $request->status,
            't_category_desc' => $request->desc,
            'updated_at' => now(),
        ]);
        return redirect()->back()->withSuccess('Great! Kamu Telah Menambah SUb Event');
    }

    // PRODUCT
    public function app_product()
    {
        $data = DB::table('t_product')
            ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')->get();
        return view('app.product', ['data' => $data]);
    }
    public function app_product_add()
    {
        $option = DB::table('t_category')->get();
        return view('app.product.form-add', ['option' => $option]);
    }
    public function app_product_save(Request $request)
    {
        $file = $request->file('file');
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $file->getClientOriginalName());
        DB::table('t_product')->insert([
            't_product_code' => str::uuid(),
            't_category_code' => $request->category,
            't_product_name' => $request->name,
            't_product_type' => $request->type,
            't_product_status' => 1,
            't_product_desc' => $request->desc,
            't_product_file' => $tujuan_upload.'/'.$file->getClientOriginalName(),
            'created_at' => now()
        ]);
        return redirect()->back()->withSuccess('Great! Kamu Telah Menambah SUb Event');
    }
    public function app_product_display(Request $request){
        $data = DB::table('t_product')->where('t_product_code',$request->code)->first();
        return view('app.product.display-product',['data'=>$data]);
    }
    public function app_stok()
    {
        return view('app.stok');
    }
    public function app_stok_find()
    {
        return view('app.stok.cari-data');
    }
    public function inventaris()
    {
        return view('app.inventaris');
    }
    public function list_order()
    {
        return view('app.order-list');
    }
    public function menu_order()
    {
        return view('app.menu-order');
    }
}
