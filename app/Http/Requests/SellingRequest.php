<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellingRequest extends FormRequest
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
            'order_room'          => 'required',
            'storage_name'          => 'required',
            'type_sell'          => 'required',
            'date_sell'          => 'required',
            'employee_name'          => 'required',
            'order_note'          => 'max:20',
        ];
    }
    public function messages()
    {
        return [
            'order_room.required'          => 'Vui lòng nhập tên phòng',
            'storage_name.required'          => 'Vui lòng nhập chi nhánh',
            'type_sell.required'          => 'Vui lòng nhập phương thức thanh toán',
            'date_sell.required'          => 'Vui lòng nhập ngày bán',
            'employee_name.required'          => 'Vui lòng chọn nhân viên bán',
            'order_note.max'          => 'Ghi chú vượt quá kí tự cho phép',
        ];
    }
}
