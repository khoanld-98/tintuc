@extends('home.index')
@section('content')
<div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $tintuc->TieuDe }}</h1>

                <!-- Author -->
               

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/images/tin-tuc/{{ $tintuc->Hinh }}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> {{ $tintuc->created_at }}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                	{!! $tintuc->NoiDung !!}
                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(Auth::user())
                <div class="well">
                	@if(session('thongbao'))
                		<div class='alert-success'>
                			{{ session('thongbao') }}
                		</div>
                	@endif
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="comment/{{$tintuc->id }}" method="post" >
                        <div class="form-group">
                        	 {{ csrf_field() }}
                            <textarea name='noidung' class="form-control" rows="3"></textarea>
                        	}
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                @endif

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($tintuc->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="upload/images/user.png" alt="" width="64px" height="64px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>{{ $cm->created_at }}</small>
                       
                        </h4>
                      {{ $cm->NoiDung }}
                    </div>
                </div>
                @endforeach

             

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinlienquan as $tlq)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" src="upload/images/tin-tuc/{{ $tlq->Hinh }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{ $tlq->id }}/{{ $tlq->TieuDeKhongDau }}.html"><b>{{ $tlq->TieuDe }}</b></a>
                            </div>
                            <br>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach
                      
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinnoibat as $tnb)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{ $tnb->id }}/{{ $tnb->TieuDeKhongDau }}.html">
                                    <img class="img-responsive" src="upload/images/tin-tuc/{{ $tnb->Hinh }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{ $tnb->id }}/{{ $tnb->TieuDeKhongDau }}.html"><b>{{ $tnb->TieuDe }}</b></a>
                            </div>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
   						@endforeach
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
@endsection