@extends('admin.layout.index')

@section('content')
	
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Chỉnh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        @if(count($errors) > 0)
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

                        <form action="{{ asset("admin/product/edit/$product->id") }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" placeholder="" value=" {{ $product->name }}" />
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control" name="cates_id">
                                    @foreach($catelist as $item)
                                        <option 
                                        @if($product->cates_id == $item->id)
                                            {{"selected"}}
                                        @endif
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Đơn giá</label>
                                <input class="form-control" name="price" placeholder="" value="{{ $product->price }}" />
                            </div>
                            <div class="form-group">
                                <label>Giảm giá</label>
                                <input class="form-control" name="discount" placeholder="" value="{{ $product->discount }}" />
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <input class="form-control" name="size" placeholder="" value="{{ $product->size }}" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <p>
                                <img src="{{ asset("uploads/products/$product->thumbnail")}}">
                                </p>
                                <input type="file" name="thumbnail">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <label class="radio-inline">
                                    <input name="status" value="1" 
                                    @if($product->status == 1)
                                        {{"checked"}}
                                    @endif
                                    type="radio">Còn hàng
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="2" 
                                    @if($product->status == 2)
                                        {{"checked"}}
                                    @endif
                                    type="radio">Hết hàng
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
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