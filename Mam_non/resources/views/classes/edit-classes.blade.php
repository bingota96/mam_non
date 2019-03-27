@extends('dashbroad.master-layout')

@section('title','Create Class')

@section('content')
<style type="text/css">

	input#inputEmail3 {
    width: 400px;
}
	#inputNumber1 {
    width: 150px;
}
	#inputNumber2 {
    width: 80px;
}
h3 {
    margin-top: 20px;
    margin-bottom: 30px;
}
.row {
    
    padding-left: 10%;
    padding-top: 10px;
    margin-top: 20px;
}
</style>
<div class="container-fluid">
			<h3>Sửa Lớp Học</h3>
	<div class="container">
		<div class="row">

			<div class="col-sm|md|lg|xl-1-12">
				<form method="post" action="">
					@csrf

					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-5 form-control-label">Tên Lớp Học (*)</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputEmail3" name="class" value="{{$class}}">
						</div><!-- col-sm-7 -->
					</div><!-- form-group row -->
					@if( $errors->has('class') )
						<p style ="color:red;">{{$errors->first('class')}}</p>

					@endif

					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-5 form-control-label">Độ tuổi (*)</label>
						<div class="col-sm-7">
							
							<select type="number" class="form-control" id="inputNumber1" name="age">
								<option>{{$age}}</option>		
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div><!-- col-sm-7 -->
					</div><!-- form-group row -->


					<div class="form-group row">

						<label for="inputPassword3" class="col-sm-5 form-control-label" >Số học sinh</label>

						<div class="col-sm-7">
							<select type="number" class="form-control" id="inputNumber2" name="number_student" >
								<option >{{$number_student}}</option>
								@for( $i=0; $i <= 200 ; $i++)

									<option >{{$i}}</option>
								@endfor		
								
							</select>
						</div><!-- col-sm-7 -->
					</div><!-- form-group row -->
					@if( $errors->has('number_student') )
						<p style ="color:red;">{{$errors->first('number_student')}}</p>

					@endif

					<div class="form-group row">

						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-secondary">Lưu</button>
						</div>
					</div><!-- form-group row -->
				</form>
			</div>
		</div>
	</div>
</div>

@endsection