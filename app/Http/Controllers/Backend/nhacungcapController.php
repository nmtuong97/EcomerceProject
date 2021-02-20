<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nha_cung_cap;
use Session;
use App\Http\Requests\nha_cung_cap_create_request;
use App\Http\Requests\nha_cung_cap_update_request;

class nhacungcapController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\nha_cung_cap::all();
        return view('admin.nhacungcap.index')->with('data', $ds_sp);
    }
    public function store(nha_cung_cap_create_request $request)
    {
        $ncc_ma = $request->ncc_ma;
        $ncc_ten_vn = $request->ncc_ten_vn;
        $ncc_ten_en = $request->ncc_ten_en;
       
        $model = new \App\Models\nha_cung_cap();
        $model->ncc_ma = strtoupper($ncc_ma);
        $model->ncc_ten = stripUnicode($ncc_ten_vn);
        $model->ncc_ten_vn = $ncc_ten_vn;
        $model->ncc_ten_en = $ncc_ten_en;
        $model->save();
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('nhacungcap.index'));
    }
    /**
     * Action AJAX get data edit 
     */
    public function getinfo(Request $request)
    {
        $data_find = nha_cung_cap::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
    
        //update 
    public function update(nha_cung_cap_update_request $request, $id)
    {
        $ncc = nha_cung_cap::find($id);
        $ncc->ncc_ten = stripUnicode($request->input('ncc_ten_vn'));
        $ncc->ncc_ten_vn = $request->input('ncc_ten_vn');
        $ncc->ncc_ten_en = $request->input('ncc_ten_en');
        $ncc->save();
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('nhacungcap.index');
    }
        public function destroy($id)
    {
        $loai = nha_cung_cap::find($id);
        $loai->delete();
    }
}
