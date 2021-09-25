@extends('include.admin')
@section('title', 'Quản lí hàng hóa')
@section('main')
    {{-- Modal Thủ Công --}}
    <div class="modal fade" id="thucong" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:1340px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Quản lí hàng hóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="show-error-receive"></div>
                    <form id="receive_form" method="post">
                        @csrf
                        <table class="table">
                            <tr>
                                <td> <b>Nhà cung cấp</b></td>
                                <td colspan="3">
                                    <select id="supplier_id" name="supplier_id"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="29" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn nhà cung cấp</option>
                                        @foreach ($suppliers as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->supplier_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Chi nhánh</b></td>
                                <td>
                                    <select name="storage_id" class="select2 js-example-basic-single js-states form-control"
                                        style="width:100%" data-select2-id="28" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn chi nhánh</option>
                                        @foreach ($storage as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->storage_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td> <b>Thanh toán</b></td>
                                <td>
                                    <select name="type_receive"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="12" tabindex="-1" aria-hidden="true">
                                        <option value="Bán lẻ">Xuất bán lẻ</option>
                                        <option value="Chuyển khoản">Chuyển khoản</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Ngày nhập</b></td>
                                <td>
                                    <input type="date" class="form-control" name="date_receive">
                                </td>
                                <td><b>Người nhập</b></td>
                                <td>
                                    <select name="employee_name"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="27" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn nhân viên</option>
                                        @foreach ($employee as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Ghi chú</b></td>
                                <td colspan="3"><input name="order_note" type="text" class="form-control"
                                        id="exampleInputEmail1"></td>
                            </tr>
                        </table>
                        <span id="clear_all_order" style="color:red;font-size:12px;float: right; cursor: pointer;">Xóa tất
                            cả</span>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Đơn vị tính</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                            <tbody id="display_product">

                            </tbody>
                            <tr>
                                <td>
                                    <select id="product_id" name="product_name" id="product_name"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="16" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn sản phẩm</option>
                                    </select>
                                    <input type="hidden" id="total_moneys" name="total_moneys">
                                </td>
                                <td>
                                </td>
                                <td>
                                    <input type="text" class="form-control" disabled id="1">
                                </td>
                                <td>
                                    <input type="text" class="form-control" disabled id="2">
                                </td>
                                <td></td>
                            </tr>
                        </table>
                        <div id="total">
                            <h5>Tổng tiền : <span id="total_money_display" style="color:red"></span> <span
                                    style="font-size: 12px">VND</span></h5>
                        </div>
                        <button id="add_receive_button" type="button" class="btn btn-success float-right">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Thủ Công --}}
    <div class="modal fade" id="xem-bill" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:1040px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Quản lí hàng hóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('stock.store') }}" method="post">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button id="add_new_moneylog" type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal xóa --}}
    <div class="modal fade" id="delete-receive" data-backdrop="static" tabindex="-1" role="dialog"
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
        <h1 class="display-4 text-center">Quản lí hàng hóa</h1>
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
            <th scope="col">Nhà cung cấp</th>
            <th scope="col">Chi nhánh</th>
            <th scope="col">Ngày nhập</th>
            <th scope="col">Người nhập</th>
            <th scope="col">Thanh toán</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Tổng tiền</th>
        </tr>
        @if (count($log) == 0)
            <tr>
                <td colspan="8"><span style="color:red; padding-left:50%">Không có bản ghi nào</span></td>
            </tr>
        @else
            @foreach ($log as $key => $value)
                <tr>
                    <td scope="row">{{ ++$key }}</td>
                    <td>{{ $value->supplier->supplier_name }}</td>
                    <td>{{ $value->storage->storage_name }}</td>
                    <td>{{ $value->date_receive }}</td>
                    <td>{{ $value->employee->name }}</td>
                    <td>{{ $value->type_receive }}</td>
                    <td>{{ $value->note }}</td>
                    <td>{{ $value->total_money }}</td>
                    <td>
                        <button id="edit-log" type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#edit-money-log">Sửa</button>
                        <button onclick="setLinkDelete({{ $value->id }})" type="button" class="btn btn-danger"
                            data-toggle="modal" data-target="#delete-receive">Xóa</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@section('menu-bar')
    <button type="button" class="btn bg-gradient-success btn-sm menu-bar">Thêm
        NCC</button>
    <button type="button" class="btn bg-gradient-primary btn-sm menu-bar">Thêm SP</button>
    <button type="button" class="btn bg-gradient-warning btn-sm menu-bar" data-toggle="modal" data-target="#thucong">Nhập
        hàng</button>
