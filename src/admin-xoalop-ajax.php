<?php
	require("connection.php");
	$malop = $_POST["malop"];
	
	$str_xoalop = "delete from lop where MaLop='$malop'";
	mysqli_query($conn, $str_xoalop);

?>