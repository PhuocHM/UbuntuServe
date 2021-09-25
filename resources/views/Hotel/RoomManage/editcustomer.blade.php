@extends('include.admin')
@section('title', 'Chỉnh sửa khách hàng')
@section('main')
    <h1 class="display-4 text-center">Chỉnh sửa thông tin phòng</h1>
    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <table class="table">
                <tr>
                    <th><b>Tên khách hàng</b></th>
                    <td colspan="3"><input type="text" name="customer_name" class="form-control float-right"
                            value="{{ $customer->customer_name }}">
                    <span style="color:red;">@Error('customer_name'){{ $message }} @enderror</span>
                </td>
            </tr>
            <tr>
                <th><b>Ngày sinh</b></th>
                <td>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name="customer_dob" value="{{ $customer->customer_dob }}" type="text"
                            class="form-control datetimepicker-input" data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                <span style="color:red;">@Error('customer_dob'){{ $message }} @enderror</span>
            </td>
        </tr>
        <tr>
            <th><b>Số điện thoại</b></th>
            <td>
                <input type="text" name="customer_phone" class="form-control float-right"
                    value="{{ $customer->customer_phone }}">
            <span style="color:red;">@Error('customer_phone'){{ $message }} @enderror</span>
        </td>
    </tr>
    <tr>
        <th><b>Email</b></th>
        <td>
            <input type="text" name="customer_email" class="form-control float-right"
                value="{{ $customer->customer_email }}">
        <span style="color:red;">@Error('customer_email'){{ $message }} @enderror</span>
    </td>
</tr>
<tr>
    <th><b>Tỉnh thành</b></th>
    <td>
        <select name="customer_address" class="select2 js-example-basic-single js-states form-control"
            style="width:100%" data-select2-id="24" tabindex="-1" aria-hidden="true">
            <option disabled>Chọn tỉnh thành</option>
            <option value="Hà Nội">Hà Nội</option>
            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
            <option value="Huế">Huế</option>
            <option value="Quảng Bình">Quảng Bình</option>
        </select>
    <span style="color:red;">@Error('customer_address'){{ $message }} @enderror</span>
</td>
</tr>
<tr>
<th><b>Địa chỉ</b></th>
<td>
    <input type="text" name="customer_address_info" class="form-control float-right"
        value="{{ $customer->customer_address_info }}">
<span style="color:red;">@Error('customer_address_info'){{ $message }} @enderror</span>
</td>
</tr>
<tr>
<th><b>Giới tính</b></th>
<td>
<select name="customer_gender" class="select2 js-example-basic-single js-states form-control"
    style="width:100%" data-select2-id="2" tabindex="-1" aria-hidden="true">
    <option disabled selected>Chọn giới tính</option>
    <option value="man">Nam</option>
    <option value="woman">Nữ</option>
    <option value="other">Khác</option>
</select>
<span style="color:red;">@Error('customer_gender'){{ $message }} @enderror</span>
</td>
</tr>
<tr>
<th><b>Số CMT</b></th>
<td>
<input type="text" name="update_customer_cmt" class="form-control float-right"
value="{{ $customer->customer_cmt }}">
<span style="color:red;">@Error('update_customer_cmt'){{ $message }} @enderror</span>
</td>
</tr>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Quay về</button>
<button id="update_room_button" type="submit" class="btn btn-success">Chỉnh sửa</button>
</div>
</form>
@endsection
