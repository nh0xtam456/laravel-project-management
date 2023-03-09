<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'Name' => request()->route('id')
            ? 'required|unique:branchs,Name,'.request()->route('id')
            : 'required|unique:branchs',
            'Address' => 'required',
            'Phone' => 'required'
        ];
    }

    public function messages(){
        return [
            'Name.required' => 'Vui lòng nhập tên chi nhánh',
            'Name.unique' => 'Chi nhánh đã tồn tại',
            'Address.required' => 'Vui lòng nhập địa chỉ chi nhánh ',
            'Phone.required' => 'Vui lòng nhập số điện thoại chi nhánh'
        ];
    }
}
