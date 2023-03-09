<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'Phone' => 'required',
            'Branch_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'Fullname.required' => 'Vui lòng nhập đầy đủ tên nhân viên',
            'Phone.required' => 'Vui lòng nhập sdt',
            'Branch_id.required' => 'Vui lòng nhập chi nhánh'
        ];
    }
}
