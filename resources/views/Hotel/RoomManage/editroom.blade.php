@extends('include.admin')
@section('title', 'Chỉnh sửa phòng')
@section('main')
    <h1 class="display-4 text-center">Chỉnh sửa thông tin phòng</h1>
    <form action="{{ route('room.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <table class="table">
                <tr>
                    <th><b>Tên phòng</b></th>
                    <td colspan="3"><input name="room_name" type="text" class="form-control float-right"
                            value="{{ $room->room_name }}">
                    <span style="color:red;">@Error('room_name'){{ $message }} @enderror</span>
                </td>
            </tr>
            <tr>
                <th><b>Loại phòng</b></th>
                <td>

                    <select name="room_type" class="select2 js-example-basic-single js-states form-control"
                        style="width:100%" data-select2-id="2" tabindex="-1" aria-hidden="true">
                        <option disabled selected>Chọn loại phòng</option>
                        @foreach ($type as $key => $value)
                            <option @if ($value->id == $room->room_type)
                                {
                                {! selected !}
                                }
                                @endif value="{{ $value->id }}">{{ $value->type_name }}
                            </option>
                        @endforeach
                    </select>
                <span style="color:red;">@Error('room_type'){{ $message }} @enderror</span>
            </td>
            <th><b>Tầng</b></th>
            <td>
                <select name="room_floor" class="select2 js-example-basic-single js-states form-control"
                    style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option disabled selected>Chọn tầng</option>
                    @foreach ($floor as $key => $value)
                        <option @if ($value->id == $room->floor)
                            {
                            {! selected !}
                            }
                    @endif
                    value="{{ $value->id }}">{{ $value->floor_name }}</option>
                    @endforeach
                </select>
            <span style="color:red;">@Error('room_floor'){{ $message }} @enderror</span>
        </td>
    </tr>
    <tr>
        <th><b>Ghi chú</b></th>
        <td colspan="3"><input name="room_note" type="text" class="form-control float-right"
                value="{{ $room->note }}"></td>
    </tr>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Quay về</button>
<button id="update_room_button" type="submit" class="btn btn-success">Chỉnh sửa</button>
</div>
</form>
@endsection
