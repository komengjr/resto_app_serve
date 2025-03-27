<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(App\Http\Controllers\Auth\AuthController::class)->group(function () {
    Route::get('/', 'fisrt')->name('/');
    Route::get('login', 'index')->name('login');
    Route::get('registration', 'registration')->name('register');
    Route::get('confrim_user', 'confrim_user')->name('confrim_user');
    Route::get('register_status', 'register_status')->name('register_status');
    Route::get('forget_password', 'forget_password')->name('forget_password');
    Route::get('logout', 'logout')->name('logout');
    Route::post('post-registration', 'postRegistration')->name('register.post');
    Route::post('post-login', 'postLogin')->name('login.post');
    // Route::get('dashboard', [AuthController::class, 'dashboard']);
});

Route::prefix('/')->group(function () {
    Route::get('menu', [PublicController::class, 'list_menu'])->name('list_menu');
    Route::get('brand', [PublicController::class, 'brand'])->name('brand');
    Route::get('about', [PublicController::class, 'about'])->name('about');
    Route::get('contact', [PublicController::class, 'contact'])->name('contact');
});

Route::prefix('dashboard')->group(function () {
    Route::get('home', [DashboarController::class, 'index'])->name('dashboard.home');
    Route::post('notification', [DashboarController::class, 'dashboard_notif'])->name('dashboard_notif');
    Route::get('news', [DashboarController::class, 'news'])->name('dashboard.news');
    Route::get('actifity', [DashboarController::class, 'actifity'])->name('dashboard.actifity');
    Route::get('profile', [DashboarController::class, 'profile'])->name('dashboard.profile');
    Route::get('setting', [DashboarController::class, 'setting'])->name('dashboard.setting');
});

Route::prefix('app')->group(function () {
    Route::get('category', [AppController::class, 'app_category'])->name('app_category');
    Route::post('category/add', [AppController::class, 'app_category_add'])->name('app_category_add');
    Route::post('category/save', [AppController::class, 'app_category_save'])->name('app_category_save');
    Route::post('category/edit', [AppController::class, 'app_category_edit'])->name('app_category_edit');
    Route::post('category/update', [AppController::class, 'app_category_update'])->name('app_category_update');
    Route::get('product', [AppController::class, 'app_product'])->name('app_product');
    Route::post('product/add', [AppController::class, 'app_product_add'])->name('app_product_add');
    Route::post('product/save', [AppController::class, 'app_product_save'])->name('app_product_save');
    Route::post('product/display', [AppController::class, 'app_product_display'])->name('app_product_display');
    Route::post('product/edit', [AppController::class, 'app_product_edit'])->name('app_product_edit');
    Route::post('product/update', [AppController::class, 'app_product_update'])->name('app_product_update');
    Route::post('product/detail', [AppController::class, 'app_product_detail'])->name('app_product_detail');

    Route::get('stok', [AppController::class, 'app_stok'])->name('app_stok');
    Route::post('stok/find', [AppController::class, 'app_stok_find'])->name('app_stok_find');
    Route::post('stok/find-search', [AppController::class, 'app_stok_find_search'])->name('app_stok_find_search');
    Route::post('stok/find-detail', [AppController::class, 'app_stok_find_detail'])->name('app_stok_find_detail');

    Route::get('table', [AppController::class, 'app_table'])->name('app_table');
    Route::post('table/add', [AppController::class, 'app_table_add'])->name('app_table_add');
    Route::post('table/save', [AppController::class, 'app_table_save'])->name('app_table_save');
    Route::get('inventaris', [AppController::class, 'inventaris'])->name('inventaris');

    Route::get('order-menu', [AppController::class, 'menu_order'])->name('menu_order');
    Route::post('order-menu/create-order', [AppController::class, 'menu_order_create'])->name('menu_order_create');
    Route::post('order-menu/create-order-table', [AppController::class, 'menu_order_create_table'])->name('menu_order_create_table');
    Route::post('order-menu/create-order-table-fix', [AppController::class, 'menu_order_create_table_fix'])->name('menu_order_create_table_fix');
    Route::post('order-menu/create-order-fix', [AppController::class, 'menu_order_create_fix'])->name('menu_order_create_fix');
    Route::post('order-menu/print-order-fix', [AppController::class, 'menu_print_order_fix'])->name('menu_print_order_fix');
    Route::post('order-menu/menu-search-category', [AppController::class, 'menu_search_category'])->name('menu_search_category');
    Route::post('order-menu/add-cart-product', [AppController::class, 'menu_add_cart_product'])->name('menu_add_cart_product');
    Route::post('order-menu/confrim-order-customer', [AppController::class, 'menu_confrim_order_customer'])->name('menu_confrim_order_customer');

    Route::get('order-list', [AppController::class, 'list_order'])->name('list_order');
    Route::post('order-list/prosess', [AppController::class, 'list_order_prosess'])->name('list_order_prosess');
    Route::post('order-list/payment', [AppController::class, 'list_order_prosess_payment'])->name('list_order_prosess_payment');
    Route::post('order-list/payment-save', [AppController::class, 'list_order_prosess_payment_save'])->name('list_order_prosess_payment_save');
    Route::post('order-list/print-invoice', [AppController::class, 'list_order_print_invoice'])->name('list_order_print_invoice');
    Route::post('order-list/detail-order', [AppController::class, 'list_order_detail'])->name('list_order_detail');

    Route::get('kitchen-request', [AppController::class, 'kitchen_req'])->name('kitchen_req');
    Route::post('kitchen-request/detail', [AppController::class, 'kitchen_req_detail'])->name('kitchen_req_detail');
    Route::post('kitchen-request/check', [AppController::class, 'kitchen_req_check'])->name('kitchen_req_check');
    Route::post('kitchen-request/finish', [AppController::class, 'kitchen_req_finish'])->name('kitchen_req_finish');

    Route::get('rekap-laporan', [AppController::class, 'rekap_laporan'])->name('rekap_laporan');
});

Route::prefix('master')->group(function () {
    Route::get('user', [MasterController::class, 'master_user'])->name('master_user');
    Route::post('user/add', [MasterController::class, 'master_user_add'])->name('master_user_add');
    Route::post('user/save', [MasterController::class, 'master_user_save'])->name('master_user_save');
    Route::get('menu', [MasterController::class, 'master_menu'])->name('master_menu');
    Route::post('menu/add', [MasterController::class, 'master_menu_add'])->name('master_menu_add');
    Route::post('menu/save', [MasterController::class, 'master_menu_save'])->name('master_menu_save');
    Route::get('menu-akses', [MasterController::class, 'master_akses_menu'])->name('master_akses_menu');
    Route::post('menu-akses/detail', [MasterController::class, 'master_akses_menu_detail'])->name('master_akses_menu_detail');
    Route::post('menu-akses/setup-menu', [MasterController::class, 'master_akses_setup_menu'])->name('master_akses_setup_menu');
    Route::post('menu-akses/setup-menu-verif', [MasterController::class, 'master_akses_setup_menu_verif'])->name('master_akses_setup_menu_verif');
    Route::get('setting', [MasterController::class, 'master_setting'])->name('master_setting');
});


// PAYMENT
Route::prefix('payment')->group(function () {
    Route::post('token', [PaymentController::class, 'payemnt_token'])->name('create-payemnt-token');
});
