<?php
	require("connection.php");
	$makhoa = $_POST["makhoa"];
	$malop = $_POST["malop"];
	$mauser = $_POST["mauser"];

	$str_xoakq = "delete from kqkhoa where MaKhoa='$makhoa' and MaLop='$malop' and MaSV='$mauser'";

	mysqli_query($conn, $str_xoakq);

?>