<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=>'required|unique:products',
            'slug'=>'required',
            'price'=>'required|numeric',
            'sale_price'=>'min:0|lte:price|numeric',
            'status'=>'required',
            'category_id'=>'required',
            'photo'=>'required|image',
            'description'=>'',
            'photos'=>'required'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Tên không để trống',
            'name.unique'=>"Tên $this->name đã tồn tại ",
            'slug.required'=>'slug không để trống',
            'status.required'=>'Trạng thái không để trống',
            'price.required'=>'Giá không để trống',
            'sale_price.min'=>'Giá KM lớn hơn 0',
            'sale_price.lte'=>'Giá KM không được lớn hơn giá sản phẩm',
            'category_id.required'=>'Danh mục không để trống',
            'photo.required'=>'ảnh không để trống',
            'photos.required'=>'ảnh mô tả không để trống',
            'price.numeric'=>'giá phải là số',
            'sale_price.numeric'=>'giá KM phải là số',
            'photo.image'=>'yêu cầu đúng định dạng ảnh',
            
        ];
    }
}
