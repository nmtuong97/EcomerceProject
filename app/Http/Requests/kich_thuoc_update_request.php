<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kich_thuoc_update_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'kich_thuoc_ten_vn' => 'required|min:2|max:255|unique:kich_thuoc,kich_thuoc_id,'. $this->kich_thuoc_id.',kich_thuoc_id'
        ];
    }
    public function messages()
    {
        return [
            'kich_thuoc_ten_vn.required' => 'Tên kích thước không được để trống',
            'kich_thuoc_ten_vn.min' => 'Tên kích thước phải lớn hơn 2 ký tự',
            'kich_thuoc_ten_vn.max' => 'Tên kích thước không được lớn hơn 255 ký tự',
        ];
    }
}
