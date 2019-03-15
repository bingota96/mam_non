<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<base href="{{asset('')}}">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Page Title</title>
		<link href="autocss/app.css" rel="stylesheet">	
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css" >
	</head>
	<style>
	li {
	    display: inline-table;
	}
	.form-control,.btn ,body{
		font-size: 1.5rem;
	}
	h3 {
	    font-size: 2.5rem;
	}
	.panel-heading {
	    text-align: center;
	}	
	.panel-body {
	    padding: 15px;
	}
	.col-md-8.col-md-offset-2 {
	    margin-top: 20px;
	}
	input.form-control {
    width: 80%;
    margin-top: 15px;
	}
	label.col-md-4.control-label {
	    margin-top: 15px;
	}
	button.btn.btn-primary {
    margin-top: 15px;
	}

</style>
	<body>
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

						@include('pages-message.form-submit')

						<form class="form-horizontal" role="form" method="post" action="">
							@csrf

							<div class="form-group">
								<label class="col-md-4 control-label">Tên trường</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name_school" value="">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<label class="col-md-4 control-label">Hiệu Trưởng</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="principal">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<label class="col-md-4 control-label">Địa chỉ</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="address">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<label class="col-md-4 control-label">Email đăng nhập</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="email">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<label class="col-md-4 control-label">Mật Khẩu</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<label class="col-md-4 control-label">Nhập lại mật khẩu</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="enter-password">
								</div>
							</div><!-- form-group !-->

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									 <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >
								          Đăng kí
								     </button>
								</div>
							</div><!-- form-group !-->

							@include('admin.button-model')

						</form>
					</div><!-- panel-body -->
				</div><!-- panel panel-default -->
			</div><!-- col-md-8 col-md-offset-2 -->
		</div><!-- row -->
	</div><!-- container-fluid -->
	</body>
</html>