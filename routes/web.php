<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BikesController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportsController;
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

Route::get('/', function() {
    $bikes = \App\Models\Bikes::all();
    return view('bike&car_rentals', compact('bikes'));
});

Route::get('/index', [UserController::class, 'index'])->name('index');

Route::get('/admin/add', [AdminController::class, 'adminadd'])->name('admin.add');
Route::get('/admin/delete/{id}',[AdminController::class, 'admindelete'])->name('admin.delete');
Route::get('/admin/edit/{id}',[AdminController::class, 'adminedit'])->name('admin.edit');
Route::post('/admin/update/{id}',[AdminController::class, 'adminupdate'])->name('admin.update');
Route::get('/admin/view', [AdminController::class, 'adminview'])->name('admin.view');

Route::post('/admin/add', [AdminController::class, 'admin']);

//Bikes
Route::get('/bikes/add', [\App\Http\Controllers\BikesController::class, 'bikesadd'])->name('bikes.add');
Route::get('/bikes/delete/{id}',[\App\Http\Controllers\BikesController::class, 'bikesdelete'])->name('bikes.delete');
Route::get('/bikes/edit/{id}',[\App\Http\Controllers\BikesController::class, 'bikesedit'])->name('bikes.edit');
Route::post('/bikes/update/{id}',[\App\Http\Controllers\BikesController::class, 'bikesupdate'])->name('bikes.update');
Route::get('/bikes/view', [\App\Http\Controllers\BikesController::class, 'bikesview'])->name('bikes.view');
Route::post('/bikes/add', [\App\Http\Controllers\BikesController::class, 'bikes']);


Route::get('/dashboard',[BikesController::class, 'dashboard'])->name('dashboard');


//Cars
Route::get('/cars/add', [CarsController::class, 'carsadd'])->name('cars.add');
Route::get('/cars/delete/{id}',[CarsController::class, 'carsdelete'])->name('cars.delete');
Route::get('/cars/edit/{id}',[CarsController::class, 'carsedit'])->name('cars.edit');
Route::post('/cars/update/{id}',[CarsController::class, 'carsupdate'])->name('cars.update');
Route::get('/cars/view', [CarsController::class, 'carsview'])->name('cars.view');
Route::post('/cars/add', [CarsController::class, 'cars']);


Route::get('/dashboard',[CarsController::class, 'dashboard'])->name('dashboard');


//Driver
Route::get('/driver/add', [DriverController::class, 'driveradd'])->name('driver.add');
Route::get('/driver/delete/{id}',[DriverController::class, 'driverdelete'])->name('driver.delete');
Route::get('/driver/edit/{id}',[DriverController::class, 'driveredit'])->name('driver.edit');
Route::post('/driver/update/{id}',[DriverController::class, 'driverupdate'])->name('driver.update');
Route::get('/driver/view', [DriverController::class, 'driverview'])->name('driver.view');
Route::post('/driver/add', [DriverController::class, 'driver']);


Route::get('/dashboard',[DriverController::class, 'dashboard'])->name('dashboard');


//Rentals
Route::get('/rentals/add', [RentalsController::class, 'rentalsadd'])->name('rentals.add');
Route::get('/rentals/delete/{id}',[RentalsController::class, 'rentalsdelete'])->name('rentals.delete');
Route::get('/rentals/edit/{id}',[RentalsController::class, 'rentalsedit'])->name('rentals.edit');
Route::post('/rentals/update/{id}',[RentalsController::class, 'rentalsupdate'])->name('rentals.update');
Route::get('/rentals/view', [RentalsController::class, 'rentalsview'])->name('rentals.view');
Route::post('/rentals/add', [RentalsController::class, 'rentals']);


Route::get('/dashboard',[RentalsController::class, 'dashboard'])->name('dashboard');



//Customer
Route::get('/customer/add', [CustomerController::class, 'customeradd'])->name('customer.add');
Route::get('/customer/delete/{id}',[CustomerController::class, 'customerdelete'])->name('customer.delete');
Route::get('/customer/edit/{id}',[CustomerController::class, 'customeredit'])->name('customer.edit');
Route::post('/customer/update/{id}',[CustomerController::class, 'customerupdate'])->name('customer.update');
Route::get('/customer/view', [CustomerController::class, 'customerview'])->name('customer.view');
Route::post('/customer/add', [CustomerController::class, 'customer']);


Route::get('/dashboard',[CustomerController::class, 'dashboard'])->name('dashboard');


//Transaction
Route::get('/transaction/add', [TransactionController::class, 'transactionadd'])->name('transaction.add');
Route::get('/transaction/delete/{id}',[TransactionController::class, 'transactiondelete'])->name('transaction.delete');
Route::get('/transaction/edit/{id}',[TransactionController::class, 'transactionedit'])->name('transaction.edit');
Route::post('/transaction/update/{id}',[TransactionController::class, 'transactionupdate'])->name('transaction.update');
Route::get('/transaction/view', [TransactionController::class, 'transactionview'])->name('transaction.view');
Route::post('/transaction/add', [TransactionController::class, 'transaction']);


Route::get('/dashboard',[TransactionController::class, 'dashboard'])->name('dashboard');


//Reports
Route::get('/reports/add', [ReportsController::class, 'reportsadd'])->name('reports.add');
Route::get('/reports/delete/{id}',[ReportsController::class, 'reportsdelete'])->name('reports.delete');
Route::get('/reports/edit/{id}',[ReportsController::class, 'reportsedit'])->name('reports.edit');
Route::post('/reports/update/{id}',[ReportsController::class, 'reportsupdate'])->name('reports.update');
Route::get('/reports/view', [ReportsController::class, 'reportsview'])->name('reports.view');
Route::post('/reports/add', [ReportsController::class, 'reports']);


Route::get('/dashboard',[ReportsController::class, 'dashboard'])->name('dashboard');


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

