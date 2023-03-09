<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchedulesRequest extends FormRequest
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
            'MNV' => request()->route('id')
            ? 'required|unique:schedules,MNV,'.request()->route('id')
            : 'required|unique:schedules',
            'Dayoff' => 'required'
        ];
    }

    public function messages(){
        return [
            'MNV.required' => 'Vui lòng nhập đầy mã nhân viên',
            'Dayoff.required' => 'Vui lòng nhập đầy đủ ngày off',
            'MNV.unique' => 'Nhân viên này đã có lịch nghỉ'
        ];
    }
}
