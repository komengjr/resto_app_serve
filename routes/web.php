<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DashboarController;
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

Route::prefix('menu')->group(function () {
    Route::get('list', [PublicController::class, 'list_menu'])->name('list_menu');
});

Route::prefix('dashboard')->group(function () {
    Route::get('home', [DashboarController::class, 'index'])->name('dashboard.home');
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
    Route::get('stok', [AppController::class, 'app_stok'])->name('app_stok');
    Route::post('stok/find', [AppController::class, 'app_stok_find'])->name('app_stok_find');
    Route::get('inventaris', [AppController::class, 'inventaris'])->name('inventaris');
    Route::get('order-list', [AppController::class, 'list_order'])->name('list_order');
    Route::get('order-menu', [AppController::class, 'menu_order'])->name('menu_order');
});

