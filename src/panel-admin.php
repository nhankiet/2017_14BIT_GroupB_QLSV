	<?php require("header.php"); ?>
	<title>Trang điều khiển Admin</title>
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
   			<div class="col-md-12">
   				<caption><h2>Các chức năng của cơ bản</h2></caption>
				<a href="profile.php"><div class="btn btn-lg btn-success">Trang thông tin cá nhân</div></a>
				<a href="doipass.php"><div class="btn btn-lg btn-primary">Đổi mật khẩu</div></a>
			</div>
		</div>

   		<div class="row">
   			<div class="col-md-12">
			<table class="table text-center">
				<caption><h2>Các chức năng của Admin</h2></caption>

				<thead>
					<tr>
						<th>Đối tượng</th>
						<th>Thêm</th>
						<th>Xóa</th>
						<th>Cập nhật</th>
					<tr>
				</thead>

				<tbody>
					<tr>
						<td><a href="#"><div class="btn btn-default">Lớp</div></a></td>
						<td><a href="admin-themlop.php"><div class="btn btn-primary">Thêm</div></a></td>
						<td><a href="admin-xoalop.php"><div class="btn btn-danger">Xóa</div></a></td>
						<td><a href="admin-capnhatlop.php"><div class="btn btn-warning">Cập nhật</div></a></td>
					</tr>
					<tr>
						<td><a href="#"><div class="btn btn-default">Người dùng</div></a></td>
						<td>
							<a href="admin-themgiangvien.php"><div class="btn btn-primary">Thêm Giảng Viên</div></a><br><br>
							<a href="admin-themsinhvien.php"><div class="btn btn-primary">Thêm Sinh Viên</div></a>
						</td>
						<td><a href="admin-xoanguoidung.php"><div class="btn btn-danger">Xóa</div></a></td>
						<td><a href="admin-capnhatnguoidung.php"><div class="btn btn-warning">Cập nhật</div></a></td>
					</tr>
					<tr>
						<td><a href="#"><div class="btn btn-default">Bộ môn</div></a></td>
						<td><a href="admin-thembomon.php"><div class="btn btn-primary">Thêm</div></a></td>
						<td><a href="admin-xoabomon.php"><div class="btn btn-danger">Xóa</div></a></td>
						<td><a href="admin-capnhatbomon.php"><div class="btn btn-warning">Cập nhật</div></a></td>
					</tr>
					<tr>
						<td><a href="#"><div class="btn btn-default">Khóa</div></a></td>
						<td><a href="admin-themkhoa.php"><div class="btn btn-primary">Thêm</div></a></td>
						<td><a href="admin-xoakhoa.php"><div class="btn btn-danger">Xóa</div></a></td>
						<td><a href="admin-capnhatkhoa.php"><div class="btn btn-warning">Cập nhật</div></a></td>
					</tr>
					<tr>
						<td><a href="#"><div class="btn btn-default">Kết quả</div></a></td>
						<td><a href="admin-themketqua.php"><div class="btn btn-primary">Thêm - Cập nhật</div></a></td>
						<td><a href="admin-xoaketqua.php"><div class="btn btn-danger">Xóa</div></a></td>
					</tr>

					<tr><td></td></tr>

					<tr>
						<td colspan="2"><h2>Các chức năng khác của Admin</h2></td>
					</tr>

					<tr>
						<td colspan="2"><a href="admin-timkiemsinhvien.php"><div class="btn btn-lg btn-success">Duyệt danh sách User</div></a></td>
						<td colspan="2"><a href="admin-duyetykiensv.php"><div class="btn btn-lg btn-success">Duyệt ý kiến sinh viên</div></a></td>
					</tr>
					
					<tr>
						<td colspan="2"><a href="admin-themchuyencan.php"><div class="btn btn-lg btn-success">Thêm chuyên cần</div></a></td>
						<td colspan="2"><a href="admin-xoachuyencan.php"><div class="btn btn-lg btn-danger">Xóa chuyên cần</div></a></td>
					</tr>

				</tbody>
			</table>

			</div>
		</div>
	</div>


<?php require("footer.php") ?>
