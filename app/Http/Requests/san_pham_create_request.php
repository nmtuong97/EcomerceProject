<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class san_pham_create_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function rules()
    {
        return [
            'san_pham_ma' => 'required|min:3|max:50|regex:/^[a-zA-Z0-9]+$/u|unique:san_pham',
            'san_pham_ten_vn' => 'required|min:3|max:255',
            'san_pham_ten_en' => 'max:255',
            'san_pham_gia_goc' => 'required|min:4',
            'san_pham_gia_ban' => 'required|min:4',
            'san_pham_hinh_anh' => 'required|image',
            'san_pham_mo_ta' => 'required',
            'san_pham_trang_thai' => 'required',
            'loai_san_pham_id' => 'required',

        ];
    }
    
    public function messages() 
    {
        return [
            'san_pham_ma.required' => 'Mã sản phẩm không được để trống.',
            'san_pham_ma.min' => 'Mã sản phẩm phải lớn hơn 3 ký tự',
            'san_pham_ma.max' => 'Mã sản phẩm không được lớn hơn 50 ký tự',
            'san_pham_ma.unique' => 'Mã sản phẩm đã tồn tại',
            'san_pham_ma.regex' => 'Mã sản phẩm không hợp lệ',
            
            'san_pham_ten_vn.required' => 'Tên sản phẩm không được để trống',
            'san_pham_ten_vn.min' => 'Tên sản phẩm phải lớn hơn 3 ký tự',
            'san_pham_ten_vn.max' => 'Tên sản phẩm không được lớn hơn 255 ký tự',
            
            'san_pham_ten_en.max' => 'Tên sản phẩm không được lớn hơn 255 ký tự',
            
            'san_pham_gia_goc.required' => 'Giá gốc không được để trống',
            'san_pham_gia_goc.min' => 'Giá gốc phải lớn hơn 1000đ',
            'san_pham_gia_ban.required' => 'Giá bán không được để trống',
            'san_pham_gia_ban.min' => 'Giá bán phải lớn hơn 1000đ',
            
            'san_pham_hinh_anh.required' => 'Vui lòng chọn ảnh đại diện cho sản phẩm để tải lên',
            'san_pham_hinh_anh.image' => 'Vui lòng chọn hình ảnh để tải lên',
            
            'san_pham_mo_ta.required' => 'Vui lòng nhập mô tả cho sản phẩm',
            
            'san_pham_trang_thai.required' => 'Vui lòng chọn trạng thái',
            
            'loai_san_pham_id.required' => 'Vui lòng chọn loại sản phẩm',
        ];
    }
}
