@extends('include.admin')
@section('title', 'Sổ thu chi')
@section('main')
    {{-- Modal xóa --}}
    <div class="modal fade" id="xoa-money-log" data-backdrop="static" tabindex="-1" role="dialog"
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
                    <form id="delete_money_log" action="#" method="POST">
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
        <h1 class="display-4 text-center">Sổ thu chi</h1>
    </div>
    {{-- Modal Thủ Công --}}
    <div class="modal fade" id="thucong" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:1040px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Sổ thu chi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('money-log.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th><b>Chi nhánh</b></th>
                                <td>
                                    <select name="storage_id" class="select2 js-example-basic-single js-states form-control"
                                        style="width:100%" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn chi nhánh</option>
                                        @foreach ($storage as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->storage_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><b>Doanh thu tháng trước</b></th>
                                <td>
                                    <input type="text" class="form-control" name="money_before">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Thu</b></th>
                                <td>
                                    <input type="text" class="form-control" name="earn">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Chi</b></th>
                                <td>
                                    <input type="text" class="form-control" name="spend">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Doanh thu tháng này</b></th>
                                <td>
                                    <input type="text" class="form-control" name="total_money">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button id="add_new_moneylog" type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Chỉnh Sửa --}}
    <div class="modal fade" id="edit-money-log" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:1040px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Sổ thu chi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-money-logs" action="#" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th><b>Chi nhánh</b></th>
                                <td>
                                    <select id="edit_storage_id" name="edit_storage_id"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="4" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn chi nhánh</option>
                                        @foreach ($storage as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->storage_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><b>Doanh thu tháng trước</b></th>
                                <td>
                                    <input id="edit_money_before" type="text" class="form-control"
                                        name="edit_money_before">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Thu</b></th>
                                <td>
                                    <input id="edit_earn" type="text" class="form-control" name="edit_earn">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Chi</b></th>
                                <td>
                                    <input id="edit_spend" type="text" class="form-control" name="edit_spend">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Doanh thu tháng này</b></th>
                                <td>
                                    <input id="edit_total_money" type="text" class="form-control" name="edit_total_money">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button id="add_new_moneylog" type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="float: left">
        <table>
            <tr>
                <td>
                    <span><b>Năm</b></span>
                    <select name="storage_name" class="select2 js-example-basic-single js-states form-control"
                        style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option disabled selected>Chọn năm</option>
                        <option value="1">1</option>
                        <option value="1">1</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <span><b>Tháng</b></span>
                    <select name="storage_name" class="select2 js-example-basic-single js-states form-control"
                        style="width:100%" data-select2-id="2" tabindex="-1" aria-hidden="true">
                        <option disabled selected>Chọn tháng</option>
                        <option value="1">1</option>
                        <option value="1">1</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <table class="table table-hover">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Chi nhánh</th>
            <th scope="col">Tồn trước</th>
            <th scope="col">Thu</th>
            <th scope="col">Chi</th>
            <th scope="col">Tồn cuối</th>
        </tr>
        @if (count($log) == 0)
            <tr>
                <td colspan="5"><span style="color:red; padding-left:50%">Không có bản ghi nào</span></td>
            </tr>
        @else
            @foreach ($log as $key => $value)
                <tr>
                    <td scope="row">{{ ++$key }}</td>
                    <td>{{ $value->storage->storage_name }}</td>
                    <td>{{ $value->money_before }}</td>
                    <td>{{ $value->earn }}</td>
                    <td>{{ $value->spend }}</td>
                    <td>{{ $value->total }}</td>
                    <td>
                        <button onclick="setLinkEdit({{ $value->id }})" id="edit-log" type="button"
                            class="btn btn-warning" data-toggle="modal" data-target="#edit-money-log">Sửa</button>
                        <button onclick="setLinkDelete({{ $value->id }})" id="delete-m  oney-log" type="button"
                            class="btn btn-danger" data-toggle="modal" data-target="#xoa-money-log">Xóa</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@section('menu-bar')
    <button type="button" class="btn bg-gradient-success btn-sm menu-bar">Thêm
        từ exel</button>
    <button type="button" class="btn bg-gradient-primary btn-sm menu-bar">Xuất
        exel</button>
    <button type="button" class="btn bg-gradient-warning btn-sm menu-bar" data-toggle="modal" data-target="#thucong">Thủ
        công</button>
@endsection
@endsection
@section('scripts')
<script>
    setTimeout(function() {
        $("#main-notification").html('');
    }, 2000)

    function setLinkDelete(id) {
        url = '<?= route('money-log.index') ?>' + '/' + id;
        $("#delete_money_log").attr('action', url);
    }

    function setLinkEdit(id) {
        url = '<?= route('money-log.index') ?>' + '/' + id;
        $("#edit-money-logs").attr('action', url);
        $.ajax({
            url: url,
            method: 'GET',
            data: id,
            success: function(response) {
                if (response.success) {
                    $("#edit_storage_id").val(response.success.storage_id).change();
                    $("#edit_money_before").val(response.success.money_before);
                    $("#edit_earn").val(response.success.earn);
                    $("#edit_spend").val(response.success.spend);
                    $("#edit_total_money").val(response.success.total);
                } else {
                    // 
                }
            }
        })
    }
</script>
@endsection
