<?php
	session_start();
	require("connection.php");
	$userid = $_SESSION["userid"];
	
	$linkanh = $_POST["linkanh"];
	$str_capnhatanh = "update user set HinhAnh='$linkanh' where MaUser='$userid'";
	mysqli_query($conn, $str_capnhatanh);

?>