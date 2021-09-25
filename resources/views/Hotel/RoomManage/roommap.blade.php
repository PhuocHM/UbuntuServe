@extends('include.admin');
@section('title', 'Trang chủ');
@section('main')
    <div id="main-notification">
        @if (session('update-customer-success'))
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header"><strong class="mr-auto">Thông
                            báo</strong><small>Chi tiết</small><button data-dismiss="toast" type="button"
                            class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="toast-body">{{ session('update-customer-success') }}</div>
                </div>
            </div>
        @elseif (session('delete-customer-success'))
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header"><strong class="mr-auto">Thông
                            báo</strong><small>Chi tiết</small><button data-dismiss="toast" type="button"
                            class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="toast-body">{{ session('delete-customer-success') }}</div>
                </div>
            </div>
        @elseif (session('update-room-success'))
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header"><strong class="mr-auto">Thông
                            báo</strong><small>Chi tiết</small><button data-dismiss="toast" type="button"
                            class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="toast-body">{{ session('update-room-success') }}</div>
                </div>
            </div>
        @elseif (session('delete-room-success'))
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header"><strong class="mr-auto">Thông
                            báo</strong><small>Chi tiết</small><button data-dismiss="toast" type="button"
                            class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="toast-body">{{ session('delete-room-success') }}</div>
                </div>
            </div>
        @endif
    </div>
    {{-- Modal xóa phòng --}}
    <div class="modal fade" id="xoaphong" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Xóa phòng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hành động này sẽ không thể khôi phục !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                    <form id="delete_form" action="#" method="post">
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-outline-light">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal xóa khách hàng --}}
    <div class="modal fade" id="xoakhachhang" data-backdrop="static" role="dialog" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_customer_display"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hãy chắc chắn rằng khách hàng này không có trong danh sách đặt phòng !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                    <form id="delete_customer_form" action="#" method="post">
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-outline-light">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal thêm tầng --}}
    <div class="modal fade" id="themtang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin tầng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Thêm loại phòng</h4>
                    <div id="error-add-floor"></div>
                    <form id="them_loai_phong" method="post">
                        @csrf
                        <table class="table">
                            <tr>
                                <th><b>Tên loại phòng</b></th>
                                <td>
                                    <input name="room_type_name" id="type_name" type="text"
                                        class="form-control float-right">
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
                            <tr>
                                <td></td>
                                <td align="right">
                                    <button id="add-type" type="button" class="btn btn-success">Thêm</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    {{--  --}}
                    <h4>Thêm tầng</h4>
                    <form id="them_tang" method="post">
                        @csrf
                        <table class="table">
                            <tr>
                                <th><b>Tên tầng</b></th>
                                <td>
                                    <input id="floor_name" name="floor_name" type="text" class="form-control float-right">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td align="right">
                                    <button id="add-floor" type="button" class="btn btn-success">Thêm</button>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- Modal thêm kh --}}
    <div class="modal fade" id="themkh" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 750px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm khách hàng</h5>
                    <div id="show-error-customer"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="them-khach-hang">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th><b>Tên khách hàng</b></th>
                                <td colspan="3"><input id="customer_name" name="customer_name" type="text"
                                        class="form-control float-right">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Số điện thoại</b></th>
                                <td><input id="customer_phone" name="customer_phone" type="text"
                                        class="form-control float-right"></td>
                                <th><b>Email</b></th>
                                <td><input id="customer_email" name="customer_email" type="text"
                                        class="form-control float-right"></td>
                            </tr>
                            <tr>
                                <th><b>Tỉnh thành</b></th>
                                <td>
                                    <select name="customer_address"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="24" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn tỉnh thành</option>
                                        <option value="Hà Nội">Hà Nội</option>
                                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                        <option value="Huế">Huế</option>
                                        <option value="Quảng Bình">Quảng Bình</option>
                                    </select>
                                </td>
                                <th><b>Địa chỉ</b></th>
                                <td><input id="customer_address_info" name="customer_address_info" type="text"
                                        class="form-control float-right"></td>
                            </tr>
                            <tr>
                                <th><b>Giới tính</b></th>
                                <td>
                                    <select name="customer_gender"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="2" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn giới tính</option>
                                        <option value="man">Nam</option>
                                        <option value="woman">Nữ</option>
                                        <option value="other">Khác</option>
                                    </select>
                                </td>
                                <th><b>Ngày sinh</b></th>
                                <td>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input id="customer_dob" name="customer_dob" type="text"
                                            class="form-control datetimepicker-input" data-target="#reservationdate">
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><b>CMT / Số HC</b></th>
                                <td><input id="customer_cmt" name="customer_cmt" type="text"
                                        class="form-control float-right"></td>
                            </tr>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="add-new-customer" type="button" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Thêm Phòng -->
    <div class="modal fade" id="themphong" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 545px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm phòng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="error-add-room"></div>
                <form method="post" id="them_phong">
                    @csrf
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th><b>Tên phòng</b></th>
                                <td colspan="3"><input id="room_name" name="room_name" type="text"
                                        class="form-control float-right"></td>
                            </tr>
                            <tr>
                                <th><b>Loại phòng</b></th>
                                <td>

                                    <select name="room_type" class="select2 js-example-basic-single js-states form-control"
                                        style="width:100%" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn loại phòng</option>
                                        @foreach ($type as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <th><b>Tầng</b></th>
                                <td>
                                    <select name="room_floor" class="select2 js-example-basic-single js-states form-control"
                                        style="width:100%" data-select2-id="22" tabindex="-1" aria-hidden="true">
                                        <option selected>Chọn tầng</option>
                                        @foreach ($floor as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><b>Ghi chú</b></th>
                                <td colspan="3"><input id="room_note" name="room_note" type="text"
                                        class="form-control float-right"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="2">
                                    <button type="button" class="btn btn-block btn-success" data-toggle="modal"
                                        data-target="#themtang">Thêm tầng</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="add-room-button" type="button" class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal đặt phòng-->
    <div class="modal fade" id="datphong" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 840px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đặt phòng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="error-booking"></div>
                <div class="modal-body">
                    <div id="show-booking-error"></div>
                    <table class="table">
                        <form method="POST" id="add_booking_form">
                            @csrf
                            <tr>
                                <th><b>Checkin</b></th>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input name="booking_time" type="text"
                                            class="form-control float-right booking_time" id="reservation">
                                    </div>
                                </td>
                                <th><b>Đặt trước</b></th>
                                <td>
                                    <input id="booking_money" name="booking_money" type="text"
                                        class="form-control float-right">
                                </td>
                            </tr>
                            <tr>
                                <th><b>Ghi chú</b></th>
                                <td>
                                    <input name="booking_note" type="text" class="form-control float-right">
                                </td>
                                <th><b>Phòng</b></th>
                                <td>

                                    <select id="booking_room" name="booking_room"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="23" tabindex="-1" aria-hidden="true">
                                        @if (count($room_active) == 0)
                                            <option disabled style="color:red">Không có phòng khả dụng</option>
                                        @else
                                            <option disabled selected>Chọn loại phòng</option>
                                            @foreach ($room_active as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->room_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                            </tr>
                            <input id="customer_id" type="hidden" name="customer_id">
                        </form>
                        <tr>
                            <th><b>Tìm khách hàng</b></th>
                            <td>
                                <form id="find-customer" method="get">
                                    <div class="input-group mb-3">
                                        <input id="find_cmt" name="find_cmt" type="text" class="form-control"
                                            placeholder="Nhập CMND" aria-label="Recipient's username"
                                            aria-describedby="button-addon2">
                                        <button id="find-customer-button" style="margin-left: 10px"
                                            class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm
                                            kiếm</button>
                                    </div>
                                </form>
                            </td>
                            <td colspan="2">
                                <button type="button" class="btn btn-block btn-success" data-toggle="modal"
                                    data-target="#themkh">Thêm khách hàng</button>
                            </td>
                        </tr>
                    </table>
                    <h5>Danh sách khách hàng <small id="current-customer" class="float-right"
                            style="cursor: pointer; color:red">Xóa tất
                            cả</small></h5>
                    <table class="table table-bordered">
                        <tr>
                            <th><b>Tên khách hàng</b></th>
                            <th><b>CMT/Số HC</b></th>
                            <th><b>SDT</b></th>
                            <th><b>Email</b></th>
                        </tr>
                        <tbody id="show_customers">
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="add_booking_button" type="button" class="btn btn-success">Đặt phòng</button>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    <!-- Modal bán lẻ -->
    <div class="modal fade bd-example-modal-lg" id="banle" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width:1040px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Phiếu xuất sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="error_selling_display"></div>
                    <form id="selling_form" action="{{ route('selling.store') }}" method="post">
                        @csrf
                        <table class="table">
                            <tr>
                                <td> <b>Số phòng</b></td>
                                <td colspan="3">
                                    <select name="order_room"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="29" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn loại phòng</option>
                                        @foreach ($room_used as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->room_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Kho hàng</b></td>
                                <td>
                                    <select name="storage_name"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="28" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn chi nhánh</option>
                                        @foreach ($storage as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->storage_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td> <b>Loại xuất</b></td>
                                <td>
                                    <select name="type_sell" class="select2 js-example-basic-single js-states form-control"
                                        style="width:100%" data-select2-id="12" tabindex="-1" aria-hidden="true">
                                        <option value="Bán lẻ">Xuất bán lẻ</option>
                                        <option value="Chuyển khoản">Chuyển khoản</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <b>Ngày xuất</b></td>
                                <td>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input name="date_sell" type="date" class="form-control datetimepicker-input"
                                            data-target="#reservationdate">
                                    </div>
                                </td>
                                <td><b>Người xuất</b></td>
                                <td>
                                    {{-- {{ dd($employee) }} --}}
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
                                <th>KM</th>
                                <th>Thành tiền</th>
                            </tr>
                            <tbody id="display_product">

                            </tbody>
                            <tr>
                                <td>
                                    <select name="product_name" id="product_name"
                                        class="select2 js-example-basic-single js-states form-control" style="width:100%"
                                        data-select2-id="16" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Chọn sản phẩm</option>
                                        @foreach ($products as $key => $value)
                                            @if ($value->active == 0)
                                                <option value="{{ $value->id }}">{{ $value->product_name }}</option>
                                            @endif
                                        @endforeach
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
                                <td>
                                    <input type="checkbox" class="form-control" disabled id="3">
                                </td>
                                <td></td>
                            </tr>
                        </table>
                        <div id="total">
                            <h5>Tổng tiền : <span id="total_money_display" style="color:red"></span> <span
                                    style="font-size: 12px">VND</span></h5>
                        </div>
                        <button id="add_selling_button" type="button" class="btn btn-success float-right">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
    {{-- Modal danh sách đật phòng --}}
    <div class="modal fade" id="dsdatphong" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 1040px;">
            <div class="  modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Danh sách đặt phòng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="display-booking">
                        @include('include.pagination_booking')
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal danh sách khách hàng --}}
    <div class="modal fade bd-example-modal-lg" id="dskhachhang" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Danh sách khách hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="display-customer">
                        @include('include.pagination_customer')
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('menu-bar')
    <button type="button" class="btn bg-gradient-success btn-sm menu-bar" data-toggle="modal" data-target="#themphong">Thêm
        phòng</button>
    <button type="button" class="btn bg-gradient-primary btn-sm menu-bar" data-toggle="modal" data-target="#datphong">Đặt
        phòng</button>
    <button type="button" class="btn bg-gradient-primary btn-sm menu-bar" data-toggle="modal" data-target="#dsdatphong">DS
        đặt
        phòng</button>
    <button type="button" class="btn bg-gradient-primary btn-sm menu-bar" data-toggle="modal" data-target="#dskhachhang">
        Khách hàng</button>
    <button type="button" class="btn bg-gradient-warning btn-sm menu-bar" data-toggle="modal" data-target="#banle">Bán
        lẻ</button>
    <i class="fas fa-home" data-toggle="tooltip" data-placement="top" title="Tổng số phòng"></i><span
        class="menu-bar-text">{{ count($room_active) + count($room_used) }}</span>
    <i class="fas fa-person-booth" data-toggle="tooltip" data-placement="top" title="Phòng trống"></i><span
        class="menu-bar-text">{{ count($room_active) }}</span>
    <i class="fas fa-bed" data-toggle="tooltip" data-placement="top" title="Phòng đã sử dụng"></i><span
        class="menu-bar-text">{{ count($room_used) }}</span>
@endsection
<table class="table table-bordered">
    @foreach ($groups as $key => $value)
        <tr>
            <th style="map-button" scope="row">{{ $floor_arr[$key] }}</th>
            <td>
                @foreach ($value as $keys => $values)
                    <div onclick="selectRoom({{ $values->id }})" class="room-display <?php if ($values->status == 2) {
    echo 'fixroom';
} ?>">
                        <h4>{{ $values->room_name }}</h4><br>
                        <p>{{ $values->type->type_name }}</p>
                        <p>Số người : {{ $values->type->capacity }}</p>
                    </div>
                @endforeach
            </td>
        </tr>
    @endforeach
</table>
{{-- Right click Area --}}
<div class="dropdown-menu dropdown-menu-sm" id="context-menu">
    <button type="button" id="xoaphong" class="dropdown-item" data-toggle="modal" data-target="#xoaphong">Xóa
        phòng</button>
    <a id="suathongtinphong" class="dropdown-item" href="#">Sửa thông tin phòng</a>
    <a id="sansang" class="dropdown-item" href="#">Sẵn sàng</a>
</div>
{{--  --}}
@endsection
@section('scripts')
<script>
    setTimeout(function() {
        document.getElementById('main-notification').innerHTML = '';
    }, 2000)
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    function selectRoom(id) {
        url = '<?= route('room.index') ?>';
        document.getElementById('suathongtinphong').href = url + '/' + id + '/edit';
        document.getElementById('xoaphong').onclick = deleteRoom(url + '/' + id);
        console.log(document.getElementById('xoaphong').onclick);
        document.getElementById('sansang').href = id;
    }

    function deleteRoom(url) {
        document.getElementById("delete_form").action = url;
    }

    function deleteCustomer(id, name) {
        url = '<?= route('customer.index') ?>';
        document.getElementById('delete_customer_display').innerHTML = 'Bạn có muốn xóa khách hàng : ' + name;
        document.getElementById('delete_customer_form').action = url + '/' + id;
        console.log(document.getElementById('delete_customer_form').action);
    }

    function deleteBooking(id, name) {
        url = '<?= route('booking.index') ?>';
        document.getElementById('delete_customer_display').innerHTML = 'Bạn có muốn xóa phòng đã đặt của  : ' + name;
        document.getElementById('delete_customer_form').action = url + '/' + id;
    }
</script>
<script>
    $("#clear_all_order").on('click', function(e) {
        $("#display_product").html('');
        $("#total_money_display").html('');
        $("#total_moneys").val(0);
    })
    $('.room-display').on('contextmenu', function(e) {
        var top = e.pageY - 150;
        var left = e.pageX - 257;
        $("#context-menu").css({
            display: "block",
            top: top,
            left: left
        }).addClass("show");
        return false; //blocks default Webbrowser right click menu
    }).on("click", function() {
        $("#context-menu").removeClass("show").hide();
    });

    $("#context-menu a").on("click", function() {
        $(this).parent().removeClass("show").hide();
    });
    $(document).on('show.bs.modal', '.modal', function() {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });
    // 
    var total_money = 0;
    $(document.body).on("change", "#product_name", function() {
        var product_id = this.value;
        var url = `{{ route('products.index') }}` + '/' + product_id;
        $.ajax({
            url: url,
            method: 'GET',
            data: product_id,
            success: function(response) {
                if (response.success) {
                    total_money += response.success.price;
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
                        .price + `"></td>
                        <td><input type="checkbox" class="form-control"></td>
                        <td><input name="total_price[]" type="text" class="form-control" value="` + response.success
                        .price + `"></td>
                    </tr>`)
                } else {
                    // 
                }
            }
        })
    });
</script>
<script type="text/javascript">
    $("#add-type").click(function(e) {

        e.preventDefault();
        var url = '{{ route('type.store') }}';

        $.ajax({
            url: url,
            method: 'POST',
            data: $('#them_loai_phong').serialize(),
            statusCode: {
                422: function(response) {
                    $("#error-add-floor").html('');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $("#error-add-floor").append(
                            '<span style="color:red">' + value + '</span><br>');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    $("#type_name").html('');
                    $("#type_capacity").html('');
                    $("#type_price").html('');
                    $("#error-add-floor").append(
                        '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                        response.success + '</div></div></div>'
                    )
                    setTimeout(function() {
                        document.getElementById('error-add-floor').innerHTML = '';
                    }, 2000);
                    setTimeout(function() {
                        $("#themtang").modal('hide');
                    }, 2000);

                } else {
                    document.getElementById('error-add-floor').innerHTML = '';
                    $.each(response.error, function(key, value) {
                        $("#error-add-floor").append(
                            '<span style="color:red">' + value + '</span><br>');
                    });
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    });
    $("#add-floor").click(function(e) {

        e.preventDefault();
        var url = '{{ route('floor.store') }}';

        $.ajax({
            url: url,
            method: 'POST',
            data: $('#them_tang').serialize(),
            statusCode: {
                422: function(response) {
                    $("#error-add-floor").html('');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $("#error-add-floor").append(
                            '<span style="color:red">' + value + '</span><br>');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    // document.getElementById('floor_name').value = '';
                    $("#error-add-floor").append(
                        '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                        response.success + '</div></div></div>'
                    )
                    setTimeout(function() {
                        document.getElementById('error-add-floor').innerHTML = '';
                    }, 2000);
                    setTimeout(function() {
                        $("#themtang").modal('hide');
                    }, 2000);
                }
            },
        });
    });
    $("#add-room-button").click(function(e) {

        e.preventDefault();
        var url = '{{ route('room.store') }}';

        $.ajax({
            url: url,
            method: 'POST',
            data: $('#them_phong').serialize(),
            statusCode: {
                422: function(response) {
                    $("#error-add-room").html('');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $("#error-add-room").append(
                            '<span style="color:red; padding-left:20px">' + value +
                            '</span><br>');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    $("#room_name").val('');
                    $("#room_note").val('');
                    $("#error-add-room").append(
                        '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                        response.success + '</div></div></div>'
                    )
                    setTimeout(function() {
                        document.getElementById('error-add-room').innerHTML = '';
                    }, 2000);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                    $("#error-add-room").val('');
                    $.each(response.error, function(key, value) {
                        $("#error-add-room").append(
                            '<span style="color:red; padding-left:20px">' + value +
                            '</span><br>');
                    });
                }
            },
        });
    });
    $("#add-new-customer").click(function(e) {
        e.preventDefault();
        var url = '{{ route('customer.store') }}';
        $.ajax({
            url: url,
            method: 'POST',
            data: $('#them-khach-hang').serialize(),
            statusCode: {
                422: function(response) {
                    $("#show-error-customer").html('');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $("#show-error-customer").append(
                            '<span style="color:red; padding-left:20px">' + value +
                            '</span><br>');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    $("#customer_name").val('')
                    $("#customer_phone").val('')
                    $("#customer_email").val('')
                    $("#customer_address_info").val('')
                    $("#customer_dob").val('')
                    $("#customer_cmt").val('')
                    $("#show-error-customer").append(
                        '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                        response.success + '</div></div></div>'
                    )
                    setTimeout(function() {
                        document.getElementById('show-error-customer').innerHTML = '';
                    }, 2000);
                    setTimeout(function() {
                        $("#themkh").modal('hide');
                    }, 1000);
                }
            }
        })
    })
    $("#find-customer-button").on('click', function(e) {
        e.preventDefault();
        var url = '{{ route('customer.seach') }}';
        $.ajax({
            url: url,
            method: 'GET',
            data: $('#find-customer').serialize(),
            success: function(response) {
                $("#current-customer").on('click', function(e) {
                    $('#show_customers').html('');
                    $('#customer_id').val('');
                })
                if (response.success) {
                    if (response.success.length === 0) {
                        $('#show_customers').html('');
                        $("#show_customers").append(`
                    <tr>
                        <td colspan="4" style="color:red; text-align:center">Không có khách hàng</td>
                    </tr>`);
                    } else {
                        $("#show_customers").append(`
                    <tr>
                        <td>` + response.success[0].customer_name + `</td>
                        <td>` + response.success[0].customer_cmt + `</td>
                        <td>` + response.success[0].customer_phone + `</td>
                        <td>` + response.success[0].customer_email + `</td>
                    </tr>`);
                    }
                    $('#customer_id').val(response.success[0].id)

                } else {
                    document.getElementById('show-booking-error').innerHTML = '';
                    $.each(response.error, function(key, value) {
                        $("#show-booking-error").append(
                            '<span style="color:red; padding-left:20px">' + value +
                            '</span><br>');
                    });
                }
            }
        })
    })
    $("#add_booking_button").click(function(e) {
        e.preventDefault();
        var url = '{{ route('booking.store') }}';

        $.ajax({
            url: url,
            method: 'POST',
            data: $('#add_booking_form').serialize(),
            statusCode: {
                422: function(response) {
                    $("#error-booking").html('');
                    $.each(response.responseJSON.errors, function(key, value) {
                        $("#error-booking").append(
                            '<span style="color:red; padding-left:20px">' + value +
                            '</span><br>');
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    $("#error-booking").append(
                        '<div id="toastsContainerTopRight" class="toasts-top-right fixed"><div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header"><strong class="mr-auto">Thông báo</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div><div class="toast-body">' +
                        response.success + '</div></div></div>'
                    )
                    setTimeout(function() {
                        document.getElementById('error-booking').innerHTML = '';
                    }, 2000);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    });
    $("#add_selling_button").click(function(e) {
        e.preventDefault();
        var url = '{{ route('selling.store') }}';
        $.ajax({
            url: url,
            method: 'POST',
            data: $('#selling_form').serialize(),
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
                        $("##error_selling_display").html('');
                    }, 2000);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    });
    var days = 0;
    $(".booking_time").on('change', function() {
        day = $(".booking_time").val();
        var day_range = day.split(' - ');
        var start = new Date(day_range[0]);
        var end = new Date(day_range[1]);
        diff = new Date(end - start);
        days = diff / 1000 / 60 / 60 / 24;
    })
    $(document.body).on("change", "#booking_room", function() {
        var room_id = this.value;
        var url = '{{ route('room.index') }}' + '/' + room_id;
        $.ajax({
            url: url,
            method: 'GET',
            data: room_id,
            success: function(response) {
                if (response.success) {
                    $("#booking_money").val(days * response.success);
                }
            }
        })
    });
    $(document).ready(function() {

        $('.display-customer').on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            var url = "customer-list?page=" + page;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    $(".display-customer").html('')
                    $(".display-customer").html(data);
                }
            });
        }

    });
    $(document).ready(function() {

        $('.display-booking').on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            paginateBooking(page);
        });

        function paginateBooking(page) {
            var url = "booking-list?page=" + page;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    $(".display-booking").html('')
                    $(".display-booking").html(data);
                }
            });
        }

    });
</script>
@endsection
