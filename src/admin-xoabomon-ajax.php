<?php
	require("connection.php");
	$mabm = $_POST["mabm"];
	
	$str_xoabm = "delete from bomon where MaBM='$mabm'";

	mysqli_query($conn, $str_xoabm);

?>