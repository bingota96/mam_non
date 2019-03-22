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

				    <tr id="row{{ $giao_vien->id }}">
				      <td scope="row">{{ $giao_vien->teacher }}</td>
				      <td >
				      	<input type="image" src="image/{{ $giao_vien->filesImage}}" width="100" height="100" data-toggle="modal" data-target="#myModal" id="imageTeacher">
				      </td>
				      <td  >{{ $giao_vien->born}}</td>
				      <td >{{ $giao_vien->class}}</td>
				      <td >{{ $giao_vien->position}}</td>
				      <td>
				      	<div class="hinhanh" >

				      	<a href="{{route('editTeacher',$giao_vien->id)}}" ><input name="editTeacher" class="edit" type="image" src="image/icons8-edit-file-64.png" alt="Submit" width="30" height="30" />
				      	</a>

				      	<input data-id="row{{$giao_vien->id}}" data-url="{{route('destroyTeacher',$giao_vien->id)}}" class="destroy1" type="image" src="image/icons8-trash-80.png" alt="Submit" width="30" height="30">
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
<!-- form - modal -image	 -->
 <div class="modal" id="myModal">
         <div class="modal-dialog ">
            <div class="modal-content">
               <!-- Modal Header -->
<!--                <div class="modal-header">
                  <h3 class="modal-title">Xóa Giáo Viên</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div> -->
               <!-- Modal body -->
               <div class="modal-body">
	                <img  id="ac1" src="" width="300" height="300" >
               </div>
               <!-- Modal footer -->
<!--                <div class="modal-footer">
                  <button id="delete" type="button" class="btn btn-primary" data-dismiss="modal">Tiếp Tục</button>
				<button id="cancel" type="button" class="btn btn-primary" data-dismiss="modal">Hủy Bỏ</button>
               </div> -->
            </div>
         </div>
      </div>
<!--  form- model - delete -->

 <div class="modal" id="myModal1">
         <div class="modal-dialog ">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h3 class="modal-title">Xóa giáo viên</h3>
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
               </div>
               <!-- Modal body -->
               <div class="modal-body">
	                <p >Bạn muốn xóa giáo viên</p>
					<h2 class="teacher"> </h2>
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
	$(document).on('click','#imageTeacher',function(e){
		var attr =$(this).attr('src');
		$('#ac1').attr('src', attr);
		// console.log(attr);
	});

$(document).ready(function(){
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
				}
			});

	$(document).on('click','.destroy1',function(e){	
		e.preventDefault();
		var attr1 =$(this).parents('tr').find("th").html();
		$('.teacher').html(attr1);
		// console.log(attr1);
		// var a =$(this).parents("tr").remove();	
		$('#myModal1').modal('show');	
		var url = $(this).attr('data-url');
		$('#delete').attr('rowid', $(this).attr('data-id'));		
		var row = $('#delete').attr('rowid');
		$('#delete').on('click',function(e){		
			$.ajax({
				type:'post',
				url : url,
				success : function(data){
					  $('').parents("tr").remove();
						}
			});
		 
	});

		});	
});

</script>
@endsection