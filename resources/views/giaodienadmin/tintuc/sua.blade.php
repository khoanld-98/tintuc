@extends('layout.index')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">sửa tin tức:
                            <small>{{ $tintuc->TieuDe }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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

                        <form action="admin/tintuc/sua/{{ $tintuc->id}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                             <div class="form-group">
                                <label>thể loại</label>
                                <select id='IDtheloai' class="form-control" name='theloai'>
                                    @foreach($theloai as $tl)
                                    <option  
                                        @if($tintuc->loaitin->theloai->id == $tl->id)
                                            {{ "selected" }}
                                        @endif
                                    value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                                   @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>loại tin</label>
                                <select  id='IDloaitin' class="form-control" name='loaitin'>
                                    @foreach($loaitin as $lt)
                                    <option 
                                         @if($tintuc->loaitin->id==$lt->id)
                                            {{ "selected"}}
                                        @endif
                                     value="{{ $lt->idTheLoai }}">{{ $lt->Ten }}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="tieude" placeholder="nhập tiêu đề" value="{{ $tintuc->TieuDe }}" />
                            </div>
                          
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea id='demo' class="form-control ckeditor" name=tomtat rows="2" >{{ $tintuc->TomTat }}</textarea>
                     
                            </div>
                              <div class="form-group">
                                <label>nội dung</label>
                                <textarea id='demo' class="form-control ckeditor" name='noidung' rows="5" 
                                >{{ $tintuc->NoiDung }}</textarea>
                     
                            </div>
                              <div class="form-group">
                                <label>hình ảnh</label>
                                <<img src="upload/images/tin-tuc/{{ $tintuc->Hinh }}" width="40px" height="50px" alt="">
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

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">comment
                           
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên user</th>
                                <th>Nội Dung</th>
                                <th>date</th>
                                <th>Delete</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc->comment as $cm)
                            <tr class="even gradeC" align="center">

                                <td>{{ $cm->id }}</td>
                                <td>{{ $cm->user->name }}</td>
                                <td>{{ $cm->NoiDung }}</td>
                                <td>{{ $cm->created_at }}</td>
                            
                            
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{ $cm->id }}"> xóa </a></td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <!-- /.container-fluid -->
    </div>
@endsection