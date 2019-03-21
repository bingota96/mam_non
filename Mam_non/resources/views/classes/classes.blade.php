@extends('dashbroad.master-layout')

@section('titie','Danh sách lớp học')

@section('content')
<style type="text/css">
	table{
		border: 2px solid black;
	}
	th,td{
		border-left:  2px solid black;
	}

	button{
		margin-bottom: 20px;
	}
	.btn-toolbar.justify-content-between {
    margin-top: 40px;
}
.card-header{
	padding: 0px;
}
h3 {
    margin-top: 20px;
}
.flex{
	margin-top: 10px;
}
/*th.img {
    background: url(image/icons8-sort-down-26.png) no-repeat right 50%;
}*/
.hinhanh {
    margin-left: 15px;
}
input.edit {
    margin-right: 20px;
}
th.acction ,.tech ,.age,.stu{
	text-align: center;
    width: 13%;
}
td {
    text-align: center;
}
</style>
<div class="container-fluid">
			<h3>Danh Sách Lớp Học</h3>	
			<div class="container">		
		<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">

  <div class="btn-group" role="group" aria-label="First group">

  	{{ $class->links() }}
			
	</div>

  <div class="input-group">
   <a href="{{route('createClass')}}"><button type="button" class="btn btn-primary">Tạo Mới</button></a>
  </div><!-- input-group -->
</div>
<base href="{{asset('')}}">
		<div class="row">			
				<table class="table table-striped ">
				  <thead>
				    <tr>	
				      <th scope="col" class="img">Tên lớp học 
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">				      					      
				      </th>
				      <th scope="col" class="age">Độ tuổi 
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">	
				      </th>
				      <th scope="col" class="tech">Giáo viên
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">	
				      </th>
				      <th scope="col" class="stu">Học sinh
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">	
				      </th>
				      <th scope="col" class="acction">Hành động
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">				      	
				      </th>
				    </tr>
				  </thead>
				  <tbody>
				  	
   				@foreach ($class as $lop_hoc)

				    <tr>
				      <th scope="row">{{ $lop_hoc->class }}</th>
				      <td >{{ $lop_hoc->age}}</td>
				      <td>adasd</td>
				      <td>{{ $lop_hoc-> name_student}}</td>
				      <td >
				      	<div class="hinhanh" >

				      	<a href="{{route('editClass',$lop_hoc->id)}}" ><input name="editClass" class="edit" type="image" src="image/icons8-edit-file-64.png" alt="Submit" width="30" height="30" value="{{$lop_hoc->id}}"/>
				      	</a>

				      	<input  class="destroy1" data-url ="{{route('editClass',$lop_hoc->id)}}" type="image" src="image/icons8-trash-80.png" alt="Submit" width="30" height="30" value="{{$lop_hoc->id}}">
				      </div>
				      </td>
				    </tr>
 				@endforeach
				  </tbody>
				</table>
   

		<div class="flex">

		{{ $class->links() }}

		</div>
				</div>	
			</div>		
		</div>
	</div>
</div>	
		<script src="bootstrap-4.0.0/js/jquery-3.3.1.slim.min.js" ></script>
		<script src="bootstrap-4.0.0/js/popper.min.js" ></script>
		<script src="bootstrap-4.0.0/js/bootstrap.min.js" ></script>
<script type="text/javascript">
$("#btn_click").click(function () {	
	$.ajaxSetup({
		headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                        }                   
	                });
});
</script>
@endsection