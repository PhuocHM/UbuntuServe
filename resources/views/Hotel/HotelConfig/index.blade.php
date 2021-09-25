@extends('include.admin')
@section('title', 'Tùy chỉnh khách sạn')
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
        <h1 class="display-4 text-center">Cấu hình khách sạn</h1>
    </div>
    <table>
        <tr>
            <th class="display-5">I. Tùy chỉnh chức vụ</th>
        </tr>
        <tr>
            <td></td>
            <th><b>1. </b>Chức vụ</th>
            <td style="width:500px;">
                <select name="product_name" id="product_name" class="select2 js-example-basic-single js-states form-control"
                    style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option disabled selected>Chọn chức vụ</option>
                    @foreach ($all_roles as $key => $value)
                        {{-- @if ($value->active == 0) --}}
                        <option value="{{ $value->id }}">{{ $value->role_name }}</option>
                        {{-- @endif --}}
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <th><b>2. </b>Danh sách quyền hạn</th>
            {{--  --}}
            {{-- <td style="width:340px;">
                <select name="product_name" id="product_name" class="select2 js-example-basic-single js-states form-control"
                    style="width:100%" data-select2-id="2" tabindex="-1" aria-hidden="true">
                    <option disabled selected>Chọn sản phẩm</option>
                    @foreach ($products as $key => $value)
                        @if ($value->active == 0)
                            <option value="{{ $value->id }}">{{ $value->product_name }}</option>
                        @endif
                    @endforeach
                </select>
            </td> --}}
            <td>
                <table>
                    <tbody id="display-permission">
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
