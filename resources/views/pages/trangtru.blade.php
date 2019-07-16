@extends('home.index')
@section('content')
<div class="container">
@include('home.slide');
    	<!-- slider -->
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
       <!-- thê menu-->
          @include('home.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Tin Mới Nhất</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
	            		@foreach($theloai as $tl)
	            		@if(count($tl->loaitin)>0)
					    <div class="row-item row">
		                	<h3>
		                		<p>{{ $tl->Ten }}</p>| 	
		                		@foreach($tl->loaitin as $lt)
		                		<small><a href="loaitin/{{ $lt->id }}/{{ $lt->TenKhongDau }}.html"><i>{{ $lt->Ten }}</i></a>/</small>
		                		@endforeach
		                	</h3>
		                	<div class="col-md-8 border-right">
		                		<?php 
		                		$data =$tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
		                		$tin1=$data->shift();
		                		?>
		                		<div class="col-md-5">
			                        <a href="detail.html">
			                            <img class="img-responsive" src="upload/images/tin-tuc/{{ $tin1['Hinh'] }}" alt="">
			                        </a>
			                    </div>

			                    <div class="col-md-7">
			                        <h3>{{ $tin1->TieuDe }}</h3>
			                        <p>{{ $tin1->TomTat }}</p>
			                        <a class="btn btn-primary" href="tintuc/{{ $tin1->id }}/{{ $tin1['TieuDeKhongDau'] }}.html">chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>

		                	</div>
		                    

							<div class="col-md-4">
								@foreach($data as $tin)
								<a href="tintuc/{{ $tin->id }}/{{ $tin->TieuDeKhongDau }}.html">
									<h4>
										<span class="glyphicon glyphicon-list-alt"></span>
										{{ $tin->TieuDe }}
									</h4>
								</a>
								@endforeach
							</div>
							
							<div class="break"></div>
		                </div>
		                @endif
		                <!-- end item -->
		                @endforeach
		                <div class="fb-video" data-href="https://www.facebook.com/kawaibii/videos/1052429801634015/?t=11" data-width="500" data-show-text="true"></div>

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
 @endsection
