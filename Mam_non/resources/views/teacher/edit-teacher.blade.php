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

    </ul>
	<div class="container">
		<div class="row">

			<div class="col-sm|md|lg|xl-1-12">
				<form method="post" action="" enctype="multipart/form-data">
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

							

							@foreach($name_class as $class )
								
							<option value="{{ $class->id }}"> {{ $class->class }}
							</option>

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
					@if( $errors->has('filesImage') )
						<p style ="color:red;">{{$errors->first('filesImage')}}</p>

					@endif
							<input type="image" id="avatar" style="float:right;" src="image/{{$filesImage}}" alt="avatar" width="100" height="100">

							        <input type="file" id="uploadFile" name="filesImage" onchange="loadFile(event)" hidden >
							      
						</div><!-- col-sm-7 -->
					</div><!-- form-group row -->
					<div class="form-group row">

						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-secondary">Lưu</button>
						</div><!-- col-sm-offset-2 col-sm-10 -->
					</div><!-- form-group row -->
				</form>
			</div><!-- col-sm|md|lg|xl-1-12 -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- container-fluid -->
		<script src="bootstrap-4.0.0/js/jquery-3.3.1.min.js" ></script>
		<script src="bootstrap-4.0.0/js/popper.min.js" ></script>
		<script src="bootstrap-4.0.0/js/bootstrap.min.js" ></script>
<script type="text/javascript">
		var loadFile = function(event) {
	    var output = document.getElementById('avatar');
	    output.src = URL.createObjectURL(event.target.files[0]);
	  	};
		$(document).on('click','#avatar',function(e){
			e.preventDefault();		
			$("input[id='uploadFile']").click();
			});
		
</script>
@endsection