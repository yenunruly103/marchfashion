@extends('admin.layout.index')

@section('content')
	
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài đăng
                            <small>Viết bài đăng</small>
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

                    @if(session('alert-danger'))
                        <div class="alert alert-danger">
                            {{session('alert-danger')}}
                        </div>
                    @endif

                    <form action="{{ asset('admin/news/add') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="title" placeholder="Nhập tiêu đề" />
                        </div>
                        
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea name="description" class="form-control" row="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="demo" class="form-control ckeditor" row="3"></textarea>
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