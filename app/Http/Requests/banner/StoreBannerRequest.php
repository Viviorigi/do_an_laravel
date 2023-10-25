<?php

namespace App\Http\Requests\banner;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            return [
                'name'=>'required',
                'photo'=>'required|image',
                'status'=>'required'
            ];
        }
        public function messages(){
            return[
                'name.required'=>'Tên không để trống',
                'photo.required'=>'ảnh không để trống',
                'photo.image'=>'yêu cầu đúng định dạng ảnh',
                'status.required'=>'Trạng thái không để trống',
            ];
        }
}
