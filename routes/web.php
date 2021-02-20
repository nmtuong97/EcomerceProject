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

//Loại sản phẩm
//Route::get('/admin/loaisanpham/print', 'App\Http\Controllers\Backend\loaisanphamController@print')->name('loaisanpham.print');
//Route::get('/admin/loaisanpham/excel', 'App\Http\Controllers\Backend\loaisanphamController@excel')->name('loaisanpham.excel');
Route::get('/admin/loaisanpham', 'App\Http\Controllers\Backend\loaisanphamController@index')->name('loaisanpham.index');
Route::post('admin/loaisanpham/store', 'App\Http\Controllers\Backend\loaisanphamController@store')->name('loaisanpham.store');
Route::get('admin/loaisanpham/infoLoaiSanPham', 'App\Http\Controllers\Backend\loaisanphamController@getinfo')->name('loaisanpham.info');
Route::put('admin/loaisanpham/update/{id}', 'App\Http\Controllers\Backend\loaisanphamController@update')->name('loaisanpham.update');
Route::DELETE('admin/loaisanpham/destroy/{id}', 'App\Http\Controllers\Backend\loaisanphamController@destroy')->name('loaisanpham.destroy');
//Nhà sản xuất
Route::get('/admin/nhasanxuat', 'App\Http\Controllers\Backend\nhasanxuatController@index')->name('nhasanxuat.index');
Route::post('admin/nhasanxuat/store', 'App\Http\Controllers\Backend\nhasanxuatController@store')->name('nhasanxuat.store');
Route::get('admin/nhasanxuat/infonhasanxuat', 'App\Http\Controllers\Backend\nhasanxuatController@getinfo')->name('nhasanxuat.info');
Route::put('admin/nhasanxuat/update/{id}', 'App\Http\Controllers\Backend\nhasanxuatController@update')->name('nhasanxuat.update');
Route::DELETE('admin/nhasanxuat/destroy/{id}', 'App\Http\Controllers\Backend\nhasanxuatController@destroy')->name('nhasanxuat.destroy');
//Nhà cung cấp
Route::get('/admin/nhacungcap', 'App\Http\Controllers\Backend\nhacungcapController@index')->name('nhacungcap.index');
Route::post('admin/nhacungcap/store', 'App\Http\Controllers\Backend\nhacungcapController@store')->name('nhacungcap.store');
Route::get('admin/nhacungcap/infonhacungcap', 'App\Http\Controllers\Backend\nhacungcapController@getinfo')->name('nhacungcap.info');
Route::put('admin/nhacungcap/update/{id}', 'App\Http\Controllers\Backend\nhacungcapController@update')->name('nhacungcap.update');
Route::DELETE('admin/nhacungcap/destroy/{id}', 'App\Http\Controllers\Backend\nhacungcapController@destroy')->name('nhacungcap.destroy');
//Chủ đề
Route::get('/admin/chude', 'App\Http\Controllers\Backend\chudeController@index')->name('chude.index');
Route::post('admin/chude/store', 'App\Http\Controllers\Backend\chudeController@store')->name('chude.store');
Route::get('admin/chude/infochude', 'App\Http\Controllers\Backend\chudeController@getinfo')->name('chude.info');
Route::put('admin/chude/update/{id}', 'App\Http\Controllers\Backend\chudeController@update')->name('chude.update');
Route::DELETE('admin/chude/destroy/{id}', 'App\Http\Controllers\Backend\chudeController@destroy')->name('chude.destroy');
//Màu sắc
Route::get('/admin/mausac', 'App\Http\Controllers\Backend\mausacController@index')->name('mausac.index');
Route::post('admin/mausac/store', 'App\Http\Controllers\Backend\mausacController@store')->name('mausac.store');
Route::get('admin/mausac/infomausac', 'App\Http\Controllers\Backend\mausacController@getinfo')->name('mausac.info');
Route::put('admin/mausac/update/{id}', 'App\Http\Controllers\Backend\mausacController@update')->name('mausac.update');
Route::DELETE('admin/mausac/destroy/{id}', 'App\Http\Controllers\Backend\mausacController@destroy')->name('mausac.destroy');
//Lý do
Route::get('/admin/lydo', 'App\Http\Controllers\Backend\lydoController@index')->name('lydo.index');
Route::post('admin/lydo/store', 'App\Http\Controllers\Backend\lydoController@store')->name('lydo.store');
Route::get('admin/lydo/infolydo', 'App\Http\Controllers\Backend\lydoController@getinfo')->name('lydo.info');
Route::put('admin/lydo/update/{id}', 'App\Http\Controllers\Backend\lydoController@update')->name('lydo.update');
Route::DELETE('admin/lydo/destroy/{id}', 'App\Http\Controllers\Backend\lydoController@destroy')->name('lydo.destroy');
//Đơn vị vận chuyển
Route::get('/admin/donvivanchuyen', 'App\Http\Controllers\Backend\donvivanchuyenController@index')->name('donvivanchuyen.index');
Route::post('admin/donvivanchuyen/store', 'App\Http\Controllers\Backend\donvivanchuyenController@store')->name('donvivanchuyen.store');
Route::get('admin/donvivanchuyen/infodonvivanchuyen', 'App\Http\Controllers\Backend\donvivanchuyenController@getinfo')->name('donvivanchuyen.info');
Route::put('admin/donvivanchuyen/update/{id}', 'App\Http\Controllers\Backend\donvivanchuyenController@update')->name('donvivanchuyen.update');
Route::DELETE('admin/donvivanchuyen/destroy/{id}', 'App\Http\Controllers\Backend\donvivanchuyenController@destroy')->name('donvivanchuyen.destroy');
//Nhân viên
Route::get('/admin/nhanvien', 'App\Http\Controllers\Backend\nhanvienController@index')->name('nhanvien.index');
Route::post('admin/nhanvien/store', 'App\Http\Controllers\Backend\nhanvienController@store')->name('nhanvien.store');
Route::get('admin/nhanvien/infonhanvien', 'App\Http\Controllers\Backend\nhanvienController@getinfo')->name('nhanvien.info');
Route::put('admin/nhanvien/update/{id}', 'App\Http\Controllers\Backend\nhanvienController@update')->name('nhanvien.update');
Route::DELETE('admin/nhanvien/destroy/{id}', 'App\Http\Controllers\Backend\nhanvienController@destroy')->name('nhanvien.destroy');