@endsection
@endsection
@section('scripts')
<script>
    function setLinkDelete(id) {
        url = '<?= route('stock.index') ?>' + '/' + id;
        $("#delete_receive").attr('action', url);
    }
    // Clear Notification
    setTimeout(function() {
        $("#main-notification").html('')
    }, 2000)
    $("#clear_all_order").on('click', function() {
        $("#display_product").html('');
        $("#total_money_display").html('');
        $("#total_moneys").val(0);
        total_money = 0;
    })
    var total_money = 0;
    $(document.body).on("change", "#supplier_id", function() {
        var supplier_id = this.value;
        var url = `{{ route('supplier.index') }}` + '/' + supplier_id;
        $.ajax({
            url: url,
            method: 'GET',
            data: supplier_id,
            success: function(response) {
                if (response.success) {
                    $("#display_product").html('');
                    $("#total_money_display").html('');
                    $("#total_moneys").val(0);
                    total_money = 0;
                    $("#product_id").html('<option disabled selected>Chọn sản phẩm</option>');
                    $.each(response.success, function(key, value) {
                        $("#product_id").append(
                            `<option value="` + value.id + `">` + value.product_name +
                            `</option>`
                        );
                    });
                } else {
                    // 
                }
            }
        })
    });
    $(document.body).on("change", "#product_id", function() {
        var product_id = this.value;
        var url = `{{ route('supplier-product.index') }}` + '/' + product_id;
        $.ajax({
            url: url,
            method: 'GET',
            data: product_id,
            success: function(response) {
                if (response.success) {
                    total_money += response.success.product_price;
                    $("#total_money_display").html(total_money);
                    $("#total_moneys").val(total_money);
                    $('#display_product').append(`
                    <tr>
                        <td>` + response.success.product_name + `</td>
                        <td>` + response.success.unit +
                        `<input type="hidden" class="form-control" name="product_id[]" value="` +
                        response.success
                        .id + `"></td>
                        <td><input type="text" class="form-control" name="qty[]" value="1"></td>
                        <td><input type="text" class="form-control"  value="` + response
                        .success
                        .product_price + `"></td>
                        <td><input name="total_price[]" type="text" class="form-control" value="` + response.success
                        .product_price + `"></td>
                    </tr>`)
                } else {
                    // 
                }
            }
        })
    });
    $("#add_receive_button").on('click', function(e) {
        e.preventDefault();
        var url = '{{ route('stock.store') }}';
        $.ajax({
            url: url,
            method: 'POST',
            data: $('#receive_form').serialize(),
            statusCode: {
                422: function(response) {
                    $("#show-error-receive").html('');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $("#show-error-receive").append(
                            '<span style="color:red; padding-left:20px">' + value +
                            '</span><br>');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    // $("#customer_name").val('')
                    // $("#customer_phone").val('')
                    // $("#customer_email").val('')
                    // $("#customer_address_info").val('')
                    // $("#customer_dob").val('')
                    // $("#customer_cmt").val('')
                    $("#show-error-receive").append(
                        '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                        response.success + '</div></div></div>'
                    )
                    setTimeout(function() {
                        document.getElementById('show-error-receive').innerHTML = '';
                    }, 2000);
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            }
        })
    })
</script>
@endsection
