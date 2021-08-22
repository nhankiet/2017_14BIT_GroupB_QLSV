<?php
	require("connection.php");
	$mauser = $_POST["mauser"];
	
	$str_laythongtinuser = "select * from user where MaUser='$mauser'";
	$kq_laythongtinuser = mysqli_query($conn, $str_laythongtinuser);
	$row = mysqli_fetch_array($kq_laythongtinuser);
	
	if($row[LoaiUser]==2)
	{
		$str_xoagv = "delete from user where MaUser='$mauser'";
		$str_xoabomonpt = "update bomon set GVPhuTrach=null,SoDienThoai=null where GVPhuTrach='$mauser'";
		$str_xoakhoa = "update khoa set MaGV=null where MaGV='$mauser'";
		mysqli_query($conn, $str_xoabomonpt);
		mysqli_query($conn, $str_xoakhoa);
		mysqli_query($conn, $str_xoagv);
	}
	else
	{
		$str_xoasv = "delete from user where MaUser='$mauser'";
		$str_xoaloptruong = "update lop set LopTruong=null where LopTruong='$mauser'";
		$str_xoakq = "delete from kqkhoa where MaSV='$mauser'";
		mysqli_query($conn, $str_xoaloptruong);
		mysqli_query($conn, $str_xoakq);
		mysqli_query($conn, $str_xoasv);
	}
?>