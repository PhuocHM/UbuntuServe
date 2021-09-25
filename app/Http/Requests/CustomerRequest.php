<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        if ($this->route('customer')) {
            return [
                'customer_name'          => 'required',
                'customer_phone'          => 'required|max:10',
                'customer_email'          => 'required|email',
                'customer_address'          => 'required',
                'customer_address_info'          => 'required',
                'customer_gender'          => 'required',
                'customer_dob'          => 'required',
                'update_customer_cmt' => 'required|max:15|unique:customer,customer_cmt,' . $this->route('customer'),
            ];
        }
        return [
            'customer_name'          => 'required',
            'customer_phone'          => 'required|max:10',
            'customer_email'          => 'required|email',
            'customer_address'          => 'required',
            'customer_address_info'          => 'required',
            'customer_gender'          => 'required',
            'customer_dob'          => 'required',
            'customer_cmt'          => 'required|max:15|unique:customer,customer_cmt,'
        ];
    }
    public function messages()
    {
        return [
            "customer_name.required" => "Vui lòng nhập tên khách hàng",
            "customer_dob.required" => "Vui lòng nhập sinh nhật khách hàng",
            "customer_phone.required" => "Vui lòng nhập số điện thoại khách hàng",
            "customer_email.required" => "Vui lòng nhập email khách hàng",
            "customer_address_info.required" => "Vui lòng nhập địa chỉ khách hàng",
            "customer_gender.required" => "Vui lòng nhập giới tính",
            "customer_cmt.required" => "Vui lòng nhập số CMT",
            "customer_cmt.unique" => "Số CMT này đã tồn tại"
        ];
    }
}
