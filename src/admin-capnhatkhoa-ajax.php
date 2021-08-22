<?php
	require("connection.php");

	$makhoa = $_POST["makhoa"];
	$giaovienpt = $_POST["giaovienpt"];
	$tinchi = $_POST["tinchi"];
	$tinhtrang = $_POST["tinhtrang"];

	$str_capkhoa = "update khoa set MaGV='$giaovienpt', SoTinChi='$tinchi', TinhTrang='$tinhtrang' where MaKhoa='$makhoa'";
	mysqli_query($conn, $str_capkhoa);
?>