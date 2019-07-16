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
                        <h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
                    </div>

                    <div class="panel-body">
                        <!-- item -->
                       <p>
                       <h1> LÊ Đắc Khoản B16DCAT087</h1>
                       học viện công nghệ bưu chính viễn thông  

                        
                       </p>
                       <div class='col-md-6'>
                       <div class="fb-page" data-href="https://www.facebook.com/G007-1229634433866552/?modal=admin_todo_tour" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/G007-1229634433866552/?modal=admin_todo_tour" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/G007-1229634433866552/?modal=admin_todo_tour">G.007</a></blockquote></div>
                     </div>
                        <div class='col-md-6'>
                       
                     </div>

                    </div>
                </div>
            </div>
         
        </div>
        <!-- /.row -->
    </div>
 @endsection