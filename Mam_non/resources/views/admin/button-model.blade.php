<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>@yield('title')</title>
<!--       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
   </head>
   <body>
<style type="text/css">
	h3.modal-title {
	    padding-left: 50px;
	}
	p{
		text-align: center;
	}
	.modal-header{
		border-bottom: 1px solid #1e2429;
	}
	.modal-footer {
		border-top: 1px solid #1e2429;
	}	
</style>	
@yield('content')
      <!-- Button to Open the Modal -->
<!--       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
           Open modal
      </button> -->
 
      <!-- The Modal -->     
   </body>
   
</html>