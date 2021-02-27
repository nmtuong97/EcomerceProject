<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kich_thuoc;
use Session;
use App\Http\Requests\kich_thuoc_create_request;
use App\Http\Requests\kich_thuoc_update_request;

class kichthuocController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\kich_thuoc::all();
        return view('admin.kichthuoc.index')->with('data', $ds_sp);
    }
    public function store(kich_thuoc_create_request $request)
    {
        $kich_thuoc_ma = $request->kich_thuoc_ma;
        $kich_thuoc_ten_vn = $request->kich_thuoc_ten_vn;
        $kich_thuoc_ten_en = $request->kich_thuoc_ten_en;
        $kich_thuoc_dien_giai = $request->kich_thuoc_dien_giai;
       
        $model = new \App\Models\kich_thuoc();
        $model->kich_thuoc_ma = strtoupper($kich_thuoc_ma);
        $model->kich_thuoc_ten = stripUnicode($kich_thuoc_ten_vn);
        $model->kich_thuoc_ten_vn = $kich_thuoc_ten_vn;
        $model->kich_thuoc_ten_en = $kich_thuoc_ten_en;
        $model->kich_thuoc_dien_giai = $kich_thuoc_dien_giai;
        $model->save();
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('kichthuoc.index'));
    }
    /**
     * Action AJAX get data edit 
     */
    public function getinfo(Request $request)
    {
        $data_find = kich_thuoc::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
    
        //update 
    public function update(kich_thuoc_update_request $request, $id)
    {
        $kich_thuoc = kich_thuoc::find($id);
        $kich_thuoc->kich_thuoc_ten = stripUnicode($request->input('kich_thuoc_ten_vn'));
        $kich_thuoc->kich_thuoc_ten_vn = $request->input('kich_thuoc_ten_vn');
        $kich_thuoc->kich_thuoc_ten_en = $request->input('kich_thuoc_ten_en');
        $kich_thuoc->kich_thuoc_dien_giai = $request->input('kich_thuoc_dien_giai');
        $kich_thuoc->save();
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('kichthuoc.index');
    }
        public function destroy($id)
    {
        $loai = kich_thuoc::find($id);
        $loai->delete();
    }
}
