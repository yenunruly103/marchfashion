
{{-- <div id="header">
    <div id="banner">
        <div id="logo">
            <a href="{{ route('trangchu') }}"><img src="{{ asset('img/Logo.png') }}" alt=""/></a>
        </div>
        <form action="#" method="get" id="search">
            <input type="submit" name="submit" value="" id="submit_search"/>
            <input type="text" name="" value="Nhập để tìm kiếm..." id="text_search"/>
        </form>
        <div class="clear"></div>
    </div>
</div> --}}

            <div id="header">
                <div id="banner">
                    <div id="logo">
                        <a href="{{ route('trangchu') }}"><img src="img/Logo.png" alt=""/></a>
                    </div>
                    <form action="{{ route ('timkiem') }}" method="post" id="search">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" name="submit" value="" id="submit_search"></button>
                        <input type="text" name="searchkey" value="Tìm kiếm sản phẩm..." id="text_search"/>
                    </form>
                    <div class="cart-info">
                        <a href="#"><img src="img/cart-icon.jpg" alt="" width="29px" /></a>
                    </div>
                    <div class="account-menu">
                        <a href="#"><img src="img/setting-icon.jpg" alt="" width="26px" /></a>
                        <div class="dropdown">
                            @if(Auth::guest())
                                <a href="{{ asset('dangnhap') }}" class="adrop">Đăng nhập</a>
                                <a href="{{ asset('dangki') }}" class="adrop">Đăng kí</a>
                            @else
                                <a href="#" class="adrop">{{ Auth::user()->name }}</a>
                                <a href="#" class="adrop">Quản lý đơn hàng</a>
                                <a href="{{ asset('dangxuat') }}" class="adrop">Đăng xuất</a>
                            @endif
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>