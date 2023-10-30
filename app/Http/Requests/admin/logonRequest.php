<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class logonRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required|min:6',
        ];
    }
    public function messages() {
        return [
            'email.required'=>'Email không để trống',
            'email.email'=>'Email phải đúng định dạng email',
            'password.required'=>'Mật khẩu không để trống',
            'password.min'=>'Mật khẩu tối thiểu 6 ký tự',
        ];
    }
}
