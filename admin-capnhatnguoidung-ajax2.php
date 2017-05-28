<?php
	require("connection.php");
	$mauser = $_POST["mauser"];
	$hinhanh = $_POST["hinhanh"];
	$hoten = $_POST["hoten"];
	$phai = $_POST["phai"];
	$ngaysinh = $_POST["ngaysinh"];
	$email = $_POST["email"];
	$matkhau =  $_POST["matkhau"];
	$tinhtrang = $_POST["tinhtrang"];
	$malop = $_POST["malop"];
	$sdt = $_POST["sdt"];
	$diachi = $_POST["diachi"];
	
	$str_laythongtinuser = "select * from user where MaUser='$mauser'";
	$kq_laythongtinuser = mysqli_query($conn, $str_laythongtinuser);
	$row = mysqli_fetch_array($kq_laythongtinuser);
	if($row[LoaiUser]==2)
	{

		$str_capnhatuser = "update user set HoTen='$hoten', Phai='$phai', NgaySinh='$ngaysinh', Email='$email', MatKhau='$matkhau', TinhTrang='$tinhtrang', SoDienThoai='$sdt', DiaChi='$diachi'";
		if($hinhanh!="")
		{
			$str_capnhatuser.=", HinhAnh='$hinhanh'";
		}
		$str_capnhatuser.=" where MaUser='$mauser'";
		mysqli_query($conn, $str_capnhatuser);
	}
	else
	{
		$str_capnhatuser = "update user set HoTen='$hoten', Phai='$phai', NgaySinh='$ngaysinh', Email='$email', MatKhau='$matkhau', TinhTrang='$tinhtrang', MaLop='$malop', SoDienThoai='$sdt', DiaChi='$diachi'";
		if($hinhanh!="")
		{
			$str_capnhatuser.=", HinhAnh='$hinhanh'";
		}
		$str_capnhatuser.=" where MaUser='$mauser'";
		mysqli_query($conn, $str_capnhatuser);
	}
?>