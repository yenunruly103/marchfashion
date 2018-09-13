@extends('index')

@section('content')

			<!--You're here-->
            <div class="youre-here">
                <a href="{{ route('trangchu') }}">Trang chủ</a>
                <p>&nbsp<&nbsp</p>
                <a href="{{ route('ao') }}">Sản phẩm</a>
                <p>&nbsp<&nbsp</p>
                <p>{{ $cate->name }}</p>
            </div>
            <!--Sidebar Product-->
            <div class="left-sidebar-pr">
                <ul>
                    <li>
                        <a style="padding-left: 28px;" href="{{ route('ao') }}">Áo</a>
                        <a style="padding-left: 40px;" href="{{ route('vay') }}">Váy</a>
                        <a style="padding-left: 52px;" href="{{ route('quan') }}">Quần</a>
                        <a style="padding-left: 68px;" href="{{ route('phukien') }}">Phụ kiện</a>
                    </li>
                </ul>                
            </div>

            <!--   Contents  -->
            <div class="content-page">

                @foreach($product as $key => $item)

                    @if(($key+1)%3 == 0)
                        <div class="three-cols-img-last">
                            <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="240" height="355"/></a>
                            <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="itemid">{{ $item->id }}</p></a>
                            <p class="itemprice">{{ $item->price }} VNĐ</p>
                        </div>
                    @else
                        <div class="three-cols-img">
                            <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="240" height="355"/></a>
                            <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="itemid">{{ $item->id }}</p></a>
                            <p class="itemprice">{{ $item->price }} VNĐ</p>
                        </div>
                    @endif

                @endforeach
            </div>

            {{ $product->links() }}
@endsection