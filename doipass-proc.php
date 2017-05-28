<?php
	session_start();
	require("connection.php");

	$oldpass = $_POST["oldpass"];
	$newpass1 = $_POST["newpass1"];
	$newpass2 = $_POST["newpass2"];

	$str_laythongtinuser = "select * from user where MaUser='$_SESSION[userid]'";
	$kq_laythongtinuser = mysqli_query($conn, $str_laythongtinuser);
	$row = mysqli_fetch_array($kq_laythongtinuser);

	if($oldpass==$row[MatKhau])
	{
		if($newpass1==$newpass2)
		{
			$str_doimatkhau = "update user set MatKhau='$newpass1' where MaUser='$row[MaUser]'";
			mysqli_query($conn, $str_doimatkhau);
		}
		else
			echo "<script>alert('Mật khẩu mới và mật khẩu xác nhận chưa giống nhau')</script>";
	}
	else
	{
		echo "<script>Sai mật khẩu hiện tại!</script>";
	}
	echo "<script>Đổi mật khẩu thành công!</script>";
	header("Location:doipass.php");
?>