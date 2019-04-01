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

							<a href="{{ route('Class',['orderBy' => 'class','order' => isset($order) ? $order : 'desc'])}}">
								@if(isset( $order, $orderBy ) && $order == 'desc' &&  $orderBy == 'class')
								<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">
								@else
								<input type="image" style="float:right;" src="image/icons8-sort-up-24.png" alt="Submit" width="23" height="23">
								@endif

							</a>	

						</th>
						<th scope="col" class="age">Độ tuổi 

							<a href="{{ route('Class',['orderBy' => 'age','order' => isset($order) ? $order : 'desc'])}}">
								@if(isset( $order, $orderBy ) && $order == 'desc' &&  $orderBy == 'age')
								<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">
								@else
								<input type="image" style="float:right;" src="image/icons8-sort-up-24.png" alt="Submit" width="23" height="23">
								@endif

							</a>

						</th>
						<th scope="col" class="tech">Giáo viên

							<a href="{{ route('Class',['orderBy' => 'teacher_count','order' => isset($order) ? $order : 'desc'])}}">
								@if(isset( $order, $orderBy ) && $order == 'desc' &&  $orderBy == 'class')
								<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">
								@else
								<input type="image" style="float:right;" src="image/icons8-sort-up-24.png" alt="Submit" width="23" height="23">
								@endif

							</a>

						</th>

						<th scope="col" class="stu">Học sinh

							<a href="{{ route('Class',['orderBy' => 'name_student','order' => isset($order) ? $order : 'desc'])}}">
								@if(isset( $order, $orderBy ) && $order == 'desc' &&  $orderBy == 'name_student')
								<input type="image" style="float:right;" src="image/icons8-sort-down-24.png" alt="Submit" width="23" height="23">
								@else
								<input type="image" style="float:right;" src="image/icons8-sort-up-24.png" alt="Submit" width="23" height="23">
								@endif

							</a>

						</th>

						<th scope="col" class="acction">Hành động				 
						</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($class as $lop_hoc)

					<tr id ="{{ $lop_hoc->id }}">
						<th  scope="row">{{ $lop_hoc->class }}</th>
						<td >{{ $lop_hoc->age}}</td>

						<td>{{ $lop_hoc->teacher->count()  }}  </td>
						<td>{{ $lop_hoc->name_student}}</td>
						<td >
							<div class="hinhanh" >

								<a href="{{route('editClass',$lop_hoc->id)}}" ><input name="editClass" class="edit" type="image" src="image/icons8-edit-file-64.png" alt="Submit" width="30" height="30" value="{{$lop_hoc->id}}"/>
								</a>

								<input  class="destroy"  data-id="{{ $lop_hoc->id }}" data-url ="{{ route('destroyClass',$lop_hoc->id )}}" type="image" src="image/icons8-trash-80.png" alt="Submit" width="30" height="30" >
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
<!-- form-molde-delete -->	
 <div class="modal" id="myModal1">
	         <div class="modal-dialog ">
		            <div class="modal-content">
			               <!-- Modal Header -->
			               <div class="modal-header">
				                  <h3 class="modal-title">Xóa lớp học</h3>
				                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
			               </div>
			               <!-- Modal body -->
			               <div class="modal-body">
				                <p >Bạn muốn xóa lớp</p>
				<h2 class="class"> </h2>
			               </div>
			               <!-- Modal footer -->
			               <div class="modal-footer">
				                  <button id="delete" type="button" class="btn btn-primary" data-dismiss="modal">Tiếp Tục</button>
				<button id="cancel" type="button" class="btn btn-primary" data-dismiss="modal">Hủy Bỏ</button>
			               </div>
		            </div>
	         </div>
      </div>
<script src="bootstrap-4.0.0/js/jquery-3.3.1.slim.min.js" ></script>
<script src="bootstrap-4.0.0/js/popper.min.js" ></script>
<script src="bootstrap-4.0.0/js/bootstrap.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function () {	
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}                   
		});
		// var is_sending = false;
		$(document).on('click','.destroy',function(e){	
			e.preventDefault();

			// lấy tên lớp học chuyển vào modal
			var attr1 =$(this).parents('tr').find("th").html();
			$('.class').html(attr1);
			//
			//show modal
			$('#myModal1').modal('show');
			//	
			var url = $(this).attr('data-url');
			// gắn giá tri cho modal
			var attrDestroy = $(this).attr('data-id');
			$('#delete').attr('rowId',attrDestroy);
			var row = $('#delete').attr('rowId');	
		});

		$(document).on('click','#delete',function(e){	
			// e.preventDefault();	
			// if (is_sending) return false;	
			$.ajax({
				type:'post',
				url : url,
				// cache: false,
				// beforeSend: function () {
				// 	is_sending = true;
				// },
				// complete: function () {
				// 	is_sending = false;
				// },
				success : function(data){	  	
					$('tr#'+ row).remove();
					
				}
			});
		});
});
</script>
@endsection