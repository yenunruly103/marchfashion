@extends('index')

@section('content')

			<!--You're here-->
            <div class="youre-here">
                <a href="{{ route('trangchu') }}">Trang chủ</a>
                <p>&nbsp>&nbsp</p>
                <a href="{{ route('xuhuong') }}">Xu hướng</a>
                <p>&nbsp>&nbsp</p>
                <p>{{ $news_detail->title}}</p>
            </div>

            <!--   Contents  -->
            <div class="content-xuhuong">
                <h4>{{ $news_detail->title}}</h4>
                <p class="time">Thời gian đăng: {{ $news_detail->created_at}}</p>
                <p>{!! $news_detail->content !!}<p>
            </div>
@endsection