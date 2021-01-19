<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loai_san_pham_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'loai_san_pham_ma' => 'required|min:3|max:50|regex:/^[a-zA-Z0-9]+$/u|unique:loai_san_pham',
            'loai_san_pham_ten_vn' => 'required|min:3|max:255',
        ];
    }
    
    public function messages() 
    {
        return [
            'loai_san_pham_ma.required' => 'Mã loại sản phẩm không được để trống',
            'loai_san_pham_ma.min' => 'Mã loại sản phẩm phải lớn hơn 3 ký tự',
            'loai_san_pham_ma.max' => 'Mã loại sản phẩm không được lớn hơn 255 ký tự',
            'loai_san_pham_ma.unique' => 'Mã loại sản phẩm này đã tồn tại. Vui lòng nhập mã loại khác',
            'loai_san_pham_ma.regex' => 'Mã loại sản phẩm không hợp lệ',
            'loai_san_pham_ten_vn.required' => 'Tên sản phẩm không được để trống',
            'loai_san_pham_ten_vn.min' => 'Tên sản phẩm phải lớn hơn 3 ký tự',
            'loai_san_pham_ten_vn.max' => 'Tên sản phẩm không được lớn hơn 255 ký tự',
        ];
    }
}
