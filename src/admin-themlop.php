	<?php require("header.php"); ?>
	<title>Thêm lớp - Admin</title>
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
			$malop = $_POST["malop"];
			$str_themlop = "insert into lop(MaLop) values('$malop')";
			mysqli_query($conn, $str_themlop);
		}
	?>

  	
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-12">
				<form class="" action="admin-themlop.php" method="post">
				
				<table class="table table-hover">
					<thead>
						<th><label>Mã lớp</label></th>
						<th><label>Chọn lớp trưởng</label></th>
					</thead>
					
					
					<tbody>
						<tr>
							<td><input class="input-lg" placeholder="Điền mã lớp" name="malop" required=""></td>

							<td><div class="alert alert-warning"><strong>Lưu ý:</strong> lớp vừa được thêm vào sẽ chưa có sinh viên, vậy nên chưa thể chọn lớp trưởng, vui lòng cập nhật lớp trưởng cho lớp ở mục "Cập nhật lớp" sau khi đã thêm sinh viên vào lớp</div></td>
						</tr>

					</tbody>
				</table>
				<input class="btn btn-success center-block btn-lg" value="Thêm" name="THEM" type="submit">				
				</form>
			</div>
		</div>
	</div>
  

<?php require("footer.php") ?>