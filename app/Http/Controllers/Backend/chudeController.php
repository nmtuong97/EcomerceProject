<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\chu_de;
use Session;
use App\Http\Requests\chu_de_create_request;
use App\Http\Requests\chu_de_update_request;

class chudeController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\chu_de::all();
        return view('admin.chude.index')->with('data', $ds_sp);
    }
    public function store(chu_de_create_request $request)
    {
        $chu_de_ma = $request->chu_de_ma;
        $chu_de_ten_vn = $request->chu_de_ten_vn;
        $chu_de_ten_en = $request->chu_de_ten_en;
       
        $model = new \App\Models\chu_de();
        $model->chu_de_ma = strtoupper($chu_de_ma);
        $model->chu_de_ten = stripUnicode($chu_de_ten_vn);
        $model->chu_de_ten_vn = $chu_de_ten_vn;
        $model->chu_de_ten_en = $chu_de_ten_en;
        $model->save();
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('chude.index'));
    }
    /**
     * Action AJAX get data edit 
     */
    public function getinfo(Request $request)
    {
        $data_find = chu_de::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
    
        //update 
    public function update(chu_de_update_request $request, $id)
    {
        $chu_de = chu_de::find($id);
        $chu_de->chu_de_ten = stripUnicode($request->input('chu_de_ten_vn'));
        $chu_de->chu_de_ten_vn = $request->input('chu_de_ten_vn');
        $chu_de->chu_de_ten_en = $request->input('chu_de_ten_en');
        $chu_de->save();
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('chude.index');
    }
        public function destroy($id)
    {
        $loai = chu_de::find($id);
        $loai->delete();
    }
}
