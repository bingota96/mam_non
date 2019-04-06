@extends('dashbroad.master-layout')

@section('title','Dashbroad')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css1/dashbroad.css') }}">	 
		<div class="container-fluid">
			<h3>Giáo Viên</h3>
		<div class="container">		
			<div class="row">

				@foreach( $teacher->countTeachers() as $position )				
				<div class="col">{{ $position['position'] }}
					<br><br>
					<button class="btn btn-default btn-circle btn-xl">{{ $position['counter'] }}</span>
				</div>	
				@endforeach
									
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- container-fluid -->

		<div class="container-fluid">
			<h3>Lớp học</h3>
		<div class="container">		
			<div class="row">

			 @foreach( $ageCount as $age )
				<div class="col">tuổi {{ $age['age'] }}
					<br><br>
					<button class="btn btn-default btn-circle btn-xlg">{{ $age['age_count'] }}</button>
				</div>			 
			 @endforeach

			</div><!-- row -->
		</div><!-- container -->
	</div><!-- container-fluid -->

		<div class="container-fluid">
			<h3>Học Sinh</h3>
		<div class="container">		
			<div class="row">

			 @foreach( $ageSum as $age )
				<div class="col">Lớp {{ $age['age']}} tuổi
					<br><br>
					<button class="btn btn-default btn-circle btn-xlb">{{ $age['age_sum'] }}</button>
				</div> 
			 @endforeach				

			</div><!-- row -->
		</div><!-- container -->
	</div><!-- container-fluid -->


	<div class="card text-center">
	  <div class="card-header">
	    footer
	  </div>
 @endsection

