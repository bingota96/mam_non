@extends('admin.button-model')

@section('title','Đăng kí')

@section('content')
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
@endsection