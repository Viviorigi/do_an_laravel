<?php

namespace App\Http\Requests\blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return[
            'name'=>'required|unique:blogs',
            'slug'=>'required',
            'photo'=>'required|image',
            'description'=>'required',
            'content'=>'required'
        ];
    }
    public function messages(){
        [
            'name.required'=>'Tên không để trống',
            'name.unique'=>"Tên $this->name đã tồn tại ",
            'slug.required'=>'slug không để trống',
            'photo.required'=>'ảnh không để trống',
            'photo.image'=>'yêu cầu đúng định dạng ảnh',
            'description.required'=>'vui lòng nhập mô tả',
            'content.required'=>'vui lòng nhập nội dung'
        ];
    }    
}
