<?php

use Illuminate\Support\Facades\Route;
use App\\Models\Admin;
use App\\Models\Bikes;
use App\\Models\Cars;
use App\\Models\Customer;
use App\\Models\Driver;
use App\\Models\Rentals;
use App\\Models\Reports;
use App\\Models\Transaction;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',function(){
    $admin = Admin::all();
    echo "<pre>";
    print_r($admin->toArray());
});

Route::get('/bikes',function(){
    $bikes = Bikes::all();
    echo "<pre>";
    print_r($bikes->toArray());
});

Route::get('/cars',function(){
    $cars = Cars::all();
    echo "<pre>";
    print_r($cars->toArray());
});

Route::get('/customer',function(){
    $customer = Customer::all();
    echo "<pre>";
    print_r($customer->toArray());
});

Route::get('/driver',function(){
    $driver = Driver::all();
    echo "<pre>";
    print_r($driver->toArray());
});

Route::get('/rentals',function(){
    $rentals = Rentals::all();
    echo "<pre>";
    print_r($rentals->toArray());
});

Route::get('/reports',function(){
    $reports = Reports::all();
    echo "<pre>";
    print_r($reports->toArray());
});

Route::get('/transaction',function(){
    $transaction = Transaction::all();
    echo "<pre>";
    print_r($transaction->toArray());
});
