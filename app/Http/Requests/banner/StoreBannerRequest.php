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
    public function message(){
        return[
            'name.required'=>'not null',
            'photo.required'=>'not null',
            'photo.image'=>'not recognize type of image',
            'status.required'=>'not null',
        ];
    }
}
