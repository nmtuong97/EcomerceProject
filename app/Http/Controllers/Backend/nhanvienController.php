<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nhan_vien;
use App\Models\users;
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
        $nhan_vien_ho_lot_vn = $request->nhan_vien_ho_lot_vn;
        $nhan_vien_ten_vn = $request->nhan_vien_ten_vn;
        $nhan_vien_username = $request->nhan_vien_email;
        $nhan_vien_mat_khau = md5(md5($request->nhan_vien_username));
        $nhan_vien_gioi_tinh = $request->nhan_vien_gioi_tinh;
        $nhan_vien_dia_chi = $request->nhan_vien_dia_chi;
        $nhan_vien_sdt = $request->nhan_vien_sdt;
        $nhan_vien_admin = $request->nhan_vien_admin;
        

        
        
        $model = new \App\Models\nhan_vien();
        $model->nhan_vien_ma = strtoupper($nhan_vien_ma);
        $model->nhan_vien_ho_lot = stripUnicode($nhan_vien_ho_lot_vn);
        $model->nhan_vien_ten = stripUnicode($nhan_vien_ten_vn);
        $model->nhan_vien_ho_lot_vn = $nhan_vien_ho_lot_vn;
        $model->nhan_vien_ten_vn = $nhan_vien_ten_vn;
        $model->nhan_vien_username = $nhan_vien_username;
        $model->nhan_vien_mat_khau = $nhan_vien_mat_khau;
        $model->nhan_vien_gioi_tinh = $nhan_vien_gioi_tinh;
        $model->nhan_vien_dia_chi = $nhan_vien_dia_chi;
        $model->nhan_vien_sdt = $nhan_vien_sdt;
        $model->nhan_vien_email = $nhan_vien_username;
        $model->nhan_vien_admin = $nhan_vien_admin;
        // Kiểm tra xem người dùng có upload hình ảnh Đại diện hay không?
        if ($request->hasFile('nhan_vien_hinh_anh')) {
            $file = $request->nhan_vien_hinh_anh;

            // Lưu tên hình vào column sp_hinh
            $model->nhan_vien_hinh_anh = "hinhanhnhanvien_".$nhan_vien_username.".".$file->getClientOriginalExtension();

            // Chép file vào thư mục "storate/public/photos"
            $file->storeAs('public/photos', $model->nhan_vien_hinh_anh);
        }

        $model->save();
        $id_nhan_vien = $model->nhan_vien_id;
        $model_user = new \App\Models\user();
        $model_user->name = $nhan_vien_ho_lot_vn." ".$nhan_vien_ten_vn;
        $model_user->email = $nhan_vien_username;
        $model_user->password = $nhan_vien_mat_khau;
        $model_user->nhan_vien_id = $id_nhan_vien;
        $model_user->save();
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
        
        $nhan_vien->nhan_vien_ho_lot_vn = $request->input('nhan_vien_ho_lot_vn');
        $nhan_vien->nhan_vien_ten_vn = $request->input('nhan_vien_ten_vn');
        $nhan_vien->nhan_vien_gioi_tinh = $request->input('nhan_vien_gioi_tinh');
        $nhan_vien->nhan_vien_dia_chi = $request->input('nhan_vien_dia_chi');
        $nhan_vien->nhan_vien_sdt = $request->input('nhan_vien_sdt');
        $nhan_vien->nhan_vien_admin = $request->input('nhan_vien_admin');
        
        if ($request->hasFile('nhan_vien_hinh_anh')) {
            $file = $request->nhan_vien_hinh_anh;

            // Lưu tên hình vào column sp_hinh
            $nhan_vien->nhan_vien_hinh_anh = "hinhanhnhanvien_".$nhan_vien->nhan_vien_username.".".$file->getClientOriginalExtension();

            // Chép file vào thư mục "storate/public/photos"
            $file->storeAs('public/photos', $nhan_vien->nhan_vien_hinh_anh);
        }
        $nhan_vien->save();
        
        $user = users::where('nhan_vien_id', $id)->first();
        $hoten = $nhan_vien->nhan_vien_ho_lot_vn." ".$nhan_vien->nhan_vien_ten_vn;
        if ($hoten !== $user->name) {
            $user->name = $hoten;
            $user->save();
        }
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('nhanvien.index');
    }
        public function destroy($id)
    {
        $user = users::where('nhan_vien_id', $id)->first();
        $user->delete();
        $nhan_vien = nhan_vien::find($id);
        $nhan_vien->delete();
    }
}
