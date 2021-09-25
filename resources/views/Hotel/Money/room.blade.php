@extends('include.admin')
@section('title', 'Sổ thu chi')
@section('main')
    {{-- Modal Thủ Công --}}
    <div class="modal fade" id="xem-bill" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        {{--  --}}
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

</script>
@endsection
