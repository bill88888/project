<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserinsert extends FormRequest
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
            //会员命名规则
            'username'=>'required|regex:/\S{4,8}/|unique:users',
            'password'=>'required|regex:/\w{6,18}/',
            'repassword'=>'required|same:password',
            'email'=>'required|email',
            'phone'=>'required|regex:/\d{11}/',
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'用户名不能为空!',
            'username.regex'=>'用户名须为4-8位数字字母下划线!',
            'username.unique'=>'用户名重复!',
            'password.regex'=>'密码须为6-18位数字字母下划线!',
            'repassword.same'=>'两次密码不一致!',
            'email.email'=>'邮箱格式错误!',
            'email.required'=>'邮箱不能为空!',
            
            'phone.required'=>'手机号不能为空!',
            
            'phone.regex'=>'请输入正确的手机号!',
            'password.required'=>'密码不能为空！',
            'repassword.required'=>'重复密码不能为空！',
        ];
    }
}
