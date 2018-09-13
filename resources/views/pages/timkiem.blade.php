@extends('index')

@section('content')          

            <!--   Contents  -->
            <div class="content">

                <h4 style="font-weight: bold; font-size: 24px; margin-bottom: 50px;" >Có {{ $num_result }} kết quả tìm kiếm với từ khóa &ldquo;{{ $search_key }}&rdquo;</h4>
                <!--  SPM -->
                <div class="four-cols-img">

                    @foreach($product as $key => $item)

                        @if(($key+1) %4 == 0)
                            <div class="fourcols-cont-last">
                                <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><img src="{{ url('uploads/products/'.$item->thumbnail) }}" alt="Hình ảnh" width="240" height="355"/></a>
                                <a href="{{ asset("sanpham/$item->id/$item->unsigned_name") }}"><p class="itemid">{{ $item->id }}</p></a>
                                <p class="itemprice">{{ $item->price }}</p>
                            </div>
                        @else
                            <div class="fourcols-cont">
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