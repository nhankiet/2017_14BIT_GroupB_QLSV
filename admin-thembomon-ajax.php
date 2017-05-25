<?php
	require("connection.php");
	$magv2 = $_POST["magv2"];
	$str_laysdtgvpt = "select * from user where MaUser=$magv2";
	$kq_laysdtgvpt = mysqli_query($conn, $str_laysdtgvpt);
	$sdtgvpt = mysqli_fetch_array($kq_laysdtgvpt);
	echo $sdtgvpt[SoDienThoai];
?>