@extends('include.admin')
@section('title', 'Quản lí nhân viên ')
@section('main')
    {{-- Modal Thủ Công --}}
    <div class="modal fade" id="themrole" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:1040px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Thêm nhân viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add_employee" method="post">
                    @csrf
                    <div class="modal-body">
                        <div id="add_employee_error"></div>
                        <table class="table">
                            <tr>
                                <th><b>Chức vụ</b></th>
                                <td>
                                    <select id="add_roles_id" name="add_roles_id"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="5" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn chức vụ</option>
                                        @foreach ($role_list as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->role_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><b>Tên nhân viên</b></th>
                                <td><input type="text" class="form-control" name="add_employee_name"></td>
                            </tr>
                            <tr>
                                <th><b>Email</b></th>
                                <td><input type="text" class="form-control" name="add_employee_email"></td>
                            </tr>
                            <tr>
                                <th><b>Mật khẩu</b></th>
                                <td><input type="password" class="form-control" name="add_employee_password"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button id="add_new_employee" type="button" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal xóa --}}
    <div class="modal fade" id="xoa-bill" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Xóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hành động này sẽ không thể khôi phục !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                    <form id="delete_bill" action="#" method="POST">
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-outline-light">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="main-notification">
        @if (session('success'))
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header"><strong class="mr-auto">Thông
                            báo</strong><small>Chi tiết</small><button data-dismiss="toast" type="button"
                            class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="toast-body">{{ session('success') }}</div>
                </div>
            </div>
        @endif
    </div>
    <div>
        <h1 class="display-4 text-center">Danh sách nhân viên</h1>
    </div>
    <div style="float: left">
        <table>
            <tr>
                <td>
                    <select id="roles_id" name="roles_id" class="select2 js-example-basic-single js-states form-control"
                        style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option disabled selected>Chọn chức vụ</option>
                        @foreach ($role_list as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->role_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" name="seach_field" id="seach_field" class="form-control"
                        placeholder="Tìm kiếm ...">
                </td>
                <td>
                    <button id="seach_btn" type="button" class="btn btn-success">Tìm kiếm</button>
                </td>
            </tr>
        </table>
    </div>
    <table class="table table-hover">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Email</th>
            <th scope="col">Mật khẩu</th>
            <th scope="col">Chức vụ</th>
        </tr>
        <tbody id="display-employee">
            @include('include.employee_list')
        </tbody>
    </table>
    {{-- {{ dd($employee_list) }} --}}
@section('menu-bar')
    <button type="button" class="btn bg-gradient-success btn-sm menu-bar" data-toggle="modal" data-target="#themrole">Thêm
        NV</button>
@endsection
@endsection
@section('scripts')
<script>
    $("#roles_id").on('change', function() {
        var url = '{{ route('role.index') }}' + '/' + this.value + '/seachrole';
        $.ajax({
            url: url,
            method: 'GET',
            success: function(data) {
                $("#display-employee").html('')
                $("#display-employee").html(data)
            }
        })
    })
    $("#seach_btn").on('click', function() {
        var value = $("#seach_field").val();
        var url = '{{ route('role.index') }}' + '/' + value + '/seach';
        $.ajax({
            url: url,
            method: 'GET',
            success: function(data) {
                $("#display-employee").html('')
                $("#display-employee").html(data)
            }
        })
    })
    $("#add_new_employee").on('click', function() {
        var url = '{{ route('employee.store') }}';
        $.ajax({
            url: url,
            method: 'POST',
            data: $('#add_employee').serialize(),
            statusCode: {
                422: function(response) {
                    $("#add_employee_error").html('');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $("#add_employee_error").append(
                            '<span style="color:red; padding-left:20px">' + value +
                            '</span><br>');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    $("#add_employee_error").append(
                        '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                        response.success + '</div></div></div>'
                    )
                    setTimeout(function() {
                        $("#add_employee_error").html('')
                    }, 2000);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
        })
    })
</script>
@endsection
