@extends('index')

@section('content')
			<!--You're here-->
            <div class="youre-here">
                <a href="{{ route('trangchu') }}">Trang chủ</a>
                <p>&nbsp<&nbsp</p>
                <a href="{{ route('ao') }}">Sản phẩm</a>
                {{-- <p>&nbsp<&nbsp</p>
                <a href="#">{{ $cate->name }}</a> --}}
                <p>&nbsp<&nbsp</p>
                <p>{{ $product_detail->name }}</p>
            </div>
            <!--   Contents  -->
            <div>
                <div class="product-preview">
                    <img src="{{ url('uploads/products/'.$product_detail->thumbnail) }}" width="415px" alt="Hình ảnh" />
                </div>
                <div class="product-info">
                    <h5>Thông tin sản phẩm</h5>
                    <p>Tên sản phẩm: <b>{{ $product_detail->name }}</b></p>
                    <p>Mã sản phẩm: <b>{{ $product_detail->id }}</b></p>
                    <p>Giá: <b>{{ $product_detail->price }} VNĐ</b></p>
                    <p>Size: <b>{{ $product_detail->size }}</b></p>
	                <p>Tình trạng: 
	                    @if( $product_detail->status == 1)
	                    	<b>Còn hàng</b>
	                    @else
	                    	<b>Hết hàng</b>
	                    @endif
	                </p>
	                <!-- San pham lien quan-->
	                <p class="product-related-text">Các sản phẩm liên quan</p>

	                @foreach($product_related as $item)
	            		<div class="product-related">
	                        <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="168" height="256"/></a>
	                        <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="product-name">{{ $item->name }}</p></a>
	                    </div>
                    @endforeach
                </div>
            </div>
@endsection