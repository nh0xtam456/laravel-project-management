<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'Fullname' => 'required',
            'Address' => 'required',
            'Phonenumber' => 'required',
            'Email' => 'required',
        ];
    }

    public function messages(){
        return [
            'Fullname.required' => 'Vui lòng nhập đầy đủ họ tên KH',
            'Address.required' => 'Vui lòng nhập đầy đủ địa chỉ',
            'Phonenumber.required' => 'Vui lòng nhập SDT',
            'Email.required' => 'Vui lòng nhập email'
        ];
    }
}
