<!-- Menu -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        {{-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li> --}}
                        <li>
                            <a href="{{ asset('admin/product') }}"><i class="fa fa-cube fa-fw"></i> Quản lý sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ asset('admin/product') }}">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{ asset('admin/product/add') }}">Thêm mới sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ asset('admin/category') }}"><i class="fa fa-th-list fa-fw"></i> Quản lý danh mục</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ asset('admin/order') }}"><i class="fa fa-paper-plane fa-fw"></i> Quản lý đơn hàng</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ asset('admin/news') }}"><i class="fa fa-newspaper-o fa-fw"></i> Quản lý bài đăng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ asset('admin/news') }}">Danh sách bài đăng</a>
                                </li>
                                <li>
                                    <a href="{{ asset('admin/news/add') }}">Viết bài đăng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ asset('admin/user') }}"><i class="fa fa-users fa-fw"></i> Quản lý user</a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>