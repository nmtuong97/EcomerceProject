<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class don_vi_van_chuyen_update_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'don_vi_van_chuyen_gia_goc' => 'required|regex:/^[a-zA-Z0-9.]+$/u',
            'don_vi_van_chuyen_gia' => 'required|regex:/^[a-zA-Z0-9.]+$/u',
            'don_vi_van_chuyen_ten_vn' => 'required|min:3|max:255|unique:don_vi_van_chuyen,don_vi_van_chuyen_id,'. $this->don_vi_van_chuyen_id.',don_vi_van_chuyen_id'
        ];
    }
    public function messages() 
    {
        return [
            'don_vi_van_chuyen_ten_vn.required' => 'Tên đơn vị vận chuyển không được để trống',
            'don_vi_van_chuyen_ten_vn.min' => 'Tên đơn vị vận chuyển phải lớn hơn 3 ký tự',
            'don_vi_van_chuyen_ten_vn.max' => 'Tên đơn vị vận chuyển không được lớn hơn 255 ký tự',
            'don_vi_van_chuyen_ma.required' => 'Mã đơn vị vận chuyển không được để trống',
            'don_vi_van_chuyen_ma.unique' => 'Mã đơn vị vận chuyển đã tồn tại',
            'don_vi_van_chuyen_ma.min' => 'Mã đơn vị vận chuyển phải lớn hơn 2 ký tự',
            'don_vi_van_chuyen_ma.max' => 'Mã đơn vị vận chuyển không được lớn hơn 50 ký tự',
            'don_vi_van_chuyen_ma.regex' => 'Mã đơn vị vận chuyển không hợp lệ',
            'don_vi_van_chuyen_gia_goc.regex' => 'Giá gốc không hợp lệ',
            'don_vi_van_chuyen_gia_goc.required' => 'Giá gốc không được để trống',
            'don_vi_van_chuyen_gia.regex' => 'Giá không hợp lệ',
            'don_vi_van_chuyen_gia.required' => 'Giá không được để trống',
        ];
    }
}
