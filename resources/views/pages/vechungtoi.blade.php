@extends('index')

@section('content')

			<!--You're here-->
            <div class="youre-here">
                <a href="#">Trang chủ</a>
                <p>&nbsp<&nbsp</p>
                <a href="#">{{ $vct_news->title }}</a>
            </div>
            <!--Sidebar Product-->
            <div class="left-sidebar-about">
                <ul>
                    <li>
                        <a href="{{ route('gioithieu') }}">Giới thiệu</a>
                        <a href="{{ route('tuyendung') }}">Tuyển dụng</a>
                        <a href="{{ route('caccuahang') }}">Các cửa hàng</a>
                        <a href="{{ route('lienhe') }}">Liên hệ</a>
                    </li>
                </ul>                
            </div>

            <!--   Contents  -->
            <div class="content-page">
                <h5>{{ $vct_news->title }}</h5>
                <p>{!! $vct_news->content !!}<p>
            </div>
@endsection