<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Model Example</title>
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
      <!-- Button to Open the Modal -->
<!--       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
           Open modal
      </button> -->
 
      <!-- The Modal -->
      <div class="modal" id="myModal">
         <div class="modal-dialog ">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h3 class="modal-title">Đăng ký trường</h3>
                  <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
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
      <script src="bootstrap-4.0.0/js/jquery-3.3.1.slim.min.js"></script>
      <script src="bootstrap-4.0.0/js/popper.min.js"></script>
      <script src="bootstrap-4.0.0/js/bootstrap.min.js"></script>
 <script type="text/javascript">
$('#myModal').on('hidden.bs.modal', function (e) {
   $(location).attr('href', '#')
});

</script>
   </body>
   
</html>