<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class SignUp extends FormRequest
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
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6',
                'repassword'=>'same:password|required'      
        ];
    }
    public function messages() {
        return [
            'name.required'=>'Tên không để trống',
            'email.required'=>'Email không để trống',
            'email.email'=>'Email phải đúng định dạng email',
            'email.unique'=>"email $this->email đã tồn tại ",
            'password.required'=>'Mật khẩu không để trống',
            'password.min'=>'Mật khẩu tối thiểu 6 ký tự',
            'repassword.required'=>'Mật khẩu không để trống',
            'repassword.same'=>'Mật khẩu không khớp'

        ];
    }
}
