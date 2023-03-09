<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffinformationsRequest extends FormRequest
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
            'CV' => 'required',
            'MNV' => 'required',
            'Salary' => 'required',
            'Level' => 'required',
        ];
    }

    public function messages(){
        return [
            'CV.required' => 'Vui lòng nhập link CV',
            'MNV.required' => 'Vui lòng nhập đầy đủ mã nhân viên',
            'Salary.required' => 'Vui lòng nhập lương',
            'Level.required' => 'Vui lòng nhập cấp bậc',
        ];
    }
}
