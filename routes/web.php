<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
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
    return view('khachhang.index');
});
Route::get('/', [HomeController::class, 'index'])->name('khachhang.index');
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

Route::get('/admin/loaisanpham', 'App\Http\Controllers\Backend\loaisanphamController@index')->name('loaisanpham.index');
