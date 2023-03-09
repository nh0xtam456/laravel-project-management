<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => request()->route('id') 
                    ? 'required|email|unique:users,email,'.request()->route('id')
                    : 'required|email|unique:users',

            'password' => request()->route('id') 
                    ? 'confirmed' 
                    : 'required|confirmed|min:7',

            'fullname' => 'required',
            'phone' => 'required',

            'avatar' => request()->route('id')
                    ? 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    : 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email này đã tồn tại rồi',
            'email.email' => 'Đây không phải là email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu xác nhận không chính xác',
            'password.min'  => 'Mật khẩu ít nhất 7 ký tự',
            'fullname.required' => 'Vui lòng nhập họ tên',
            'phone.required' => 'Vui lòng nhập điện thoại',
            'avatar.required' => 'Vui lòng nhập hình đại diện',
            'avatar.mimes' => 'Hình đại diện phải là các loại png,bmp,jpg'
        ];
    }
}
