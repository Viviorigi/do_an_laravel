<?php

namespace App\Http\Requests\order;

use Illuminate\Foundation\Http\FormRequest;

class orderRequest extends FormRequest
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
            'name'=>'required|min:2',
            'address'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'methodPayment'=>'required|in:1,2'
        ];
       
    } 
    public function messages() {
        return [
            'name.required'=>'Tên của bạn không để trống',
            'email.required'=>'Email của bạn không để trống',
            'address.required'=>'Địa chỉ của bạn không để trống',
            'phone.required'=>'Số điện thoại của bạn không để trống',
            'methodPayment'=>'* Vui lòng chọn phương thức thanh toán' 
        ];
    }
}