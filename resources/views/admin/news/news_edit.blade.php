@extends('admin.layout.index')

@section('content')
	
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài đăng
                            <small>Chỉnh sửa bài đăng</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('alert-success'))
                        <div class="alert alert-success">
                            {{session('alert-success')}}
                        </div>
                    @endif

                    <form action="{{ asset("admin/news/edit/$news->id") }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="title" placeholder="" value="{{ $news->title }}" />
                        </div>
                        
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <p>
                            <img src="{{ asset("uploads/news/$news->image")}}">
                            </p>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea name="description" class="form-control" row="3">{{$news->description}}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="demo" class="form-control ckeditor" row="3">
                                {{$news->content}}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Lưu</button>
                        <button type="reset" class="btn btn-default">Hủy</button>
                    <form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection