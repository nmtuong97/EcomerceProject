<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class nhan_vien_create_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'nhan_vien_ma' => 'required|min:3|max:50|regex:/^[a-zA-Z0-9]+$/u|unique:nhan_vien',
            'nhan_vien_ho_lot_vn' => 'required|min:2|max:50',
            'nhan_vien_ten_vn' => 'required|min:2|max:255',
            'nhan_vien_gioi_tinh' => 'required',
            'nhan_vien_email' => 'required|email|unique:nhan_vien',
            'nhan_vien_sdt' => 'required|max:12|regex:/^[0-9+]+$/u',
            'nhan_vien_dia_chi' => 'required|min:3|max:255',
            'nhan_vien_admin' => 'required',
        ];
    }
    public function messages() 
    {
        return [
            'nhan_vien_ma.required' => 'Mã nhân viên không được để trống',
            'nhan_vien_ma.unique' => 'Mã nhân viên đã tồn tại',
            'nhan_vien_ma.min' => 'Mã nhân viên phải lớn hơn 3 ký tự',
            'nhan_vien_ma.max' => 'Mã nhân viên không được lớn hơn 50 ký tự',
            'nhan_vien_ma.regex' => 'Mã nhân viên không hợp lệ',
            
            'nhan_vien_ho_lot_vn.required' => 'Họ lót nhân viên không được để trống',
            'nhan_vien_ho_lot_vn.min' => 'Họ lót nhân viên phải lớn hơn 2 ký tự',
            'nhan_vien_ho_lot_vn.max' => 'Họ lót nhân viên không được lớn hơn 50 ký tự',
            'nhan_vien_ho_lot_vn.regex' => 'Họ lót nhân viên không hợp lệ',
            
            'nhan_vien_ten_vn.required' => 'Tên nhân viên không được để trống',
            'nhan_vien_ten_vn.min' => 'Tên nhân viên phải lớn hơn 2 ký tự',
            'nhan_vien_ten_vn.max' => 'Tên nhân viên không được lớn hơn 255 ký tự',
            'nhan_vien_ten_vn.regex' => 'Tên nhân viên không hợp lệ',
            
            'nhan_vien_gioi_tinh.required' => 'Vui lòng chọn giới tính',
            
            'nhan_vien_email.required' => 'Email nhân viên không được để trống',
            'nhan_vien_email.email' => 'Email nhân viên không hợp lệ',
            'nhan_vien_email.unique' => 'Email nhân viên đã tồn tại',
            
            'nhan_vien_sdt.required' => 'Số điện thoại nhân viên không được để trống',
            'nhan_vien_sdt.max' => 'Số điện thoại nhân viên không vượt quá 12 chử số',
            'nhan_vien_sdt.regex' => 'Số điện thoại nhân viên không hợp lệ',
            
            'nhan_vien_dia_chi.required' => 'Địa chỉ nhân viên không được để trống',
            'nhan_vien_dia_chi.min' => 'Địa chỉ nhân viên phải lớn hơn 3 ký tự',
            'nhan_vien_dia_chi.max' => 'Địa chỉ nhân viên không được lớn hơn 255 ký tự',
            'nhan_vien_dia_chi.regex' => 'Địa chỉ nhân viên không hợp lệ',
            
            'nhan_vien_admin.required' => 'Vui lòng chọn Quyền',
            
        ];
    }
}
