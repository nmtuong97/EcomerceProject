<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class nha_san_xuat_create_request extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'nsx_ma' => 'required|min:2|max:50|regex:/^[a-zA-Z0-9]+$/u|unique:nha_san_xuat',
            'nsx_ten_vn' => 'required|min:3|max:255|unique:nha_san_xuat,nsx_id,'. $this->nsx_id.',nsx_id'
        ];
    }
    public function messages() 
    {
        return [
            'nsx_ten_vn.required' => 'Tên nhà sản xuất không được để trống',
            'nsx_ten_vn.min' => 'Tên nhà sản xuất phải lớn hơn 3 ký tự',
            'nsx_ten_vn.max' => 'Tên nhà sản xuất không được lớn hơn 255 ký tự',
            'nsx_ma.required' => 'Mã nhà sản xuất không được để trống',
            'nsx_ma.unique' => 'Mã nhà sản xuất đã tồn tại',
            'nsx_ma.min' => 'Mã nhà sản xuất phải lớn hơn 2 ký tự',
            'nsx_ma.max' => 'Mã nhà sản xuất không được lớn hơn 50 ký tự',
        ];
    }
}
