@extends('admin.layout.index')

@section('content')
	
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <table class="table table-striped table-bordered table-hover">
                        <thead 
                        style="text-align:center; background: black; color: white; font-size: 120%;"
                        >
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên KH</th>
                                <th>SĐT</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_list as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                {!! $order_list->links() !!}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection