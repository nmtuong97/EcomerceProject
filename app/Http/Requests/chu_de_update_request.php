<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chu_de_update_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'chu_de_ten_vn' => 'required|min:3|max:255|unique:chu_de,chu_de_id,'. $this->chu_de_id.',chu_de_id'
        ];
    }
    
    public function messages() 
    {
        return [
            'chu_de_ten_vn.required' => 'Tên chủ đề không được để trống',
            'chu_de_ten_vn.min' => 'Tên chủ đề phải lớn hơn 3 ký tự',
            'chu_de_ten_vn.max' => 'Tên chủ đề không được lớn hơn 255 ký tự',
        ];
    }
}
