<?php
	require("connection.php");
	$makhoa = $_POST["makhoa"];
	
	$str_xoakhoa = "delete from khoa where MaKhoa='$makhoa'";

	mysqli_query($conn, $str_xoakhoa);

?>