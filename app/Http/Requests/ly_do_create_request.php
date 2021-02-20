<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ly_do_create_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'ly_do_ma' => 'required|min:1|max:50|regex:/^[a-zA-Z0-9]+$/u|unique:ly_do',
            'ly_do_loai' => 'required',
            'ly_do_ten_vn' => 'required|min:2|max:255|unique:ly_do,ly_do_id,'. $this->ly_do_id.',ly_do_id'
        ];
    }
    public function messages() 
    {
        return [
            'ly_do_ten_vn.required' => 'Tên lý do không được để trống',
            'ly_do_ten_vn.min' => 'Tên lý do phải lớn hơn 2 ký tự',
            'ly_do_ten_vn.max' => 'Tên lý do không được lớn hơn 255 ký tự',
            'ly_do_ma.required' => 'Mã lý do không được để trống',
            'ly_do_ma.unique' => 'Mã lý do đã tồn tại',
            'ly_do_loai.required' => 'Vui lòng chọn loại lý do',
            'ly_do_ma.min' => 'Mã lý do phải lớn hơn 1 ký tự',
            'ly_do_ma.max' => 'Mã lý do không được lớn hơn 50 ký tự',
        ];
    }
}
