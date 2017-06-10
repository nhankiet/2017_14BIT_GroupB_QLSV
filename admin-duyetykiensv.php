<?php require("header.php"); ?>
<title>Tìm kiếm người dùng - Admin</title>
<link rel="stylesheet" href="css/style.css">


</head>




<body>
  <?php require("topnavbar.php") ?>
  <?php
  if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 1) )
    header("Location:index.php");
?>
  <hr><hr><hr>



  <div class="container">
    <div class="row">
      <div class="col-lg-12">

      <table class="table table-hover">
        <thead>
		  <th><label>Chọn loại yêu cầu</label></th>
      <th><label>Chọn loại trạng thái</label></th>
        </thead>


        <tbody>
          <tr>
			<td>
				<select class="input-lg" id="chonsel">
					<option>Mời chọn</option>
            <option value="Xin nghỉ học">Xin nghỉ học</option>
            <option value="Xin tạm hoãn học tập và bảo lưu kết quả">Xin tạm hoãn học tập và bảo lưu kết quả</option>
            <option value="Xin giấy xác nhận sinh viên">Xin giấy xác nhận sinh viên</option>
            <option value="Xin phúc khảo">Xin phúc khảo</option>
            <option value="Xin có ý kiến đóng góp">Xin có ý kiến đóng góp</option>
            <option value="Khác">Khác</option>
          </select>
				</optgroup>
				</select>
			</td>
      <!-- Nâng cấp thêm thanh search theo mssv gửi yêu cầu -->
    <!-- Nâng cấp thêm chức năng filter vs trạng thái duyệt và chưa duyệt <td>
				<select class="input-lg" id="chonsel1">
					<option>Mời chọn</option>
            <option value="1">Đã duyệt</option>
            <option value="0">Chưa duyệt</option>
          </select>
				</optgroup>
				</select>
			</td> -->
          </tr>

        </tbody>
      </table>
      <table class="table table-hover">
        <thead>
          <th><label>MSSV</label></th>
          <th><label>Loại yêu cầu</label></th>
		  <th><label>Ngày gửi - Thời gian</label></th>
          <th><label>Trạng thái</label></th>
          <th><label>Nội dung</label></th>
        </thead>

        <tbody id='landing'></tbody>

      </table>
    </div>
  </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chi tiết yêu cầu</h4>
      </div>
      <div class="modal-body">
        <script type="text/javascript">
         var MaYC=1;
          function getVal(value)
          {
            MaYC=value;
            $.post("admin-duyetykiensv2-ajax.php", { MaYC:MaYC }, function(data, status){
            if(status=="success")
            {
              $("#landing1").html(data);
            }
            });
          }
          function duyet(value)
          {
            var trangthai=value;
            $.post("admin-duyetykiensv3-ajax.php", { MaYC:MaYC, trangthai:trangthai }, function(data, status){
            if(status=="success")
            {
              if(trangthai==1)
                alert ('Duyệt thành công!');
              else {
                alert ('Hủy duyệt thành công!');
              }
              //reload();
            }
            });
            function reload()
            {
              location.reload();
            }
          }
         </script>
         <table class="table table-user-information">

           <tbody id='landing1'></tbody>

         </table>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" id="btn-duyet" value="1" onclick="duyet(this.value)">Duyệt</button>
         <button type="button" class="btn btn-default" id="btn-chuaduyet" value="0" onclick="duyet(this.value)">Chưa Duyệt</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
</div>

    </div>

  </div>
</div>

<script>
$(document).ready(function(){

	 load_data();

	 function load_data(query)
	 {
	  $.ajax({
	   url:"admin-duyetykiensv-ajax.php",
	   method:"POST",
	   data:{query:query},
	   success:function(data)
	   {
		$('#landing').html(data);
	   }
	  });
	 }
	 $('#chonsel').change(function(){
	  var search = $(this).val();
	  if(search != '')
	  {
	   load_data(search);
	  }
	  else
	  {
	   load_data();
	  }
	});
	$("#btn-chuaduyet").click(function(){
		var dkm = $('#chonsel').val();
		load_data(dkm);
		alert("DKM CUOC DOI PHE CAN");
	});
	$("#btn-duyet").click(function(){
		var dkm = $('#chonsel').val();
		load_data(dkm);
		alert("DKM CUOC DOI PHE CAN TAP 2");
	});
});




</script>


<?php require("footer.php") ?>
