<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => request()->route('id')
            ? 'required|unique:news,title,'.request()->route('id')
            : 'required|unique:news',
            'intro' => 'required',
            'content' => 'required',
            'position' => request()->route('id')
            ? 'required|unique:news,position,'.request()->route('id')
            : 'required|unique:news',
            'image' => request()->route('id')
            ? 'image|mimes:jpeg,jpg,png|max:2048'
            : 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Vui lòng nhập đầy đủ tiêu đề',
            'intro.required' => 'Vui lòng nhập đầy đủ tóm tắt tin tức',
            'content.required' => 'Vui lòng nội dung tin tức',
            'image.required' => 'Vui lòng nhập hình ảnh',
            'title.unique' => 'Bài viết đã có spotlight, vui lòng xóa bài viết ở vị trí hiện tại',
            'position.unique' => 'Bài viết đã có spotlight, vui lòng xóa bài viết ở vị trí hiện tại',
        ];
    }
}
