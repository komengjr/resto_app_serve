<?php

namespace App\Http\Controllers;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use DB;
use PDF;
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
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
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
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
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
            't_product_price' => $request->price,
            't_product_disc' => $request->disc,
            't_product_status' => 1,
            't_product_desc' => $request->desc,
            't_product_file' => $tujuan_upload . '/' . $file->getClientOriginalName(),
            'created_at' => now()
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function app_product_display(Request $request)
    {
        $data = DB::table('t_product')->where('t_product_code', $request->code)->first();
        return view('app.product.display-product', ['data' => $data]);
    }
    public function app_product_edit(Request $request)
    {
        $option = DB::table('t_category')->get();
        $data = DB::table('t_product')
            ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')
            ->where('t_product.t_product_code', $request->code)->first();
        return view('app.product.form-edit', ['option' => $option, 'data' => $data]);
    }
    public function app_product_update(Request $request)
    {
        $file = $request->file('file');
        $tujuan_upload = 'data_file';
        if ($file == "") {
            DB::table('t_product')->where('t_product_code', $request->code)->update([
                't_product_name' => $request->name,
                't_product_type' => $request->type,
                't_product_status' => 1,
                't_product_desc' => $request->desc,
                'created_at' => now()
            ]);
        } else {
            $random = mt_rand(1000000, 9999999);
            $file->move($tujuan_upload, $random . $file->getClientOriginalName());
            DB::table('t_product')->where('t_product_code', $request->code)->update([
                't_product_name' => $request->name,
                't_product_type' => $request->type,
                't_product_status' => 1,
                't_product_desc' => $request->desc,
                't_product_file' => $tujuan_upload . '/' . $random . $file->getClientOriginalName(),
                'created_at' => now()
            ]);
        }

        return redirect()->back()->withSuccess('Great!');
    }
    public function app_product_detail(Request $request)
    {
        return view('app.product.detail-product');
    }
    public function app_stok()
    {
        return view('app.stok');
    }
    public function app_stok_find()
    {
        return view('app.stok.cari-data');
    }
    public function app_stok_find_search(Request $request)
    {
        $data = DB::table('t_product')->where('t_product_name','like','%'.$request->code.'%')->get();
        return view('app.stok.hasil-pencarian',['data'=>$data]);
    }
    public function app_stok_find_detail(Request $request)
    {
        $data = DB::table('t_product')
        ->join('t_category','t_category.t_category_code','=','t_product.t_category_code')
        ->where('t_product.t_product_code',$request->code)->first();
        return view('app.stok.detail-stok',['data'=>$data]);
    }
    // Table Management
    public function app_table()
    {
        $data = DB::table('m_table_master')->get();
        $proses = DB::table('m_table_master')
        ->join('m_order_list','m_order_list.m_order_table','=','m_table_master.m_table_master_code')
        ->where('m_order_list.m_order_status',0)->get();
        return view('app.table-service', ['data' => $data,'proses'=>$proses]);
    }
    public function app_table_add()
    {
        return view('app.table.form-add');
    }
    public function app_table_save(Request $request)
    {
        DB::table('m_table_master')->insert([
            'm_table_master_code' => str::uuid(),
            'm_table_master_name' => $request->name,
            'm_table_master_cat' => $request->category,
            'm_table_master_type' => $request->type,
            'm_table_master_status' => 1,
            'm_table_master_desc' => $request->desc,
            'created_at' => now(),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function inventaris()
    {
        return view('app.inventaris');
    }

    // MENU ORDER
    public function menu_order()
    {
        $data = DB::table('t_product')->where('t_product_status', 1)->get();
        $cat = DB::table('t_category')->get();
        return view('app.menu-order', ['data' => $data, 'cat' => $cat]);
    }
    public function menu_order_create()
    {
        return view('app.menu-order.detail-order');
    }
    public function menu_order_create_table()
    {
        $table = DB::table('m_table_master')
        // ->join('m_order_list','m_order_list.m_order_table','=','m_table_master.m_table_master_code')
        ->get();
        return view('app.menu-order.choose-table', ['table' => $table]);
    }
    public function menu_order_create_table_fix(Request $request)
    {
        $data = DB::table('m_table_master')->where('m_table_master_code', $request->code)->first();
        return $data->m_table_master_name . '<input type="text" name="table" id="table" value="' . $request->code . '" hidden>';
    }
    public function menu_search_category(Request $request)
    {
        if ($request->id == "all") {
            $data = DB::table('t_product')
                ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')->get();
        } else {
            $data = DB::table('t_product')
                ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')
                ->where('t_category.t_category_code', $request->id)->get();
        }
        return view('app.menu-order.option-category', ['data' => $data]);
    }
    public function menu_add_cart_product(Request $request)
    {
        $cek = DB::table('log_order_request')->where('no_order', $request->order)->where('t_product_code', $request->code)->first();
        if ($cek) {
            DB::table('log_order_request')->where('no_order', $request->order)->where('t_product_code', $request->code)->update([
                'quantity' => $cek->quantity + 1
            ]);
        } else {
            DB::table('log_order_request')->insert([
                'no_order' => $request->order,
                't_product_code' => $request->code,
                'quantity' => 1
            ]);
        }
        $data = DB::table('log_order_request')->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')->where('no_order', $request->order)->get();
        return view('app.menu-order.list-order', ['data' => $data]);
    }
    public function menu_confrim_order_customer(Request $request)
    {
        $table = DB::table('m_table_master')->where('m_table_master_code', $request->table)->first();
        $data = DB::table('log_order_request')
            ->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')
            ->where('log_order_request.no_order', $request->order)->get();
        return view('app.menu-order.confrim-order', ['data' => $data, 'table' => $table, 'order' => $request->order]);
    }
    public function menu_order_create_fix(Request $request)
    {
        DB::table('m_order_list')->insert([
            'no_reg_order' => $request->fix_order,
            'm_order_user' => 'user' . $request->fix_order,
            'm_order_table' => $request->no_table,
            'm_order_status' => 0,
            'm_order_no' => '089',
            'm_order_date' => now(),
            'userid' => Auth::user()->userid,
            'created_at' => now(),
        ]);
        $cek = DB::table('log_order_request')
            ->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')
            ->where('log_order_request.no_order', $request->fix_order)->get();
        foreach ($cek as $value) {
            DB::table('m_order_list_detail')->insert([
                'no_reg_order' => $request->fix_order,
                't_product_code' => $value->t_product_code,
                'order_qty' => $value->quantity,
                'order_price' => ($value->t_product_price - ($value->t_product_disc * $value->t_product_price) / 100) * $value->quantity,
                'order_status' => 0,
                'created_at' => now(),
            ]);
        }
        return '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading fw-semi-bold">Order Has Been Created!</h4>
                <p>No Order: ' . $request->fix_order . '</p>
                <hr />
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>';
    }
    public function menu_print_order_fix(Request $request)
    {
        $image = base64_encode(file_get_contents(public_path('resto.png')));
        // $qrcode = base64_encode(QrCode::format('png')->size(500)->errorCorrection('H')->generate('123123'));
        $reg = DB::table('m_order_list')
        ->join('m_table_master','m_table_master.m_table_master_code','=','m_order_list.m_order_table')
        ->where('m_order_list.no_reg_order',$request->fix_order)->first();
        $data = DB::table('log_order_request')
            ->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')
            ->where('log_order_request.no_order', $request->fix_order)->get();
        $pdf = PDF::loadview('app.menu-order.report.nota',['data'=>$data,'reg'=>$reg], compact('image'))->setPaper('A5', 'potrait')->setOptions(['defaultFont' => 'Courier']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2, "Multiply");

        $canvas->set_opacity(.1);

        // $canvas->page_text($width/5, $height/2, 'Lunas', '123', 30, array(22,0,0),1,2,0);
        $canvas->page_script('
            $pdf->set_opacity(.1);
            $pdf->image("resto.png", 80, 180, 255, 220);
            ');
        return base64_encode($pdf->stream());
    }

    // LIST ORDER
    public function list_order()
    {
        $data = DB::table('m_order_list')->orderBy('id', 'DESC')->get();
        return view('app.order-list',['data'=>$data]);
    }
    public function list_order_prosess(Request $request){
        $data = DB::table('m_order_list')
        ->join('m_table_master','m_table_master.m_table_master_code','=','m_order_list.m_order_table')
        ->where('m_order_list.no_reg_order',$request->code)->first();
        return view('app.list-order.proses',['data'=>$data]);
    }
    public function list_order_prosess_payment(Request $request){

        return view('app.list-order.choose-payment',['code'=>$request->code]);
    }
    public function list_order_prosess_payment_save(Request $request){
        DB::table('m_order_list')->where('no_reg_order',$request->code)->update(['m_order_status'=>1,'updated_at'=>now()]);
        return redirect()->back()->withSuccess('Great! Berhasil Melakukan Payment');
    }

    // KITCHEN
    public function kitchen_req(){
        $data = DB::table('m_order_list')->where('m_order_status',0)->get();
        return view('app.kitchen',['data'=>$data]);
    }
    public function kitchen_req_detail(Request $request){
        $data = DB::table('m_order_list')
        ->join('m_table_master','m_table_master.m_table_master_code','=','m_order_list.m_order_table')
        ->where('m_order_list.no_reg_order',$request->code)->first();

        return view('app.kitchen.detail',['data'=>$data]);
    }
    public function kitchen_req_check(Request $request){
        DB::table('m_order_list_detail')->where('id',$request->code)->update(['order_status'=>1]);
        return true;
    }
    public function kitchen_req_finish(Request $request){
        $check = DB::table('m_order_list_detail')->where('no_reg_order',$request->code)->where('order_status',0)->first();
        if (!$check) {
            DB::table('m_order_list')->where('no_reg_order',$request->code)->update(['m_order_status'=>1]);
        }
        return true;
    }

    // REKAP LAPORAN
    public function rekap_laporan(){
        return view('app.rekap-laporan');
    }
}
