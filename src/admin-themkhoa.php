	<?php require("header.php"); ?>
	<title>Thêm khóa - Admin</title>
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
			$makhoa = $_POST["makhoa"];
			$malop = $_POST["malop"];
			$bomon = $_POST["bomon"];
			$giaovien = $_POST["giaovien"];
			$tinchi = $_POST["tinchi"];
						
			$str_themkhoa = "insert into khoa(MaKhoa, MaLop, MaBM, MaGV, SoTinChi, TinhTrang) values('$makhoa$malop', '$malop', '$bomon', '$giaovien', '$tinchi', 'Đang hoạt động')";
			mysqli_query($conn, $str_themkhoa);
		}
	?>

  	
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-12">
				<form class="" action="admin-themkhoa.php" method="post">
				
				<table class="table table-hover">
					<thead>
						<th><label>Mã khóa</label></th>
						<th><label>Chọn lớp</label></th>
						<th><label>Chọn bộ môn</label></th>
						<th><label>Chọn giáo viên</label></th>
						<th><label>Số tín chỉ</label></th>
					</thead>
					
					
					<tbody>
						<tr>
							<td><input class="input-lg" placeholder="Điền mã khóa" name="makhoa" required></td>
							<td><select class="input-lg" name="malop">
								<?php
									$str_laymalop = "select * from lop";
									$kq_laymalop = mysqli_query($conn, $str_laymalop);
									while($row1 = mysqli_fetch_array($kq_laymalop))
									{
										echo "<option value='$row1[MaLop]'>$row1[MaLop]</option>";
									}
								?>
								</select></td>
							<td><select class="input-lg" name="bomon">
								<?php
									$str_laybm = "select * from bomon";
									$kq_laybm = mysqli_query($conn, $str_laybm);
									while($row2 = mysqli_fetch_array($kq_laybm))
									{
										echo "<option value='$row2[MaBM]'>$row2[TenBM]</option>";
									}
								?>
								</select></td>
							<td><select class="input-lg" name="giaovien">
								<?php
									$str_gv = "select * from user where LoaiUser='2' and TinhTrang='Đang hoạt động'";
									$kq_gv = mysqli_query($conn, $str_gv);
									while($row3 = mysqli_fetch_array($kq_gv))
									{
										echo "<option value='$row3[MaUser]'>$row3[HoTen]</option>";
									}
								?>
								</select></td>
							<td>
								<select name="tinchi" class="input-lg">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</td>
						</tr>
					
						
					</tbody>
				</table>
				<input class="btn btn-success center-block btn-lg" value="Thêm" name="THEM" type="submit">
				</form>
			</div>
		</div>
	</div>
  

<?php require("footer.php") ?>