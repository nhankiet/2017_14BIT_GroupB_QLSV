	<?php require("header.php"); ?>
	<title>Trang điều khiển - Giảng viên</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 2) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
   	<div class="container">
   		<div class="row">
   			<div class="col-md-12">
   			<hr>
			<table class="table text-center">
				<caption><h2>Các chức năng của Giảng viên</h2></caption>

				<thead>
					<tr>

					<tr>	
				</thead>

				<tbody>
					<tr>
						<td><a href="profile.php"><div class="btn btn-primary btn-lg">Trang thông tin cá nhân</div></a></td>
						<td><a href="giangvien-themkq.php"><div class="btn btn-lg btn-success">Thêm kết quả </div></a></td>
						<td><a href="giangvien-xemkq.php"><div class="btn btn-lg btn-info">Xem kết quả</div></a></td>
					</tr>
					
				</tbody>
			</table>
			
			</div>
		</div>
	</div>

<?php require("footer.php") ?>