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
th.acction ,.stu, .img{
	text-align: center;
    width: 15%;
}
th.age{
	text-align: center;
    width: 10%;	
}
th.tech{
	text-align: center;
    width: 22%;	
}
td {
    text-align: center;
}
</style>
<div class="container-fluid">
			<h3>Danh Sách Giáo Viên</h3>	
			<div id="result">
				
			</div>
			<div class="container">		
		<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">

  <div class="btn-group" role="group" aria-label="First group">

  	{{ $teacher->links() }}
			
	</div>

  <div class="input-group">
   <a href="{{route('createTeacher')}}"><button type="button" class="btn btn-primary">Tạo Mới</button></a>
  </div><!-- input-group -->
</div>
<base href="{{asset('')}}">
		<div class="row">			
				<table class="table table-striped ">
				  <thead>
				    <tr>	
				      <th scope="col" class="teacher">Tên giáo viên 
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">	   				      
				      </th>

				      <th scope="col" class="img">Ảnh đại diện 
				      				      					      
				      </th>

				      <th scope="col" class="age">Tuổi 
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">	
				      </th>

				      <th scope="col" class="tech">Lớp
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">	
				      </th>

				      <th scope="col" class="stu">Loại
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">	
				      </th>

				      <th scope="col" class="acction">Hành động
				      	<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">				      	
				      </th>

				    </tr>
				  </thead>
				  <tbody>
				  	
   				@foreach ($teacher as $giao_vien)

				    <tr>
				      <th scope="row">{{ $giao_vien->teacher }}</th>
				      <td >{{ $giao_vien->filesImage}}</td>
				      <td >{{ $giao_vien->born}}</td>
				      <td >{{ $giao_vien->class}}</td>
				      <td >{{ $giao_vien->position}}</td>
				      <td>
				      	<div class="hinhanh" >

				      	<a href="{{route('editTeacher',$giao_vien->id)}}" ><input name="editTeacher" class="edit" type="image" src="image/icons8-edit-file-64.png" alt="Submit" width="30" height="30" />
				      	</a>

				      	<input  data-url="{{route('destroyTeacher',$giao_vien->id)}}" id="destroy1" type="image" src="image/icons8-trash-80.png" alt="Submit" width="30" height="30">
				      </div>
				      </td>
				    </tr>
 				@endforeach
				  </tbody> 	
				</table>
   

		<div class="flex">

		{{ $teacher->links() }}

		</div>
				</div>	
			</div>		
		</div>
	</div>
</div>
<!-- form - modal	 -->
 <div class="modal" id="myModal">
         <div class="modal-dialog ">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h3 class="modal-title">Xóa Giáo Viên</h3>
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
               </div>
               <!-- Modal body -->
               <div class="modal-body">
	                <p>Bạn có chắc muốn xóa giáo viên</p>
					<p></p>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button id="delete" type="button" class="btn btn-primary" data-dismiss="modal">Tiếp Tục</button>
				<button id="cancel" type="button" class="btn btn-primary" data-dismiss="modal">Hủy Bỏ</button>
               </div>
            </div>
         </div>
      </div>

		<script src="bootstrap-4.0.0/js/jquery-3.3.1.min.js" ></script>
		<script src="bootstrap-4.0.0/js/popper.min.js" ></script>
		<script src="bootstrap-4.0.0/js/bootstrap.min.js" ></script>
<script type="text/javascript">

$(document).ready(function(){
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
				}
			});

	$(document).on('click','#destroy1',function(e){	
		e.preventDefault();
		$('#myModal').modal('show');	
		var url = $(this).attr('data-url');
		$(document).on('click','#delete',function(){			
			$.ajax({
				type:'post',
				url : url,
				success : function(data){
					  	var a =$(this).parents("tr").remove();
						}
			});
		});	
		 // var a =$(this).parents("tr").remove();	
	});
});

</script>
@endsection