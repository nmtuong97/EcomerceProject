<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ly_do;
use Session;
use App\Http\Requests\ly_do_create_request;
use App\Http\Requests\ly_do_update_request;

class lydoController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\ly_do::all();
        return view('admin.lydo.index')->with('data', $ds_sp);
    }
    public function store(ly_do_create_request $request)
    {
        $ly_do_ma = $request->ly_do_ma;
        $ly_do_ten_vn = $request->ly_do_ten_vn;
        $ly_do_ten_en = $request->ly_do_ten_en;
        $ly_do_loai = $request->ly_do_loai;
       
        $model = new \App\Models\ly_do();
        $model->ly_do_ma = strtoupper($ly_do_ma);
        $model->ly_do_ten = stripUnicode($ly_do_ten_vn);
        $model->ly_do_ten_vn = $ly_do_ten_vn;
        $model->ly_do_ten_en = $ly_do_ten_en;
        $model->ly_do_loai = $ly_do_loai;
        $model->save();
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('lydo.index'));
    }
    /**
     * Action AJAX get data edit 
     */
    public function getinfo(Request $request)
    {
        $data_find = ly_do::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
    
        //update 
    public function update(ly_do_update_request $request, $id)
    {
        $ly_do = ly_do::find($id);
        $ly_do->ly_do_ten = stripUnicode($request->input('ly_do_ten_vn'));
        $ly_do->ly_do_ten_vn = $request->input('ly_do_ten_vn');
        $ly_do->ly_do_ten_en = $request->input('ly_do_ten_en');
        $ly_do->save();
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('lydo.index');
    }
        public function destroy($id)
    {
        $loai = ly_do::find($id);
        $loai->delete();
    }
}
