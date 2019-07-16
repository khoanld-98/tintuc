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
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
					    
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>28B Điện Biên Phủ, Ba Đình, Hà Nội, Vietnam </p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>khoanld98@gmail.com </p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>123456789 </p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0310996476614!2d105.83837381492945!3d21.03144159306261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9801877057%3A0xcc81d20ff35b596d!2zMjhCIMSQaeG7h24gQmnDqm4gUGjhu6csIMSQaeG7h24gQsOgbiwgQmEgxJDDrG5oLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1555742348843!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

					</div>
	            </div>
        	</div>
         
        </div>
        <!-- /.row -->
    </div>
 @endsection
