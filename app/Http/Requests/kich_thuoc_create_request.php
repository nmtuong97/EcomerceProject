<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kich_thuoc_create_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'kich_thuoc_ma' => 'required|min:1|max:50|regex:/^[a-zA-Z0-9]+$/u|unique:kich_thuoc',
            'kich_thuoc_ten_vn' => 'required|min:2|max:255|unique:kich_thuoc,kich_thuoc_id,'. $this->kich_thuoc_id.',kich_thuoc_id'
        ];
    }
    public function messages()
    {
        return [
            'kich_thuoc_ten_vn.required' => 'Tên kích thước không được để trống',
            'kich_thuoc_ten_vn.min' => 'Tên kích thước phải lớn hơn 2 ký tự',
            'kich_thuoc_ten_vn.max' => 'Tên kích thước không được lớn hơn 255 ký tự',
            'kich_thuoc_ma.required' => 'Mã kích thước không được để trống',
            'kich_thuoc_ma.unique' => 'Mã kích thước đã tồn tại',
            'kich_thuoc_ma.min' => 'Mã kích thước phải lớn hơn 1 ký tự',
            'kich_thuoc_ma.max' => 'Mã kích thước không được lớn hơn 50 ký tự',
        ];
    }
}
