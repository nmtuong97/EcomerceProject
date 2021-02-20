<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\don_vi_van_chuyen;
use Session;
use App\Http\Requests\don_vi_van_chuyen_create_request;
use App\Http\Requests\don_vi_van_chuyen_update_request;

class donvivanchuyenController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\don_vi_van_chuyen::all();
        return view('admin.donvivanchuyen.index')->with('data', $ds_sp);
    }
    public function store(don_vi_van_chuyen_create_request $request)
    {
        $don_vi_van_chuyen_ma = $request->don_vi_van_chuyen_ma;
        $don_vi_van_chuyen_ten_vn = $request->don_vi_van_chuyen_ten_vn;
        $don_vi_van_chuyen_ten_en = $request->don_vi_van_chuyen_ten_en;
        $don_vi_van_chuyen_gia_goc = $request->don_vi_van_chuyen_gia_goc;
        $don_vi_van_chuyen_gia = $request->don_vi_van_chuyen_gia;
       
        $model = new \App\Models\don_vi_van_chuyen();
        $model->don_vi_van_chuyen_ma = strtoupper($don_vi_van_chuyen_ma);
        $model->don_vi_van_chuyen_ten = stripUnicode($don_vi_van_chuyen_ten_vn);
        $model->don_vi_van_chuyen_ten_vn = $don_vi_van_chuyen_ten_vn;
        $model->don_vi_van_chuyen_ten_en = $don_vi_van_chuyen_ten_en;
        $model->don_vi_van_chuyen_gia_goc = $don_vi_van_chuyen_gia_goc;
        $model->don_vi_van_chuyen_gia = $don_vi_van_chuyen_gia;
        $model->save();
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('donvivanchuyen.index'));
    }
    /**
     * Action AJAX get data edit 
     */
    public function getinfo(Request $request)
    {
        $data_find = don_vi_van_chuyen::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
    
        //update 
    public function update(don_vi_van_chuyen_update_request $request, $id)
    {
        $don_vi_van_chuyen = don_vi_van_chuyen::find($id);
        $don_vi_van_chuyen->don_vi_van_chuyen_ten = stripUnicode($request->input('don_vi_van_chuyen_ten_vn'));
        $don_vi_van_chuyen->don_vi_van_chuyen_ten_vn = $request->input('don_vi_van_chuyen_ten_vn');
        $don_vi_van_chuyen->don_vi_van_chuyen_ten_en = $request->input('don_vi_van_chuyen_ten_en');
        $don_vi_van_chuyen->don_vi_van_chuyen_gia_goc = $request->input('don_vi_van_chuyen_gia_goc');
        $don_vi_van_chuyen->don_vi_van_chuyen_gia = $request->input('don_vi_van_chuyen_gia');
        $don_vi_van_chuyen->save();
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('donvivanchuyen.index');
    }
        public function destroy($id)
    {
        $loai = don_vi_van_chuyen::find($id);
        $loai->delete();
    }
}
