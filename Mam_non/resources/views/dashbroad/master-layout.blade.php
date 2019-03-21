<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<base href="{{asset('')}}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name ="csrf-token" content="{{ csrf_token() }}">
		<title> @yield('title') </title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css">
	</head>
	<body>
	<body>
	<style>
	p{
		font-weight: normal;
		color: black;
	}
	a.nav-link.col-2 {
    margin: auto;
}
.infor {margin-top: 15px;}
.card-header{
	padding: 0px;
}
.container-fluid {
    margin-bottom: 20px;
}
.card.text-center {
	background: red;
    height: 25px;
    margin-top: 50px;
}
</style>
<div class="container-fluid card card-header col-1-12|auto" >	
	  	<h5 class="">	
			<nav class="nav">
			  <a href ="{{route('dashbroad')}}" class="nav-link active col-4|auto">{{$user->name_school}}<p>{{$user->address}}</p></a>  
			  <a class="nav-link col-2" href="{{route('Teacher')}}">Giáo viên</a>
			  <a class="nav-link col-2" href="{{route('Class')}}">Lớp học</a>
			  <a class="nav-link col-2" href="#" data-toggle="modal" data-target="#myModal">Thông tin</a>
			  <a class="nav-link disabled col-2" href="{{route('logout')}}">Thoát</a>
			</nav><!-- nav -->
		</h5><!-- car-header -->
</div>
@yield('content')

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="bootstrap-4.0.0/js/jquery-3.3.1.min.js" ></script>
		<script src="bootstrap-4.0.0/js/popper.min.js" ></script>
		<script src="bootstrap-4.0.0/js/bootstrap.min.js" ></script>

		 <div class="modal" id="myModal">
         <div class="modal-dialog ">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h3 class="modal-title">Thông tin trường</h3>
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
               </div>
               <!-- Modal body -->
               <div class="modal-body">
				<div class="infor">	             
					<span class="name"style="padding-right: 20px;">Tên Trường</span>
					<span class="name" style="font-weight: bold;">{{$user->name_school}}</span>
				</div>

				<div class="infor">	             
					<span class="name"style="padding-right: 54px;">Địa chỉ</span>
					<span class="name" style="font-weight: bold;">{{$user->address}}</span>
				</div>

				<div class="infor">	             
					<span class="name"style="padding-right: 36px;">Hiệu Trưởng</span>
					<span class="name" style="font-weight: bold;">{{$user->principal}}</span>
				</div>

				<div class="infor">	             
					<span class="name"style="padding-right: 73px;">Giáo viên</span>
					<span class="name" style="font-weight: bold;">
					@if(isset($sameteacher))
						{{{$sameteacher}}}
						@else{{'Chưa có giáo viên'}}						
					@endif
				</span>
				</div>

				<div class="infor">	             
					<span class="name"style="padding-right: 73px;">Lớp</span>
					<span class="name" style="font-weight: bold;">					
						@if(isset($sameClass))
						{{{$sameClass}}}
						@else{{'Chưa có lớp'}}						
					@endif</span>
				</div>

				<div class="infor">	             
					<span class="name"style="padding-right: 37px;">Học Sinh</span>
					<span class="name" style="font-weight: bold;">					
						@if(isset($totalStu))
						{{{$totalStu}}}
						@else{{'Chưa có học sinh'}}						
					@endif</span>
				</div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
               </div>
            </div>
         </div>
      </div>
	</body>
	<script type="text/javascript">

</script>
</html>