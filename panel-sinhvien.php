	<?php require("header.php"); ?>
	<title>Trang điều khiển - Sinh viên</title>
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
   			<div class="col-md-12">
   			<hr>
			<table class="table text-center">
				<caption><h2>Các chức năng của Sinh viên</h2></caption>

				<thead>
					<tr>

					<tr>	
				</thead>

				<tbody>
					<tr>
						
						<td><a href="profile.php"><div class="btn btn-primary btn-lg">Trang thông tin cá nhân</div></a></td>
						<td><a href="sinhvien-xemdiem.php"><div class="btn btn-lg btn-success">Xem kết quả</div></a></td>
						<td><a href="doipass.php"><div class="btn btn-lg btn-default">Đổi mật khẩu</div></a></td>
					</tr>
					<tr>
						<td><a href="sinhvien-guiyeucau.php"><div class="btn btn-lg btn-xl">Gửi yêu cầu</div></a></td>
						<td><a href="sinhvien-xemchitietkh.php"><div class="btn btn-lg btn-xl">Xem chi tiết khóa học</div></a></td>
						<td><a href="sinhvien-xemchuyencan.php"><div class="btn btn-lg btn-xl">Xem chuyên cần</div></a></td>
					</tr>
					
				</tbody>
			</table>
			
			</div>
		</div>
	</div>

<?php require("footer.php") ?>