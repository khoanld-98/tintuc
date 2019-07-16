<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tin tức cập nhật">
    <meta name="author" content="">
    <title>LÊ ĐẮC KHOẢN</title>
    <base href="{{ asset('') }}">
    <!-- Bootstrap Core CSS -->
    
    <link href="theme/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="theme/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="theme/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="theme/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="theme/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="theme/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="theme/ckeditor/ckeditor.js" ></script>
   
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">đăng nhập</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="admin/dangnhap" method="POST">
                            <fieldset>
                                {{ csrf_field() }}
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
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="theme/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="theme/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="theme/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="theme/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="theme/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
 

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    @yield('Script')
</body>

</html>