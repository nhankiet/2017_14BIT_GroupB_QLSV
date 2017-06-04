	<?php require("header.php"); ?>
	<title>Thêm giảng viên - Admin</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 1) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
  	
  	<?php
		if(isset($_POST["THEM"])&&($_POST["THEM"]=="Thêm"))
		{
			$sl = $_SESSION["sl2"];
			$str_themgiangvien = "insert into user(HoTen, Phai, NgaySinh, DiaChi, SoDienThoai, Email, MatKhau, TinhTrang, LoaiUser) values";
			for($i=1; $i<=$sl; $i++)
			{
				$hoten = $_POST["hoten".$i];
				$phai = $_POST["phai".$i];
				$ngaysinh = $_POST["ngaysinh".$i];
				$diachi = $_POST["diachi".$i];
				$sdt = $_POST["sdt".$i];
				$email = $_POST["email".$i];
				$matkhau = $_POST["matkhau".$i];

				$matkhau = hash("sha512", $matkhau);
				$str_themgiangvien.="('$hoten', '$phai', '$ngaysinh', '$diachi', '$sdt', '$email', '$matkhau', 'Đang hoạt động', 2), ";
			}
			$str_themgiangvien = rtrim($str_themgiangvien, ", ");
			mysqli_query($conn, $str_themgiangvien);
			echo $str_themgiangvien;
		}
	?>
	
	<script>
	$(document).ready(function(){
		var sl = $("#sldong").val();
		$.post("admin-themgiangvien-ajax.php", { sl:sl }, function(data, status){
			if(status=="success")
			{
				$("#kingslanding").html(data);	
			}
		});
		
		$("#sldong").change(function(){
			var sl = this.value;
			$.post("admin-themgiangvien-ajax.php", { sl:sl }, function(data, status){
				if(status=="success")
				{
					$("#kingslanding").html(data);	
				}
			});
		});
		
	});
	</script>
  	
   	<div class="container-fluid">
  		<div class="row">
  			<div class="btn btn-block">
  			<label>Chọn số lượng dòng</label>
  			<select class="input-sm" id="sldong">
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
			</select>
			</div>
		</div>
 		<div class="row">
				<div class="col-lg-2">&nbsp;</div>
				<div class="col-lg-8">
					<div class="alert alert-warning alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Lưu ý:</strong><hr>
						_ Email phải có @.<hr>
						_ Mật khẩu tối thiểu là 8 ký tự, trong đó yêu cầu ít nhất 1 ký tự viết hoa, ít nhất 1 ký tự viết thường và ít nhất 1 chữ số.
					
					</div>
					</div>
				<div class="col-lg-2">&nbsp;</div>
		</div>
  		<hr><hr><hr>
   		<div class="row">
   			<div class="col-lg-12">
				<form class="" action="admin-themgiangvien.php" method="post">
				
				<table class="table table-hover">
					<thead>
						<th><label><strong>*Họ tên*</strong></label></th>
						<th><label>Phái</label></th>
						<th><label>Ngày sinh</label></th>
						<th><label>Địa chỉ</label></th>
						<th><label>Số điện thoại</label></th>
						<th><label><strong>*Email*</strong></label></th>
						<th><label><strong>*Mật khẩu*</strong></label></th>
					</thead>
					
					
					<tbody id="kingslanding">
<!--
						<tr>
							<td><input class="input-sm" placeholder="Điền họ tên" name="hoten"></td>
							<td>
								<select class="input-sm" name="phai">	
									<option value="1">Nam</option>
									<option value="0">Nữ</option>
								</select>
							</td>
							<td><input class="input-sm" type="date" name="ngaysinh"></td>
							<td><input class="input-sm" name="diachi"></td>
							<td><input class="input-sm" name="sdt"></td>
							<td><input class="input-sm" name="email"></td>
							<td><input class="input-sm" name="matkhau"></td>
							<td>
								<select name="lop" class="input-sm">
								<?php
/*									$str_laymalop = $str="select * from lop";
									$kq_laymalop = mysqli_query($conn, $str_laymalop);
									while($row = mysqli_fetch_array($kq_laymalop))
									{
										echo "<option value='$row[MaLop]'>$row[MaLop]</option>";
									}*/
								?>
								</select> 
							</td>
						</tr>
-->
						
					</tbody>
				</table>
				<input class="btn btn-success center-block btn-lg" value="Thêm" name="THEM" type="submit">
				</form>
			</div>
		</div>
	</div>
  

<?php require("footer.php") ?>