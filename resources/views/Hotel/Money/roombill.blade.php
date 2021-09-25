@extends('include.admin')
@section('title', 'Sổ thu chi')
@section('main')
    {{-- Modal Thủ Công --}}
    <div class="modal fade" id="xem-bill" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:1040px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Hóa đơn bán lẻ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @csrf
                <div class="modal-body">
                    <table class="table table-hover">
                        <tr>
                            <th><b>STT</b></th>
                            <th><b>Tên sản phẩm</b></th>
                            <th><b>Đơn vị tính</b></th>
                            <th><b>Số lượng</b></th>
                        </tr>
                        <tbody id="bill-display"></tbody>
                    </table>
                </div>
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
        <h1 class="display-4 text-center">Hóa đơn bán lẻ</h1>
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
            <th scope="col">Tên phòng</th>
            <th scope="col">Chi nhánh</th>
            <th scope="col">Thanh toán</th>
            <th scope="col">Ngày bán</th>
            <th scope="col">Nhân viên</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Tổng tiền</th>
        </tr>
        {{-- {{ dd($log) }} --}}
        @if (count($log) == 0)
            <tr>
                <td colspan="8"><span style="color:red; padding-left:50%">Không có bản ghi nào</span></td>
            </tr>
        @else
            @foreach ($log as $key => $value)
                @if ($value->active == 0)
                    <tr>
                        <td scope="row">{{ ++$key }}</td>
                        <td>{{ $value->room->room_name }}</td>
                        <td>{{ $value->storage->storage_name }}</td>
                        <td>{{ $value->type_sell }}</td>
                        <td>{{ $value->date_sell }}</td>
                        <td>{{ $value->employee->name }}</td>
                        <td>{{ $value->note }}</td>
                        <td>{{ $value->total_prices }}</td>
                        <td>
                            <button onclick="setLinkView({{ $value->id }})" id="edit-log" type="button"
                                class="btn btn-warning" data-toggle="modal" data-target="#xem-bill">Xem</button>
                            <button onclick="setLinkDelete({{ $value->id }})" id="delete-m  oney-log" type="button"
                                class="btn btn-danger" data-toggle="modal" data-target="#xoa-bill">Xóa</button>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
    </table>
@section('menu-bar')
@endsection
@endsection
@section('scripts')
<script>
    setTimeout(function() {
        $("#main-notification").html('');
    }, 2000)

    function setLinkDelete(id) {
        url = '<?= route('selling.index') ?>' + '/' + id;
        $("#delete_bill").attr('action', url);
    }

    function setLinkView(id) {
        url = '<?= route('selling-detail.index') ?>' + '/' + id;
        $.ajax({
            url: url,
            method: 'GET',
            data: id,
            success: function(response) {
                if (response.success) {
                    $("#bill-display").html('');
                    $.each(response.success, function(key, value) {
                        $("#bill-display").append(
                            `<tr>
                                <td>${++key}</td>    
                                <td>` + value.product_name + `</td>    
                                <td>` + value.unit + `</td>    
                                <td>` + value.qty + `</td>    
                            </tr>`);
                    });
                } else {
                    // 
                }
            }
        })
    }
</script>
@endsection
