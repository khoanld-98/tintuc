@extends('layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">tin tức
                            <small>thêm tin tức</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <!--
                            enctype điều kiện để gửi lên hình ảnh
                            textarea sử dụng javascript đã có để tùy chỉnh chữ
                         -->
                         @if(count($errors)>0)
                            @foreach($errors->all() as $err)
                            <div class='alert alert-danger'>
                                {{ $err }}.<br>
                            </div>
                            @endforeach
                         @endif


                         @if(session('thongbao'))
                            <div class='alert alert-success'>
                            {{ session('thongbao') }}
                            </div>
                         @endif
                        <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                             <div class="form-group">
                                <label>thể loại</label>
                                <select id='IDtheloai' class="form-control" name='theloai'>
                                    @foreach($theloai as $tl)
                                    <option  value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                                   @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>loại tin</label>
                                <select  id='IDloaitin' class="form-control" name='loaitin'>
                                    
                                   
                                 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="tieude" placeholder="nhập tiêu đề" />
                            </div>
                          
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea id='demo' class="form-control " name=tomtat rows="2"></textarea>
                     
                            </div>
                              <div class="form-group">
                                <label>nội dung</label>
                                <textarea id='demo' class="form-control ckeditor" name='noidung' rows="5"></textarea>
                     
                            </div>
                              <div class="form-group">
                                <label>hình ảnh</label>
                                <input class="form-control" name="hinh" type="file" />
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="noibat" value="1" checked="" type="radio">có
                                </label>
                                <label class="radio-inline">
                                    <input name="noibat" value="0" type="radio">không
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
@section('Script')
    <script>
       
        $(document).ready(function() {
            // bắt sự kiện mà thay đổi giá trị ở trong thể loại
            // xử lý về chọn thể loai
           $("#IDtheloai").change(function(){
               /* Act on the event */
               var idtheloai = $(this).val();
               // truyền đường dẫn đến Route với ID đã được nhập
              $.get("admin/ajax/loaitin/"+idtheloai,function(data){
                //in ra các giá trị mà đã xử lý ở jaxcontroller
                
                 $('#IDloaitin').html(data);
              });
           });
           // xử lý về chọn loại tin
           
        });
     
    </script>
@endsection