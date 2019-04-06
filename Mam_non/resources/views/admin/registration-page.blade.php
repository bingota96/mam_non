<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name ="csrf-token" content="{{ csrf_token() }}">
		<title>Page Title</title>
		<link href="autocss/app.css" rel="stylesheet">	
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css" >
		<link rel="stylesheet" type="text/css" href="{{ asset('css1/register.css') }}">
	</head>
	<body>

	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
			<div class="container-fluid">

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<label>
						<h3>Đăng ký</h3> Trường Mầm Non
						</label>
					</div><!--panel-heading!-->
					<div class="panel-body">
        <div id="result">
            
        </div>						
						<form class="form-horizontal" role="form" method="post" action="">
							@csrf

							<div class="form-group">
								<label class="col-md-4 control-label">Tên trường</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name_school" id="name_school" value="">
								</div>
							</div><!-- form-group !-->
							
							<div class="form-group">
								<label class="col-md-4 control-label">Hiệu Trưởng</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="principal" id="principal">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<label class="col-md-4 control-label">Địa chỉ</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="address" id="address">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<label class="col-md-4 control-label">Email đăng nhập</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="email" id="email">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<label class="col-md-4 control-label">Mật Khẩu</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password" id="password">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<label class="col-md-4 control-label">Nhập lại mật khẩu</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="enter_password" id="enter_password">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									 <button type="submit" id="register" class="btn btn-primary"  data-url="route('dashbroad')">
								          Đăng kí
								     </button>
								</div>
							</div><!-- form-group !-->

<!-- form Create Post -->
<div class="modal" id="myModal">
         <div class="modal-dialog ">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h3 class="modal-title">Đăng ký trường</h3>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
	                <p>Đăng kí thành công!</p>
					<p>Cám ơn bạn đã đăng ký,quá trình đăng ký đã hoàn tất,vui lòng nhấp "Tiếp tục" </p>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Tiếp Tục</button>
               </div>
            </div>
         </div>
      </div>
						</form>
					</div><!-- panel-body -->
				</div><!-- panel panel-default -->
			</div><!-- col-md-8 col-md-offset-2 -->
		</div><!-- row -->
	</div><!-- container-fluid -->
	</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.0.0/js/popper.min.js"></script>
<script src="bootstrap-4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
				}
			});

			$(document).on('click','#register',function(e){
				 
				e.preventDefault();
					var _token = $("input[name='_token']").val();
					var	name_school = $('#name_school').val();
					var	principal = $('#principal').val();
					var	address = $('#address').val();
					var	email = $('#email').val();
					var	password = $('#password').val();
					var	enter_password = $('#enter_password').val();

				$.ajax({
					url: 'register',
					type: 'post',					
					data: {
						_token:_token,
						name_school: name_school,
						principal: principal,
						address: address,
						email: email,
						password: password,
						enter_password :enter_password,
					},
					success : function (data){

                    //     $('#result').html(data);
                    // }
						if($.isEmptyObject(data.error)){
							$('#myModal').modal('show');
							$('#myModal').on('hidden.bs.modal', function (e) {
						   		$(location).attr('href', 'login')
							});
						}
		                else{
		                	printErrorMsg(data.error);
		                }
                    }
				});
							
		function printErrorMsg (msg) {
			$(".print-error-msg").find("ul").html('');
			$(".print-error-msg").css('display','block');
			$.each( msg, function( key, value ) {
				$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
			});
		}
	});
});
</script>
</html>