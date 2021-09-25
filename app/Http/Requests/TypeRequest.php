<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'room_type_name'          => 'required|unique:room_type,type_name',
            'room_type_capacity'          => 'required|numeric',
            'room_type_price'          => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'room_type_name.required'          => 'Vui lòng nhập loại phòng',
            'room_type_name.unique'          => 'Loại phòng này đã tồn tại',
            'room_type_capacity.required'          => 'Vui lòng nhập sức chứa của phòng',
            'room_type_price.required'          => 'Vui lòng nhập mức giá của phòng',
        ];
    }
}
