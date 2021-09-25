<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'booking_time'          => 'required',
            'customer_id'          => 'required'
        ];
    }
    public function messages()
    {
        return [
            'booking_time.required'          => 'Vui lòng nhập thời gian',
            'customer_id.required'          => 'Vui lòng chọn khách hàng đặt phòng'
        ];
    }
}
