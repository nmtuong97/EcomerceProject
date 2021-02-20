<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class nha_cung_cap_create_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'ncc_ma' => 'required|min:2|max:50|regex:/^[a-zA-Z0-9]+$/u|unique:nha_cung_cap',
            'ncc_ten_vn' => 'required|min:3|max:255|unique:nha_cung_cap,ncc_id,'. $this->ncc_id.',ncc_id'
        ];
    }
    public function messages() 
    {
        return [
            'ncc_ten_vn.required' => 'Tên nhà cung cấp không được để trống',
            'ncc_ten_vn.min' => 'Tên nhà cung cấp phải lớn hơn 3 ký tự',
            'ncc_ten_vn.max' => 'Tên nhà cung cấp không được lớn hơn 255 ký tự',
            'ncc_ma.required' => 'Mã nhà cung cấp không được để trống',
            'ncc_ma.unique' => 'Mã nhà cung cấp đã tồn tại',
            'ncc_ma.min' => 'Mã nhà cung cấp phải lớn hơn 2 ký tự',
            'ncc_ma.max' => 'Mã nhà cung cấp không được lớn hơn 50 ký tự',
        ];
    }
}
