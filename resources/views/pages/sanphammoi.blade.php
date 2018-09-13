@extends('index')

@section('content')          

            <!--You're here-->
            <div class="youre-here">
                <a href="{{ route('trangchu') }}">Trang chủ</a>
                <p>&nbsp>&nbsp</p>
                <a href="{{ route('ao') }}">Sản phẩm</a>
                <p>&nbsp>&nbsp</p>
                <p>{{ $cate }}</p>
            </div>

            <!--   Contents  -->
            <div class="content">
                <!--  SPM -->
                <div class="four-cols-img">
                    @foreach($product as $key => $item)

                        @if(($key+1) %4 == 0)
                            <div class="fourcols-cont-last">
                                <img src="img/New_Icon.png" alt="" class="newicon"/>
                                <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="240" height="355"/></a>
                                <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="itemid">{{ $item->id }}</p></a>
                                <p class="itemprice">{{ $item->price }}</p>
                            </div>
                        @else
                            <div class="fourcols-cont">
                                <img src="img/New_Icon.png" alt="" class="newicon"/>
                                <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="240" height="355"/></a>
                                <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="itemid">{{ $item->id }}</p></a>
                                <p class="itemprice">{{ $item->price }}</p>
                            </div>
                        @endif

                     @endforeach
                    
                    {{ $product->links() }}

                </div>
            </div>
@endsection