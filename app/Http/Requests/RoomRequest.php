<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        if ($this->route('room')) {
            return [
                'room_name'          => 'required|unique:room,room_name,' . $this->route('room'),
                'room_type'          => 'required',
                'room_floor'          => 'required',
                'room_note'          => 'max:20',
            ];
        }
        return [
            'room_name'          => 'required|unique:room,room_name',
            'room_type'          => 'required',
            'room_floor'          => 'required',
            'room_note'          => 'max:20',
        ];
    }
    public function messages()
    {
        return [
            'room_name.required' => 'Vui lòng nhập tên phòng',
            'room_name.unique' => 'Tên phòng đã tồn tại',
            'room_floor.required' => 'Vui lòng chọn số tấng',
            'room_type.required' => 'Vui lòng chọn loại phòng',
            'room_note.max' => 'Ghi chú vượt quá kí tự cho phép'
        ];
    }
}
