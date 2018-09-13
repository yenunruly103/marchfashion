@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài đăng
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

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead 
                style="text-align:center; background: black; color: white; font-size: 120%;"
                >
                    <tr align="center">
                        <th>Tiêu đề</th>
                        <th>Tóm tắt</th>
                        <th colspan="2 ">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ asset("admin/news/delete/$item->id") }}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ asset("admin/news/edit/$item->id") }}">Sửa</a></td>
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