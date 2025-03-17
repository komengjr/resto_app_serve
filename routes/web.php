<?php

use App\Http\Controllers\DashboarController;
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

Route::prefix('dashboard')->group(function () {
    Route::get('home', [DashboarController::class, 'index'])->name('dashboard.home');
    Route::get('news', [DashboarController::class, 'news'])->name('dashboard.news');
    Route::get('actifity', [DashboarController::class, 'actifity'])->name('dashboard.actifity');
    Route::get('profile', [DashboarController::class, 'profile'])->name('dashboard.profile');
    Route::get('setting', [DashboarController::class, 'setting'])->name('dashboard.setting');
});
