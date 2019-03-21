@extends('dashbroad.master-layout')

@section('title','Create teacher')

@section('content')
<style type="text/css">

	input#inputEmail3 {
    width: 300px;
}
	#inputNumber1 {
    width: 200px;
}
	#inputNumber {
    width: 200px;
 }   
	#inputNumber2 {
    width: 100px;
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
.col-sm-offset-2.col-sm-10 {
    text-align: center;
}
label#image {
    padding-top: 30px;
}
</style>

<div class="container-fluid">
			<h3>Sửa Giáo Viên</h3>
	<div class="container">
		<div class="row">

			<div class="col-sm|md|lg|xl-1-12">
				<form method="post" action="">
					@csrf

					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-5 form-control-label">Tên giáo viên (*)</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputEmail3" name="teacher" value="{{$teacher}}" >
						</div><!-- col-sm-7 -->
					</div><!-- form-group row -->

					@if( $errors->has('teacher') )
						<p style ="color:red;">{{$errors->first('teacher')}}</p>

					@endif
					
					<div class="form-group row">

						<label for="inputEmai2" class="col-sm-5 form-control-label" >Năm Sinh (*)</label>

						<div class="col-sm-7">
							<select type="number" class="form-control" id="inputNumber2" name="born">
									<option>{{$born}}</option>							
								@for( $i=1980; $i <= 2000 ; $i++)
									<option>{{$i}}</option>
								@endfor		
								
							</select>
						</div><!-- col-sm-7 -->
					</div><!-- form-group row -->

					@if( $errors->has('born') )
						<p style ="color:red;">{{$errors->first('born')}}</p>

					@endif		

					<div class="form-group row">
						<label for="inputEmail" class="col-sm-5 form-control-label">Lớp</label>
						<div class="col-sm-5">
							<select type="number" class="form-control" id="inputNumber1" name="class">
							<option> {{$class}}</option>	
								@foreach($name_class as $ten_lop_hoc)
							<option> {{$ten_lop_hoc -> class}}</option>							
							@endforeach

							</select>
						</div><!-- col-sm-7 -->
					</div><!-- form-group row -->

					@if( $errors->has('class') )
						<p style ="color:red;">{{$errors->first('class')}}</p>

					@endif	

					<div class="form-group row">
						<label for="inputEmail" class="col-sm-5 form-control-label">Loại (*)</label>
						<div class="col-sm-5">
							<select type="text" class="form-control" id="inputNumber" name="position">
								<option> {{$position}} </option>
								<option> Chính thức </option>
								<option> Thử việc </option>
								<option> Thời vụ </option>								
								<option> Part time</option>
							</select>
						</div><!-- col-sm-7 -->
					</div><!-- form-group row -->

					<div class="form-group row">
						<label class="col-sm-5 form-control-label" id="image"> Ảnh đại diện </label>
						<div class="col-sm-3">
	
							<input type="image" id="avatar" style="float:right;" src="image/icons8-person-female-100.png" alt="avatar">
<!-- 
							        <input type="file" id="uploadFile" name="filesImage" required="true">
							        <br/>
							        <input type="submit" value="upload"> -->

						</div><!-- col-sm-7 -->
					</div><!-- form-group row -->
					<div class="form-group row">

						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-secondary">Tạo mới</button>
						</div><!-- col-sm-offset-2 col-sm-10 -->
					</div><!-- form-group row -->
				</form>
			</div><!-- col-sm|md|lg|xl-1-12 -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- container-fluid -->
@endsection