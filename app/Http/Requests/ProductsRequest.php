<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'Product_name' => 'required',
            'Intro' => 'required',
            'Content' => 'required',
            'Price' => 'required'
        ];
    }

    public function messages(){
        return [
            'Product_name.required' => 'Vui lòng nhập đầy đủ tên sản phẩm',
            'Intro.required' => 'Vui lòng nhập đầy đủ tóm tắt sản phẩm',
            'Content.required' => 'Vui lòng nội dung sản phẩm',
            'Price.required' => 'Vui lòng nhập giá'
        ];
    }
}
