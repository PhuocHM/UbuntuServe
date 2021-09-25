@extends('include.admin')
@section('title', 'Sản phẩm bán ra')
@section('main')
    {{-- Modal edit price --}}
    <div class="modal fade" id="edit_price" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa giá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="edit-error-display"></div>
                <form id="edit_price_form" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th scope="col">Giá</th>
                                <td>
                                    <input type="hidden" name="product_edit_id" id="product_edit_id">
                                    <input type="text" class="form-control" name="edit_price" id="edit_price_field">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button id="edit_button" type="button" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                    <div id="error_selling_display"></div>
                    <form id="receive_form" method="post">
                        @csrf
                        <table class="table">
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
                            </tr>
                            <tr>
                                <td> <b>Sản phẩm</b></td>
                                <td>
                                    <select id="product_id" name="product_name"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="16" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn sản phẩm</option>
                                        @foreach ($stock_product as $key => $value)
                                            <option value="{{ $value->product_id }}">
                                                {{ $value->supplier_product->product_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Tên sản phẩm</b></td>
                                <td>
                                    <input type="text" id="product_names" name="product_names" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Giá nhập</b></td>
                                <td>
                                    <input type="text" id="product_receive" name="product_receive" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Đơn vị</b></td>
                                <td>
                                    <input type="text" name="product_unit" class="form-control" id="product_unit">
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Giá bán</b></td>
                                <td>
                                    <input type="text" name="product_price" class="form-control">
                                </td>
                            </tr>
                        </table>
                        <button id="add_product_button" type="button" class="btn btn-success float-right">Lưu</button>
                    </form>
                </div>
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
        <h1 class="display-4 text-center">Sản phẩm bán ra</h1>
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
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Chi nhánh</th>
            <th scope="col">Đơn vị</th>
            <th scope="col">Giá nhập</th>
            <th scope="col">Giá bán</th>
        </tr>
        @if (count($log) == 0)
            <tr>
                <td colspan="8"><span style="color:red; padding-left:50%">Không có bản ghi nào</span></td>
            </tr>
        @else
            @foreach ($log as $key => $value)
                <tr>
                    <td scope="row">{{ ++$key }}</td>
                    <td>{{ $value->product_name }}</td>
                    <td>{{ $value->storage->storage_name }}</td>
                    <td>{{ $value->unit }}</td>
                    <td>{{ $value->receive_price }}</td>
                    <td>{{ $value->price }}</td>
                    <td>
                        <button onclick="setLinkEdit({{ $value->id }})" id="edit-price-button" type="button"
                            class="btn btn-warning" data-toggle="modal" data-target="#edit_price">Sửa</button>
                        <button onclick="setLinkDelete({{ $value->id }})" type="button" class="btn btn-danger"
                            data-toggle="modal" data-target="#delete-receive">Xóa</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@section('menu-bar')
    <button type="button" class="btn bg-gradient-primary btn-sm menu-bar" data-toggle="modal" data-target="#thucong">Thêm
        SP</button>
@endsection
@endsection
@section('scripts')
<script>
    // Clear Notification
    setTimeout(function() {
        $("#main-notification").html('')
    }, 2000)

    function setLinkDelete(id) {
        url = '<?= route('products.index') ?>' + '/' + id;
        $("#delete_receive").attr('action', url);
    }

    function setLinkEdit(id) {
        url = '<?= route('products.index') ?>' + '/' + id;
        $.ajax({
            url: url,
            type: "GET",
            data: id,
            success: function(response) {
                console.log(response.success.price)
                if (response.success) {
                    $("#edit_price_field").val(response.success.price);
                    $("#product_edit_id").val(id);
                }
            }
        })
    }
    $("#edit_button").on('click', function(e) {
        var id = $("#product_edit_id").val();
        var url = '<?= route('products.index') ?>' + '/' + id;
        $.ajax({
            url: url,
            type: "PATCH",
            data: $('#edit_price_form').serialize(),
            statusCode: {
                422: function(response) {
                    $("#edit-error-display").html('');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $("#edit-error-display").append(
                            '<span style="color:red">' + value + '</span><br>');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    $("#edit-error-display").append(
                        '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                        response.success + '</div></div></div>'
                    )
                    setTimeout(function() {
                        document.getElementById('edit-error-display').innerHTML = '';
                    }, 2000);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            }
        })
    })
    $("#add_product_button").on('click', function(e) {
        var url = '<?= route('products.store') ?>';
        $.ajax({
            url: url,
            type: "POST",
            data: $('#receive_form').serialize(),
            statusCode: {
                422: function(response) {
                    $("#error_selling_display").html('');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $("#error_selling_display").append(
                            '<span style="color:red; padding-left:20px">' + value +
                            '</span><br>');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    $("#error_selling_display").append(
                        '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                        response.success + '</div></div></div>'
                    )
                    setTimeout(function() {
                        document.getElementById('error_selling_display').innerHTML = '';
                    }, 2000);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            }
        })
    })
    $(document.body).on("change", "#product_id", function() {
        var product_id = this.value;
        var url = '{{ route('supplier-product.index') }}' + '/' + product_id;
        $.ajax({
            url: url,
            method: 'GET',
            data: product_id,
            success: function(response) {
                if (response.success) {
                    $("#product_receive").val(response.success.product_price)
                    $("#product_unit").val(response.success.unit)
                    $("#product_names").val(response.success.product_name)
                }
            }
        })
    });
</script>
@endsection
