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
          <th><label>Nhập thông tin người dùng</label></th>
		  <th><label>Chọn theo danh sách</label></th>
        </thead>


        <tbody>
          <tr>
            <td><input class="input-lg" type="text" placeholder="Nhập MSSV/Họ&Tên/Lớp" name="ttsinhvien" id="ttsinhvien" required=""></td>
            
			<td>
				<select class="input-lg" id="chonsel">
					<option>Mời chọn</option>
					<option value="gvgvgv">Giảng viên</option>
					<optgroup label='Các lớp'>
				<?php
					$str_laylop = "select * from lop";
					$kq_laylop = mysqli_query($conn, $str_laylop);
					while ($row = mysqli_fetch_array($kq_laylop))
					{
						echo "<option value='$row[MaLop]'>$row[MaLop]</option>";
					}
				?>
				</optgroup>
				</select>
			</td>
            
          </tr>

        </tbody>
      </table>
      <table class="table table-hover">
        <thead>
          <th><label>Mã User</label></th>
          <th><label>Họ và Tên</label></th>
		  <th><label>Loại User</label></th>
          <th><label>Lớp</label></th>
        </thead>

        <tbody id='landing'></tbody>

      </table>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){

	 load_data();

	 function load_data(query)
	 {
	  $.ajax({
	   url:"admin-timkiemsinhvien-ajax.php",
	   method:"POST",
	   data:{query:query},
	   success:function(data)
	   {
		$('#landing').html(data);
	   }
	  });
	 }
	 $('#ttsinhvien').keyup(function(){
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
	});
	
	$("#chonsel").change(function(){
		var thongtin = this.value;
		$.post("admin-timkiemsinhvien-ajax.php", {thongtin: thongtin}, function(data, status){
			if(status=="success")
			{
				$('#landing').html(data);
			}
			else
			{
				
			}
		});
	});	


</script>


<?php require("footer.php") ?>
