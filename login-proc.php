<?php
	session_start();
	require("connection.php");

	$user = $_POST["bhktusername"];
	$pass = $_POST["bhktpass"];
	$str_login = "select * from user where Email='$user' and MatKhau='$pass'";
	$kq_login = mysqli_fetch_array(mysqli_query($conn, $str_login));
	if(($user==="$kq_login[Email]") && ($pass===$kq_login[MatKhau]))
	{
		$_SESSION["userid"] = $kq_login[MaUser];
		$_SESSION["userhoten"] = $kq_login[HoTen];
		$_SESSION["useremail"] = $kq_login[Email];
		$_SESSION["userloaiuser"] = $kq_login[LoaiUser];
		header("Location:index.php");
	}
	else
	{
		$_SESSION["userhoten"] = "SAI";
		header("Location:login.php");
	}
	header("Location:login.php");

?>