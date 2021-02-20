<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loai_san_pham_update_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'loai_san_pham_ten_vn' => 'required|min:3|max:255|unique:loai_san_pham,loai_san_pham_id,'. $this->loai_san_pham_id.',loai_san_pham_id'
        ];
    }
    
    public function messages() 
    {
        return [
            'loai_san_pham_ten_vn.required' => 'Tên sản phẩm không được để trống',
            'loai_san_pham_ten_vn.min' => 'Tên sản phẩm phải lớn hơn 3 ký tự',
            'loai_san_pham_ten_vn.max' => 'Tên sản phẩm không được lớn hơn 255 ký tự',
        ];
    }
}
