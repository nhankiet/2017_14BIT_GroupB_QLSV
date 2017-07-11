	<?php require("header.php"); ?>
	<title>Xem chi tiết khóa học - Sinh viên</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 3) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
 
  	
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-12">
				<h1 class="text-center">Thông tin chi tiết các khóa học</h1>
				<hr><hr>	
				<?php
					$masv = $_SESSION["userid"];
					$str_laythongtin = "select * from user where MaUser='$masv'";
					$kq_laythongtin = mysqli_query($conn, $str_laythongtin);
					$row1 = mysqli_fetch_array($kq_laythongtin);
				?>
				
				<div class="col-lg-4"><h4>MSSV: <span class="btn btn-lg btn-default"><?php echo"$row1[MaUser]"; ?></span></h4></div>
				<div class="col-lg-4"><h4>Họ tên: <span class="btn btn-lg btn-default"><?php echo"$row1[HoTen]"; ?></span></h4></div>
				<div class="col-lg-4"><h4>Lớp: <span class="btn btn-lg btn-default"><?php echo"$row1[MaLop]"; ?></span></h4></div>
					
				<hr><hr><hr><hr>
				<?php
					$str_laykhoahoc = "select * from khoa where MaLop='$row1[MaLop]'";
					$kq_laykhoahoc = mysqli_query($conn, $str_laykhoahoc);
					while($row2 = mysqli_fetch_array($kq_laykhoahoc))
					{
						$str_laytenkh = "select * from bomon where MaBM='$row2[MaBM]'";
						$kq_laytenkh = mysqli_query($conn, $str_laytenkh);
						$row3 = mysqli_fetch_array($kq_laytenkh);
						
						$str_laytengv = "select * from user where MaUser='$row2[MaGV]'";
						$kq_laytengv = mysqli_query($conn, $str_laytengv);
						$row4 = mysqli_fetch_array($kq_laytengv);
							
						echo "<strong>Mã khóa: </strong> <span class='btn btn-lg btn-default'>$row2[MaKhoa]</span> ---- <strong>Tên khóa:</strong><span class='btn btn-lg btn-primary'>$row3[TenBM]</span><br>";
						echo "<strong>Giảng viên phụ trách</strong><span class='btn btn-lg btn-danger'>$row4[HoTen]</span><strong>Số tín chỉ</strong><span class='btn btn-lg btn-warning'>$row2[SoTinChi]</span>";
						
						

						echo "<br><br><br>";
					}
				
				?>
				
				
				
				
			</div>
		</div>
	</div>
	
  

<?php require("footer.php") ?>