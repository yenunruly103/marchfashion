<nav>
    <ul>
        <li>
            <a href="{{ route('ao') }}" class="amenu">SẢN PHẨM</a>
            <div class="dropdown">
                <a href="{{ route('sanphammoi') }}" class="adrop">Mới</a>
                <a href="{{ route('sanphamnoibat') }}" class="adrop">Nổi bật</a>
                <a href="{{ route('ao') }}" class="adrop">Áo</a>
                <a href="{{ route('vay') }}" class="adrop">Váy</a>
                <a href="{{ route('quan') }}" class="adrop">Quần</a>
                <a href="{{ route('phukien') }}" class="adrop">Phụ kiện</a>
            </div>
        </li>
        <li><a href="{{ route('xuhuong') }}" class="amenu">XU HƯỚNG</a></li>
        <li>
            <a href="{{ route('gioithieu') }}" class="amenu">VỀ CHÚNG TÔI</a>
            <div class="dropdown">
                <a href="{{ route('gioithieu') }}" class="adrop">Giới thiệu</a>
                <a href="{{ route('tuyendung') }}" class="adrop">Tuyển dụng</a>
                <a href="{{ route('caccuahang') }}" class="adrop">Các cửa hàng</a>
                <a href="{{ route('lienhe') }}" class="adrop">Liên hệ</a>
            </div>
        </li>
    </ul>
</nav>