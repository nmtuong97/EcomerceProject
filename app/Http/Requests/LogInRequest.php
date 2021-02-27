<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class LogInRequest extends FormRequest
{
        public function __construct(Factory $factory)
    {
        $name = 'checklogin';
        $test = function ($attribute, $value, $parameter) {
            $username = $parameter[0];
            $password = $parameter[1];
            
//            print_r($parameter[1]);
//            print_r('===');
//            print_r($password);die;
            
            $info = DB::select(' select name,password from users where email = :email ', ['email' => $username]);
            if(count($info) > 0) {
                $pass_encode = '';
                foreach($info as $k => $v) {
//                    print_r($k);
                    $pass_encode = $v->password;
                }
                if(Hash::check($password, $pass_encode)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        };
        $errorMessage = 'Thông tin đăng nhập không đúng.';

        $factory->extend($name, $test, $errorMessage);
    }
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
        if(strlen(trim($this->input('username'))) > 0 && strlen(trim($this->input('password'))) > 0) {
            $str_validate = "required|checklogin:{$this->input('username')},{$this->input('password')}";
        } else {
            $str_validate = "required";
        }
        return [
            'username' => $str_validate,
//            'username' => 'required',
            'password' => 'required',
        ];
    }
    
    public function messages() 
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống.',
            'password.required' => 'Mật khẩu không được để trống.',
            
        ];
    }
}
