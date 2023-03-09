<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest1 extends FormRequest
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
            'Email' => 'required',
            'Phonenumber' => 'required',
            'Note' => 'required',
        ];
    }

    public function messages(){
        return [
            'Fullname.required' => 'Vui lòng nhập đầy đủ tên',
            'Address.required' => 'Vui lòng nhập đầy đủ địa chỉ',
            'Email.required' => 'Vui lòng nhập email',
            'Phonenumber.required' => 'Vui lòng nhập SDT',
            'Note.required' => 'Vui lòng nhập ghi chú'
        ];
    }
}
