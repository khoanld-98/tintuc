@extends('layout.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">thể loại
                            <small>{{ $theloai->Ten }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/theloai/sua/{{ $theloai->id}}" method="POST">
                            <!-- in ra lỗi -->
                           @if(count($errors)>0)
                            <div class='alert alert-danger'>
                                @foreach($errors->all() as $err)
                                    {{ $err }}<br>
                                @endforeach
                            </div>
                           @endif
                           <!-- in ra thông báo sửa thành công -->
                           @if(session('thongbao'))
                               <div class='alert alert-success'>
                                   {{ session('thongbao') }}
                               </div>
                           @endif
                            <div class="form-group">
                                <label>tên thể loại</label>
                                {{ csrf_field() }}
                                <input class="form-control" name="Ten" placeholder="nhập tên mà bạn muốn sửa" value="{{ $theloai->Ten }}" />
                            </div>
                            <button type="submit" class="btn btn-default">sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection