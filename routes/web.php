<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BikesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Hash;


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

Route::get('/', function() {
    $admin = \App\Models\Admin::all();
    return view('bike&car_rentals', compact('admin'));
});

Route::get('/index', [UserController::class, 'index'])->name('index');

Route::get('/admin/add', [AdminController::class, 'adminadd'])->name('admin.add');
Route::get('/admin/delete/{id}',[AdminController::class, 'admindelete'])->name('admin.delete');
Route::get('/admin/edit/{id}',[AdminController::class, 'adminedit'])->name('admin.edit');
Route::post('/admin/update/{id}',[AdminController::class, 'adminupdate'])->name('admin.update');
Route::get('/admin/view', [AdminController::class, 'adminview'])->name('admin.view');
Route::post('/admin/add', [AdminController::class, 'admin']);

Route::get('/bikes/add', [BikesController::class, 'bikesadd'])->name('bikes.add');
Route::get('/bikes/delete/{id}',[BikesController::class, 'bikesdelete'])->name('bikes.delete');
Route::get('/bikes/edit/{id}',[BikesController::class, 'bikesedit'])->name('bikes.edit');
Route::post('/bikes/update/{id}',[BikesController::class, 'bikesupdate'])->name('bikes.update');
Route::get('/bikes/view', [BikesController::class, 'bikesview'])->name('bikes.view');
Route::post('/bikes/add', [BikesController::class, 'bikes']);


Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//custom routes
Route::post('/customLogin',[\App\Http\Controllers\CustomAuthController::class, 'customLogin'])->name('customLogin');
Route::post('/customRegister',[\App\Http\Controllers\CustomAuthController::class, 'customRegister'])->name('customRegister');
Route::get('/customLogout',[\App\Http\Controllers\CustomAuthController::class, 'customLogout'])->name('customLogout');
Route::get('/customLoginForm',[\App\Http\Controllers\CustomAuthController::class, 'showLoginForm'])->name('custom.login.show');
Route::get('/customRegisterForm',[\App\Http\Controllers\CustomAuthController::class, 'showRegisterForm'])->name('custom.register.show');


//OTP
Route::get('/verify', [\App\Http\Controllers\CustomAuthController::class,'showOtpForm'])->name('verify');
Route::post('/otp-verify/{id}', [\App\Http\Controllers\CustomAuthController::class,'verifyOtp'])->name('otp.verify');

