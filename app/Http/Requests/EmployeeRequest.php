<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            "add_roles_id" => "required",
            "add_employee_name" => "required",
            "add_employee_email" => "required|email|unique:users,email",
            "add_employee_password" => "required",
        ];
    }
    public function messages()
    {
        return [
            "add_roles_id.required" => "Vui lòng chọn chức vụ",
            "add_employee_name.required" => "Vui lòng nhập tên nhân viên",
            "add_employee_email.unique" => "Email này có người sử dụng",
            "add_employee_email.email" => "Email không hợp lệ",
            "add_employee_email.required" => "Vui lòng nhập email",
            "add_employee_password.required" => "Vui lòng nhập mật khẩu",
        ];
    }
}
