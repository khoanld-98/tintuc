@extends('layout.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">user
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(count($errors)>0)
                    <div class='alert alert-danger'>
                        @foreach($errors->all() as $err)
                            {{ $err }}
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                    <div class='alert alert-success'>
                        {{ session('thongbao') }}
                    </div>
                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                          <form action="admin/user/sua/{{$user->id}}" method="POST">
                           {{ csrf_field() }}
                            <div class="form-group">
                                <label>tên user</label>
                                <input class="form-control" name="ten" value='{{$user->name }}' placeholder="nhập tên user" />
                            </div>
                            <div class="form-group">
                              
                                 <label>mật khẩu cũ</label>
                                 <input class="form-control" type="password" name="matkhaucu" placeholder="nhập mật khẩu" />
                                <label>mật khẩu mới</label>
                                <input class="form-control" type="password" name="matkhau" placeholder="nhập mật khẩu" />
                                 <label> nhập lại mật khẩu</label>
                                 <input class="form-control" type="password" name="matkhau1" placeholder="nhập lại mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input class="form-control" type="email" value='{{$user->email }}' name="email" placeholder="nhập email"  disabled="" />
                            </div>
                            
                            <div class="form-group">
                                <label>cấp quyền</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                        @if($user->quyen==1)
                                        {{ "checked" }}
                                        @endif
                                    type="radio">quản lý
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" 
                                     @if($user->quyen==0)
                                        {{ "checked" }}
                                        @endif
                                        type="radio">người dùng thường
                                </label>
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