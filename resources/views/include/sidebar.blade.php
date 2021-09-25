<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img id="avatar_user_field" src="{{ asset('images/12.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ $user->name }}</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('manage_money', 'manage_money')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Quản lí thu chi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('money-log.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sổ thu chi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('manage_room', 'manage_room')
                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Quản lí phòng
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('room.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sơ đồ phòng</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hóa đơn phòng</p>
                            </a>
                        </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('selling.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hóa đơn bán lẻ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('manage_product', 'manage_product')
                    <li class="nav-item">
                        <a href="{{ route('stock.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Quản lí hàng hóa
                            </p>
                        </a>
                    </li>
                @endcan
                @can('manage_category', 'manage_category')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Danh mục
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- @can('category_products') --}}
                            <li class="nav-item">
                                <a href="{{ route('products.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sản phẩm bán ra</p>
                                </a>
                            </li>
                            {{-- @endcan --}}
                            <li class="nav-item">
                                <a href="{{ route('type.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Giá phòng</p>
                                </a>
                            </li>
                            @can('manage_employee', 'manage_employee')
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách nhân viên</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Báo cáo
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Báo cáo doanh thu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sản phẩm bán chạy</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                    {{-- @can('manage_config_hotel', 'manage_config_hotel')
                        <li class="nav-item">
                            <a href="{{ route('home.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Cấu hình khách sạn
                                </p>
                            </a>
                        </li>
                    @endcan --}}
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
