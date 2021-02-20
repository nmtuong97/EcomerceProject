<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nhan_vien;
use Session;
use App\Http\Requests\nhan_vien_create_request;
use App\Http\Requests\nhan_vien_update_request;

class nhanvienController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\nhan_vien::all();
        return view('admin.nhanvien.index')->with('data', $ds_sp);
    }
    public function store(nhan_vien_create_request $request)
    {
        $nhan_vien_ma = $request->nhan_vien_ma;
        $nhan_vien_ten_vn = $request->nhan_vien_ten_vn;
        $nhan_vien_ten_en = $request->nhan_vien_ten_en;
       
        $model = new \App\Models\nhan_vien();
        $model->nhan_vien_ma = strtoupper($nhan_vien_ma);
        $model->nhan_vien_ten = stripUnicode($nhan_vien_ten_vn);
        $model->nhan_vien_ten_vn = $nhan_vien_ten_vn;
        $model->nhan_vien_ten_en = $nhan_vien_ten_en;
        $model->save();
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('nhanvien.index'));
    }
    /**
     * Action AJAX get data edit 
     */
    public function getinfo(Request $request)
    {
        $data_find = nhan_vien::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
    
        //update 
    public function update(nhan_vien_update_request $request, $id)
    {
        $nhan_vien = nhan_vien::find($id);
        $nhan_vien->nhan_vien_ten = stripUnicode($request->input('nhan_vien_ten_vn'));
        $nhan_vien->nhan_vien_ten_vn = $request->input('nhan_vien_ten_vn');
        $nhan_vien->nhan_vien_ten_en = $request->input('nhan_vien_ten_en');
        $nhan_vien->save();
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('nhanvien.index');
    }
        public function destroy($id)
    {
        $loai = nhan_vien::find($id);
        $loai->delete();
    }
}
