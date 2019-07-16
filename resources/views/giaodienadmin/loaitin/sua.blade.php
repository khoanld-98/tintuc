@extends('layout.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">loại tin
                            <small>{{ $loaitin->Ten }}</small>
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
                        <div class='alert alert-success'>
                        {{ session('thongbao') }}
                    </div>
                    @endif
                        <form action="admin/loaitin/sua/{{$loaitin->id }}" method="POST">
                            <div class="form-group">
                                <select class="form-control" name='theloai'>
                                    @foreach($theloai as $tl) 
                                    <option
                                    @if( $loaitin->idTheLoai == $tl->id)
                                        {{ "selected" }}
                                    @endif
                                     value="{{ $tl->id }}">{{ $tl->Ten }}
                                 </option>

                                    @endforeach
                                </select>
                                <label>thay đổi tên loại tin</label>
                                 {{ csrf_field() }}
                                <input class="form-control" name="Ten" placeholder="nhập tên" value="{{ $loaitin->Ten }}" />
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