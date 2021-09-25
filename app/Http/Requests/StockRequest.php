<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'supplier_id'          => 'required',
            'storage_id'          => 'required',
            'type_receive'          => 'required',
            'date_receive'          => 'required',
            'employee_name'          => 'required',
            'order_note'          => 'max:20',
        ];
    }
    public function messages()
    {
        return [
            'supplier_id.required'          => 'Vui lòng nhập nhà cung cấp',
            'storage_id.required'          => 'Vui lòng nhập chi nhánh',
            'type_receive.required'          => 'Vui lòng nhập phương thức thanh toán',
            'date_receive.required'          => 'Vui lòng nhập ngày nhập hàng',
            'employee_name.required'          => 'Vui lòng chọn nhân viên nhập',
            'order_note.max'          => 'Ghi chú vượt quá kí tự cho phép',
        ];
    }
}
