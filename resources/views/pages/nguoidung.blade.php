@extends('home.index')
@section('content')
<div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
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
				    	<form action="nguoidung" method="post">
				    		<div>
				    			{{ csrf_field() }}
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" value="{{ Auth::user()->name }}" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" value="{{Auth::user()->email }}" name="email" aria-describedby="basic-addon1"
							  	disabled
							  	>
							</div>
							<br>	
							<div>
								
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password" id='ok' name="password" aria-describedby="basic-addon1" >
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" name="password1" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
  
@endsection