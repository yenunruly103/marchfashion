@extends('index')

@section('content')

<!--  SPM -->
<div>
    <a class="category" href="{{ route('sanphammoi') }}"><h4>SẢN PHẨM MỚI</h4></a>
    <div class="four-cols-img">

        @foreach ($new_product as $key => $item)

            @if ($key<3)
                <div class="fourcols-cont">
                    <img src="img/New_Icon.png" alt="" class="newicon"/>
                    <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="240" height="355"/></a>
                    <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="itemid">{{$item->id}}</p></a>
                    <p class="itemprice">{{$item->price}} VNĐ</p>
                </div>
            @else
                <div class="fourcols-cont-last">
                    <img src="img/New_Icon.png" alt="" class="newicon"/>
                    <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="240" height="355"/></a>
                    <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="itemid">{{$item->id}}</p></a>
                    <p class="itemprice">{{$item->price}} VNĐ</p>
                </div>
            @endif
        @endforeach
    </div>
    
</div>
<!-- SPNB -->
<div>
    <a class="category" href="{{ route('sanphamnoibat') }}"><h4>SẢN PHẨM NỔI BẬT</h4></a>
    <div class="four-cols-img">

        @foreach ($hot_product as $key => $item)

            @if ($key<3)
                <div class="fourcols-cont">
                    <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="240" height="355"/></a>
                    <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="itemid">{{ $item->id }}</p></a>
                    <p class="itemprice">{{ $item->price }}</p>
                </div>
            @else
                <div class="fourcols-cont-last">
                    <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="240" height="355"/></a>
                    <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="itemid">{{ $item->id }}</p></a>
                    <p class="itemprice">{{ $item->price }}</p>
                </div>
            @endif

        @endforeach
    </div>  
</div>
<!--  Xu huong  -->
<div style="background-color: #fafafa; margin-top: 10px; padding-top: 10px; ">
    <a class="category" href="{{ route('xuhuong') }}"><h4 style="margin: 10px 0;">XU HƯỚNG</h4></a>

    @foreach ($three_news as $key => $item)

            @if ($key == 0)
            <table class="three-row-first">
                <tr>
                    <td><img src="{{ url('uploads/news/'.$item->image) }}" alt="Hình ảnh" width="240" height="140"/><td>
                    <td><div class="three-row-news">
                        <a href="{{ asset("xuhuong/$item->id/$item->unsigned_title") }}"><h4 class="title">{{ $item->title }}</h4></a>
                        <p class="news-contents">{{ $item->description }}</p>
                        <p class="timepost">{{ $item->created_at }}</p>
                    </div></td>
                </tr>
            </table>
        @else
            <table class="three-row">
                <tr>
                    <td><img src="{{ url('uploads/news/'.$item->image) }}" alt="Hình ảnh" width="240" height="140"/><td>
                    <td><div class="three-row-news">
                        <a href="{{ asset("xuhuong/$item->id/$item->unsigned_title") }}"><h4 class="title">{{ $item->title }}</h4></a>
                        <p class="news-contents">{{ $item->description }}</p>
                        <p class="timepost">{{ $item->created_at }}</p>
                    </div></td>
                </tr>
            </table>
        @endif
    @endforeach

</div>
@endsection
