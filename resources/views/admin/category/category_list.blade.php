@extends('admin.layout.index')

@section('content')
	
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH MỤC
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
                        <thead style="text-align:center; background: black; color: white; font-size: 120%;">
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên danh mục</th>
                            </tr>
                        </thead>
                        <tbody style="background: white;">
                            
                            @foreach($list as $item)

                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection