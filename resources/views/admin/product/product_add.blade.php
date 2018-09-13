@extends('admin.layout.index')

@section('content')
	
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Thêm mới</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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

                        <form action="{{ asset('admin/product/add') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" placeholder="Nhập tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control" name="cates_id">
                                    <option value="0">Chọn loại sản phẩm</option>
                                    @foreach($catelist as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Đơn giá</label>
                                <input class="form-control" name="price" placeholder="Nhập đơn giá sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Giảm giá</label>
                                <input class="form-control" name="discount" placeholder="Nhập giảm giá nếu có" value="0" />
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <input class="form-control" name="size" placeholder="Nhập kích thước sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="thumbnail">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <label class="radio-inline">
                                    <input name="status" value="1" checked="" type="radio">Còn hàng
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="2" type="radio">Hết hàng
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection