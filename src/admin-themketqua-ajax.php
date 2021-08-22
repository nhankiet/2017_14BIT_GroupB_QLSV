<?php
	session_start();
	require("connection.php");
	$makhoa = $_POST["makhoa"];
	
	$str_layttkhoa = "select MaLop from khoa where MaKhoa='$makhoa'";
	$kq_layttkhoa = mysqli_query($conn, $str_layttkhoa);
	$row1 = mysqli_fetch_array($kq_layttkhoa);


	
	$str_laysv = "select * from user where MaLop='$row1[MaLop]'";
	$kq_laysv = mysqli_query($conn, $str_laysv);



	$i = 1;
	while($row2 = mysqli_fetch_array($kq_laysv))
	{	
		echo "<tr>";
		echo "<td><input value='$row2[MaLop]' name='malop$i' class='input-lg' readonly></td>";
		echo "<td><input value='$row2[MaUser]' name='masv$i' class='input-lg' readonly></td>";
		echo "<td><input value='$row2[HoTen]' name='hoten$i' class='input-lg' readonly></td>";
		
		$str_laydiemht = "select DiemTongKet from kqkhoa where MaKhoa='$makhoa' and MaSV='$row2[MaUser]'";
		$kq_laydiemht = mysqli_query($conn, $str_laydiemht);
		$row3 = mysqli_fetch_array($kq_laydiemht);
		
		echo "<td><input type='number' name='diemtk$i' class='input-lg' min='0' max='10' step='0.25' value='$row3[DiemTongKet]'></td>";
		echo "</tr>";
		$i++;
	}
	$i--;
	$_SESSION["slkq"] = $i;
?>