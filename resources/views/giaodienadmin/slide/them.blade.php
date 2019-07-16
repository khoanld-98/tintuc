@extends('layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">slide
                            <small>thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(count($errors)>0)
                    <div class='alert alert-danger'>
                        @foreach($errors->all() as $er)
                            {{ $er }}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                        <div class='alert alert-success'>
                        {{ session('thongbao') }}
                    </div>
                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>tên</label>
                                <input class="form-control" name="ten" placeholder="nhập tên slide mà bạn muốn thêm" />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <input class="form-control" name="noidung" placeholder="nội dung" />
                            </div>
                            <div class="form-group">
                                <label>link</label>
                                <input class="form-control" name="link" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <input type="file" name="hinh">
                            </div>
                          
                            <button type="submit" class="btn btn-default">thêm</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection