@extends('admin.layout.index')

@section('content')
	
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-7" style="">
                        @if(session('alert-success'))
                            <div class="alert alert-success">
                                {{session('alert-success')}}
                            </div>
                        @endif
                    </div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead 
                        style="text-align:center; background: black; color: white; font-size: 120%;"
                        >
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại</th>
                                <th>Đơn giá</th>
                                <th>Giảm giá</th>
                                <th>Size</th>
                                <th>Ảnh đại diện</th>
                                <th colspan="2 ">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @foreach($catelist as $cate)
                                        @if($item->cates_id == $cate->id)
                                            {{$cate->name}}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->discount }}</td>
                                <td>{{ $item->size }}</td>
                                <td>
                                    <img width="100px" src="{{ asset("uploads/products/$item->thumbnail") }}">
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ asset("admin/product/delete/$item->id") }}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ asset("admin/product/edit/$item->id") }}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                {!! $list->links() !!}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection