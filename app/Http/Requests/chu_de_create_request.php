<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chu_de_create_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'chu_de_ma' => 'required|min:2|max:50|regex:/^[a-zA-Z0-9]+$/u|unique:chu_de',
            'chu_de_ten_vn' => 'required|min:3|max:255|unique:chu_de,chu_de_id,'. $this->chu_de_id.',chu_de_id'
        ];
    }
    public function messages() 
    {
        return [
            'chu_de_ten_vn.required' => 'Tên chủ đề không được để trống',
            'chu_de_ten_vn.min' => 'Tên chủ đề phải lớn hơn 3 ký tự',
            'chu_de_ten_vn.max' => 'Tên chủ đề không được lớn hơn 255 ký tự',
            'chu_de_ma.required' => 'Mã chủ đề không được để trống',
            'chu_de_ma.unique' => 'Mã chủ đề đã tồn tại',
            'chu_de_ma.min' => 'Mã chủ đề phải lớn hơn 2 ký tự',
            'chu_de_ma.max' => 'Mã chủ đề không được lớn hơn 50 ký tự',
        ];
    }
}
