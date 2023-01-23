<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/admin/add', [AdminController::class, 'add'])->name('admin.add');
Route::get('/admin/delete/{id}',[AdminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/edit/{id}',[AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{id}',[AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/view', [AdminController::class, 'view']);
Route::post('/admin/add', [AdminController::class, 'admin']);


