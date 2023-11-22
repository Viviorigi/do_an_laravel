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
            'phone'=>['required','regex:/(84|0[3|5|7|8|9])+([0-9]{8})/','max:10'],
            'methodPayment'=>'required|in:1,2'
        ];
       
    } 
    public function messages() {
        return [
            'name.required'=>'Tên của bạn không để trống',
            'name.min'=>'Tên tối thiểu 2 ký tự',
            'email.required'=>'Email của bạn không để trống',
            'address.required'=>'Địa chỉ của bạn không để trống',
            'phone.required'=>'Số điện thoại của bạn không để trống',
            'phone.regex'=>'Số điện thoại của bạn không đúng định dạng',
            'phone.max'=>'Số điện thoại của bạn không được vượt quá 10 số',
            'methodPayment'=>'* Vui lòng chọn phương thức thanh toán' 
        ];
    }
}
