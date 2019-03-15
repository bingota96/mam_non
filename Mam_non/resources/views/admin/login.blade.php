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
		<!-- <link rel="stylesheet" href="Bootstrap/bootstrap-4.3.1-dist/css/bootstrap.min.css" > -->
	</head>
	<style>
	.panel-heading {
	    text-align: center;
	}	
	.panel-body {
	    padding: 50px;
	}
	.col-md-8.col-md-offset-2 {
	    margin-top: 20px;
	}
	span {
	    display: flex;
	}
	a {
		font-size: 1.5rem;
	    margin-left: 5px;
	}
	p,body {
	    font-size: 1.5rem;
	}
	p {
    text-align: center;
    padding: 15px;
}
</style>
	<body>
			<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Đăng nhập</h3></div>
					<div class="panel-body">
						
						<form class="form-horizontal" role="form" method="POST" action="{{route('post.login')}}">
							@csrf

						@if($errors->has('errorlogin'))
						<p style="color:red">{{$errors->first('errorlogin')}}</p>
						@endif

							<div class="form-group">
								<label class="col-md-4 control-label">E-Mail </label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="email" value="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Mật Khẩu</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div>
										<span >
											Chưa có tài khoản ? <a href="{{route('register')}}">Đăng kí</a>
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">Đăng Nhập</button>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>