@extends('index')

@section('content')

			<!--You're here-->
            <div class="youre-here">
                <a href="{{ route('trangchu') }}">Trang chủ</a>
                <p>&nbsp<&nbsp</p>
                <a href="{{ route('xuhuong') }}">Xu hướng</a>
            </div>

            <!--   Contents  -->
            <div class="content">
                <!--  Xu huong  -->
                @foreach($news as $key => $item)
                	@if($key==0 || $key%5 == 0)
                		<table class="three-row-first">
		                    <tr>
		                        <td><img src="{{ url('uploads/news/'.$item->image) }}" alt="Hình ảnh" width="240" height="140"/><td>
		                        <td><div class="three-row-news">
		                            <a href="{{ asset("xuhuong/$item->id/$item->unsigned_title") }}"><h4 class="title">{{ $item->title}}</h4></a>
		                            <p class="news-contents">{{ $item->description }}</p>
		                            <p class="timepost">{{ $item->created_at }}</p>
		                        </div></td>
		                    </tr>
		                </table>
                	@else
                		<table class="three-row">
		                    <tr>
		                        <td><img src="{{ url('uploads/news/'.$item->image) }}" alt="Hình ảnh" width="240px" height="140px"/><td>
		                        <td><div class="three-row-news">
		                            <a href="{{ asset("xuhuong/$item->id/$item->unsigned_title") }}"><h4 class="title">{{ $item->title}}</h4></a>
		                            <p class="news-contents">{{ $item->description }}</p>
		                            <p class="timepost">{{ $item->created_at }}</p>
		                        </div></td>
		                    </tr>
		                </table>
                	@endif
                @endforeach
                {{ $news->links()}}
                
            </div>
@endsection