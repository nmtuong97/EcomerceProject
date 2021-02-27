<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mau_sac;
use Session;
use App\Http\Requests\mau_sac_create_request;
use App\Http\Requests\mau_sac_update_request;

class mausacController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\mau_sac::all();
        return view('admin.mausac.index')->with('data', $ds_sp);
    }
    public function store(mau_sac_create_request $request)
    {
        $mau_sac_ma = $request->mau_sac_ma;
        $mau_sac_ten_vn = $request->mau_sac_ten_vn;
        $mau_sac_ten_en = $request->mau_sac_ten_en;
       
        $model = new \App\Models\mau_sac();
        $model->mau_sac_ma = strtoupper($mau_sac_ma);
        $model->mau_sac_ten = stripUnicode($mau_sac_ten_vn);
        $model->mau_sac_ten_vn = $mau_sac_ten_vn;
        $model->mau_sac_ten_en = $mau_sac_ten_en;
        $model->save();
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('mausac.index'));
    }
    /**
     * Action AJAX get data edit 
     */
    public function getinfo(Request $request)
    {
        $data_find = mau_sac::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
    
        //update 
    public function update(mau_sac_update_request $request, $id)
    {
        $mau_sac = mau_sac::find($id);
        $mau_sac->mau_sac_ten = stripUnicode($request->input('mau_sac_ten_vn'));
        $mau_sac->mau_sac_ten_vn = $request->input('mau_sac_ten_vn');
        $mau_sac->mau_sac_ten_en = $request->input('mau_sac_ten_en');
        $mau_sac->save();
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('mausac.index');
    }
    public function destroy($id)
    {
        $loai = mau_sac::find($id);
        $loai->delete();
    }
}
