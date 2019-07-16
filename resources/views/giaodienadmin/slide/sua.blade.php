@extends('layout.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">sửa slide
                            <small>{{ $slide->Ten }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                        @if(count($errors)>0)
                            @foreach($errors->all() as $err)
                                <div class='alert alert-danger'>
                                {{ $err }}
                            </div>
                            @endforeach
                        @endif
                        @if(session('thongbao'))
                        <div class='alert alert-success'>
                            {{ session('thongbao') }}
                        </div>
                        @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                         <form action="admin/slide/sua/{{$slide->id }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>tên</label>
                                <input class="form-control" name="ten" placeholder="{{ $slide->Ten }}" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <input class="form-control" name="noidung" placeholder="{{ $slide->NoiDung }}" />
                            </div>
                            <div class="form-group">
                                <label>link</label>
                                <input class="form-control" name="link" placeholder="{{ $slide->link }}" />
                            </div>
                            <div class="form-group">
                                <img src="upload/images/slide/{{ $slide->Hinh }}" alt="slide" width="300px" height="300px">
                                <input type="file" name="hinh">
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