<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loai_san_pham;
use Validator;
use Session;
use App\Http\Requests\loai_san_pham_request;
use App\Http\Requests\loai_san_pham_update_request;

class loaisanphamController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\loai_san_pham::all();
        return view('admin.loaisanpham.index')->with('data', $ds_sp);
    }
    public function store(loai_san_pham_request $request)
    {
        $loai_san_pham_ma = $request->loai_san_pham_ma;
        $loai_san_pham_ten_vn = $request->loai_san_pham_ten_vn;
        $loai_san_pham_ten_en = $request->loai_san_pham_ten_en;
       
        $m_loai = new \App\Models\loai_san_pham();
        $m_loai->loai_san_pham_ma = strtoupper($loai_san_pham_ma);
        $m_loai->loai_san_pham_ten = stripUnicode($loai_san_pham_ten_vn);
        $m_loai->loai_san_pham_ten_vn = $loai_san_pham_ten_vn;
        $m_loai->loai_san_pham_ten_en = $loai_san_pham_ten_en;
        $m_loai->save();
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('loaisanpham.index'));
    }
    
    /**
     * Action AJAX get data edit loại sản phẩm
     */
    public function getinfo(Request $request)
    {
        $loai_san_pham = loai_san_pham::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $loai_san_pham,
        ));
    }
    //update loại sản phẩm
    public function update(loai_san_pham_update_request $request, $id)
    {
        $loai_san_pham = loai_san_pham::find($id);
        $loai_san_pham->loai_san_pham_ten = stripUnicode($request->input('loai_san_pham_ten_vn'));
        $loai_san_pham->loai_san_pham_ten_vn = $request->input('loai_san_pham_ten_vn');
        $loai_san_pham->loai_san_pham_ten_en = $request->input('loai_san_pham_ten_en');
        $loai_san_pham->save();
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('loaisanpham.index');
    }
    //xóa
    public function destroy($id)
    {
        $loai = loai_san_pham::find($id);
        $loai->delete();
    }
    
    public function print() {
        $ds_loai = loai_san_pham::all();

        return view('loaisanpham.print')
            ->with('data', $ds_loai);
        }
    
    
    
}
