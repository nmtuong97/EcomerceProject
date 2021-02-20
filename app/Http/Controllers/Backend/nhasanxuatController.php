<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nha_san_xuat;
use Session;
use App\Http\Requests\nha_san_xuat_create_request;
use App\Http\Requests\nsx_update_request;

class nhasanxuatController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\nha_san_xuat::all();
        return view('admin.nhasanxuat.index')->with('data', $ds_sp);
    }
    public function store(nha_san_xuat_create_request $request)
    {
        $nsx_ma = $request->nsx_ma;
        $nsx_ten_vn = $request->nsx_ten_vn;
        $nsx_ten_en = $request->nsx_ten_en;
       
        $model = new \App\Models\nha_san_xuat();
        $model->nsx_ma = strtoupper($nsx_ma);
        $model->nsx_ten = stripUnicode($nsx_ten_vn);
        $model->nsx_ten_vn = $nsx_ten_vn;
        $model->nsx_ten_en = $nsx_ten_en;
        $model->save();
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('nhasanxuat.index'));
    }
    /**
     * Action AJAX get data edit 
     */
    public function getinfo(Request $request)
    {
        $data_find = nha_san_xuat::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
    
        //update 
    public function update(nsx_update_request $request, $id)
    {
        $nsx = nha_san_xuat::find($id);
        $nsx->nsx_ten = stripUnicode($request->input('nsx_ten_vn'));
        $nsx->nsx_ten_vn = $request->input('nsx_ten_vn');
        $nsx->nsx_ten_en = $request->input('nsx_ten_en');
        $nsx->save();
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('nhasanxuat.index');
    }
        public function destroy($id)
    {
        $loai = nha_san_xuat::find($id);
        $loai->delete();
    }
}
