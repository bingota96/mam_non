@extends('dashbroad.master-layout')

@section('title','Dashbroad')

@section('content')
	<style>
	.card-header
	{
		padding: 0px;
	}
	h3 {
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.btn-circle.btn-xl {    
	width: 70px;    
	height: 70px;   
	padding: 10px 16px; 
	font-size: 24px;    
	line-height: 1.33;  
	border-radius: 35px ;
	background: yellow;
	border: 2px solid black;
	}
		.btn-circle.btn-xlb {    
	width: 70px;    
	height: 70px;   
	padding: 10px 16px; 
	font-size: 24px;    
	line-height: 1.33;  
	border-radius: 35px;
	background: blue;
	color:white;
	border: 2px solid black;
	}
	.btn-circle.btn-xlg {    
	width: 70px;    
	height: 70px;   
	padding: 10px 16px; 
	font-size: 24px;    
	line-height: 1.33;  
	border-radius: 35px;
	background: green;
	color:white;
	border: 2px solid black;
	}
.col {
   /* display: grid;*/
    text-align: center;
    margin-top: 20px; 
}
	span.name {
	    display: table-cell;
	}
	h3.modal-title {
	    font-size: 1.5rem;
	}
div {margin: auto;}
	</style>	 
		<div class="container-fluid">
			<h3>Giáo Viên</h3>
		<div class="container">		
			<div class="row">
				<div class="col">Chính thức
					<br><br>					
					<button class="btn btn-default btn-circle btn-xl">{{$chinhthuc}}</span>
				</div>				
				<div class="col">Thời vụ
					<br><br>
					<button class="btn btn-default btn-circle btn-xl">{{$thoivu}}</button></div>
				<div class="col">Thử việc
					<br><br>
					<button class="btn btn-default btn-circle btn-xl">{{$thuviec}}</button></div>
				<div class="col">Part-time
					<br><br>
					<button class="btn btn-default btn-circle btn-xl">{{$partime}}</button></div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- container-fluid -->

		<div class="container-fluid">
			<h3>Lớp học</h3>
		<div class="container">		
			<div class="row">
				<div class="col">2 tuổi
					<br><br>
					<button class="btn btn-default btn-circle btn-xlg">{{$tow}}</button>
				</div>
				<div class="col">3 tuổi
					<br><br>
					<button class="btn btn-default btn-circle btn-xlg">{{$three}}</button>
				</div>
				<div class="col">4 tuổi
					<br><br>
					<button class="btn btn-default btn-circle btn-xlg">{{$four}}</button></div>
				<div class="col">5 tuổi
					<br><br>
					<button class="btn btn-default btn-circle btn-xlg">{{$five}}</button></div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- container-fluid -->

		<div class="container-fluid">
			<h3>Học Sinh</h3>
		<div class="container">		
			<div class="row">
				<div class="col">Lớp 2 tuổi
					<br><br>
					<button class="btn btn-default btn-circle btn-xlb">{{$people2}}</button>
				</div>
				<div class="col">Lớp 3 tuổi
				<br><br>
					<button class="btn btn-default btn-circle btn-xlb">{{$people3}}</button></div>
				<div class="col">Lớp 4 tuổi
					<br><br>
					<button class="btn btn-default btn-circle btn-xlb">{{$people4}}</button>
				</div>
				<div class="col">Lớp 5 tuổi
					<br><br>
					<button class="btn btn-default btn-circle btn-xlb">{{$people5}}</button>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- container-fluid -->


	<div class="card text-center">
	  <div class="card-header">
	    footer
	  </div>
 @endsection

