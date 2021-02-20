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

//Route::get('/', function () {
//    return view('khachhang.index');
//});
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/home/info', [HomeController::class, 'info'])->name('home.info');
//Route::get('/admin', function () {
//    return view('admin.index');
//})->name('admin.index');
//
//Route::get('/admin/loaisanpham', 'App\Http\Controllers\Backend\loaisanphamController@index')->name('loaisanpham.index');
//Route::post('admin/loaisanpham/store', 'App\Http\Controllers\Backend\loaisanphamController@store')->name('loaisanpham.store');
////route get info edit loại sản phẩm
//Route::get('admin/loaisanpham/infoLoaiSanPham', 'App\Http\Controllers\Backend\loaisanphamController@getinfo')->name('loaisanpham.info');
//Route::put('admin/loaisanpham/update/{id}', 'App\Http\Controllers\Backend\loaisanphamController@update')->name('loaisanpham.update');
//Route::DELETE('admin/loaisanpham/destroy/{id}', 'App\Http\Controllers\Backend\loaisanphamController@destroy')->name('loaisanpham.destroy');
