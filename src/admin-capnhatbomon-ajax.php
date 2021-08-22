<?php
	require("connection.php");
	$mabm = $_POST["mabm"];
	$tenbm = $_POST["tenbm"];
	$phong = $_POST["phong"];
	$giaovienpt = $_POST["giaovienpt"];

	$str_laysdt = "select * from user where MaUser='$giaovienpt'";
	$kq_laysdt = mysqli_query($conn, $str_laysdt);
	$row = mysqli_fetch_array($kq_laysdt);

	$str_capnhatbm = "update bomon set TenBM='$tenbm', Phong='$phong', GVPhuTrach='$giaovienpt', SoDienThoai='$row[SoDienThoai]' where MaBM='$mabm'";
	mysqli_query($conn, $str_capnhatbm);
?>