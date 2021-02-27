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
Route::post('/home/login', [HomeController::class, 'login'])->name('home.login');
Route::post('/home/logoff', [HomeController::class, 'logoff'])->name('home.logoff');
Route::get('/home/logoffadmin', [HomeController::class, 'logoffadmin'])->name('home.logoffadmin');
Route::post('/home/addToCart', [HomeController::class, 'addToCart'])->name('home.addToCart');

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
//kích thước
Route::get('/admin/kichthuoc', 'App\Http\Controllers\Backend\kichthuocController@index')->name('kichthuoc.index');
Route::get('admin/kichthuoc/edit/{id}', 'App\Http\Controllers\Backend\kichthuocController@edit')->name('kichthuoc.edit');
Route::get('admin/kichthuoc/editfunction/{id}', 'App\Http\Controllers\Backend\kichthuocController@editfunction')->name('kichthuoc.editfunction');
Route::get('/admin/kichthuoc/create', 'App\Http\Controllers\Backend\kichthuocController@create')->name('kichthuoc.create');
Route::post('admin/kichthuoc/store', 'App\Http\Controllers\Backend\kichthuocController@store')->name('kichthuoc.store');
Route::get('admin/kichthuoc/infomausac', 'App\Http\Controllers\Backend\kichthuocController@getinfo')->name('kichthuoc.info');
Route::post('admin/kichthuoc/updateinfo', 'App\Http\Controllers\Backend\kichthuocController@updateinfo')->name('kichthuoc.updateinfo');
Route::get('admin/kichthuoc/getInfokichthuoc', 'App\Http\Controllers\Backend\kichthuocController@getInfokichthuoc')->name('kichthuoc.getInfokichthuoc');
Route::put('admin/kichthuoc/update/{id}', 'App\Http\Controllers\Backend\kichthuocController@update')->name('kichthuoc.update');
Route::DELETE('admin/kichthuoc/destroy/{id}', 'App\Http\Controllers\Backend\kichthuocController@destroy')->name('kichthuoc.destroy');
Route::POST('admin/kichthuoc/deleteavatar/{id}', 'App\Http\Controllers\Backend\kichthuocController@deleteAvatar')->name('kichthuoc.deleteavatar');
Route::POST('admin/kichthuoc/deleteimage/{id}', 'App\Http\Controllers\Backend\kichthuocController@deleteimage')->name('kichthuoc.deleteimage');
//Sản phẩm
Route::get('/admin/sanpham', 'App\Http\Controllers\Backend\sanphamController@index')->name('sanpham.index');
Route::get('admin/sanpham/edit/{id}', 'App\Http\Controllers\Backend\sanphamController@edit')->name('sanpham.edit');
Route::get('admin/sanpham/editfunction/{id}', 'App\Http\Controllers\Backend\sanphamController@editfunction')->name('sanpham.editfunction');
Route::get('/admin/sanpham/create', 'App\Http\Controllers\Backend\sanphamController@create')->name('sanpham.create');
Route::post('admin/sanpham/store', 'App\Http\Controllers\Backend\sanphamController@store')->name('sanpham.store');
Route::post('admin/sanpham/updateinfo', 'App\Http\Controllers\Backend\sanphamController@updateinfo')->name('sanpham.updateinfo');
Route::get('admin/sanpham/getInfoSanPham', 'App\Http\Controllers\Backend\sanphamController@getInfoSanPham')->name('sanpham.getInfoSanPham');
Route::put('admin/sanpham/update/{id}', 'App\Http\Controllers\Backend\sanphamController@update')->name('sanpham.update');
Route::DELETE('admin/sanpham/destroy/{id}', 'App\Http\Controllers\Backend\sanphamController@destroy')->name('sanpham.destroy');
Route::POST('admin/sanpham/deleteavatar/{id}', 'App\Http\Controllers\Backend\sanphamController@deleteAvatar')->name('sanpham.deleteavatar');
Route::POST('admin/sanpham/deleteimage/{id}', 'App\Http\Controllers\Backend\sanphamController@deleteimage')->name('sanpham.deleteimage');
