@extends('layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">thể loại
                            <small>thêm thể loại</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class='alert alert-danger'>
                                @foreach($errors->all() as $err)
                                    {{ $err }}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                        <div class="alert alert-success">
                           {{ session('thongbao') }}
                        </div>
                        @endif
                        <form action="{{ Route('themtl') }}" method="POST">
                         
                            <div class="form-group">
                                <label>tên thể loại</label>
                                <input class="form-control" name="ten" placeholder="nhập tên thể loại" />
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default">thêm thể loại</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection