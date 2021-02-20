<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class mau_sac_update_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'mau_sac_ten_vn' => 'required|min:2|max:255|unique:mau_sac,mau_sac_id,'. $this->mau_sac_id.',mau_sac_id'
        ];
    }
    
    public function messages() 
    {
        return [
            'mau_sac_ten_vn.required' => 'Tên màu sắc không được để trống',
            'mau_sac_ten_vn.min' => 'Tên màu sắc phải lớn hơn 2 ký tự',
            'mau_sac_ten_vn.max' => 'Tên màu sắc không được lớn hơn 255 ký tự',
        ];
    }
}
