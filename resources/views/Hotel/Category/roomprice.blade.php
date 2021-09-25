@extends('include.admin')
@section('title', 'Chỉnh sửa giá hạng phòng')
@section('main')
    <!-- Modal Edit -->
    <div class="modal fade" id="suathongtin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="error_monitor"></div>
                    <form id="edit-money-logs" action="#" method="post">
                        @csrf
                        @method('PUT')
                        <table class="table">
                            <tr>
                                <th><b>Tên hạng phòng</b></th>
                                <td>
                                    <input type="hidden" name="type_id" id="type_id">
                                    <input name="room_type_name" id="type_name" type="text" class="form-control float-right">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Sức chứa</b></th>
                                <td>
                                    <input name="room_type_capacity" id="type_capacity" type="text"
                                        class="form-control float-right">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Giá tiền</b></th>
                                <td>
                                    <input name="room_type_price" id="type_price" type="text"
                                        class="form-control float-right">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button id="edit_button" type="button" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal xóa --}}
    <div class="modal fade" id="xoathongtin" data-backdrop="static" tabindex="-1" role="dialog"
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
                    <form id="delete_receive" action="#" method="POST">
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
        <h1 class="display-4 text-center">Chỉnh sửa giá hạng phòng</h1>
    </div>
    <table class="table table-hover">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên hạng phòng</th>
            <th scope="col">Sức chứa</th>
            <th scope="col">Giá tiền</th>
        </tr>
        @if (count($log) == 0)
            <tr>
                <td colspan="8"><span style="color:red; padding-left:50%">Không có bản ghi nào</span></td>
            </tr>
        @else
            @foreach ($log as $key => $value)
                @if ($value->active == 0)
                    <tr>
                        <td scope="row">{{ ++$key }}</td>
                        <td>{{ $value->type_name }}</td>
                        <td>{{ $value->capacity }}</td>
                        <td>{{ $value->price }}</td>
                        <td>
                            <button onclick="setLinkView({{ $value->id }})" id="edit-log" type="button"
                                class="btn btn-warning" data-toggle="modal" data-target="#suathongtin">Sửa</button>
                            <button onclick="setLinkDelete({{ $value->id }})" id="delete-m  oney-log" type="button"
                                class="btn btn-danger" data-toggle="modal" data-target="#xoathongtin">Xóa</button>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
    </table>
@endsection
@section('scripts')
    <script>
        setTimeout(function() {
            $("#main-notification").html('');
        }, 2000)

        function setLinkView(id) {
            url = '<?= route('type.index') ?>' + '/' + id;
            $("#edit-money-logs").attr('action', url);
            $.ajax({
                url: url,
                method: 'GET',
                data: id,
                success: function(response) {
                    if (response.success) {
                        $("#type_name").val(response.success.type_name);
                        $("#type_capacity").val(response.success.capacity);
                        $("#type_price").val(response.success.price);
                        $("#type_id").val(response.success.id);
                    }
                }
            })
        }
        $("#edit_button").on('click', function(e) {
            var id = $("#type_id").val();
            var url = '<?= route('type.index') ?>' + '/' + id;
            $.ajax({
                url: url,
                method: 'PUT',
                data: $('#edit-money-logs').serialize(),
                statusCode: {
                    422: function(response) {
                        $("#error_monitor").html('');
                        $.each(response.responseJSON.errors, function(key, value) {
                            $("#error_monitor").append(
                                '<span style="color:red; padding-left:20px">' + value +
                                '</span><br>');
                        });
                    }
                },
                success: function(response) {
                    if (response.success) {
                        $("#error_monitor").append(
                            '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                            response.success + '</div></div></div>'
                        )
                        setTimeout(function() {
                            document.getElementById('error_monitor').innerHTML = '';
                        }, 2000);
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                }
            })
        })

        function setLinkDelete(id) {
            url = '<?= route('type.index') ?>' + '/' + id;
            $("#delete_receive").attr('action', url);
        }
    </script>
@endsection
