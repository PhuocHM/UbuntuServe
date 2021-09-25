<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'product_names'          => 'required|unique:products,product_name',
            'product_receive'          => 'required',
            'product_unit'          => 'required',
            'product_price'          => 'required',
        ];
    }
    public function messages()
    {
        return [
            'product_names.required' => 'Vui lòng nhập sản phẩm',
            'product_names.unique' => 'Tên sản phẩm đã tồn tại',
            'product_receive.required' => 'Vui lòng nhập giá nhập vào',
            'product_unit.required' => 'Vui lòng nhập đơn vị',
            'product_price.required' => 'Vui lòng nhập giá',
        ];
    }
}
