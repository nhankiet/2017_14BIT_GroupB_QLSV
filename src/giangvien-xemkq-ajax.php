<?php
	require("connection.php");
	$khoa = $_POST["khoa"];
	
	$str_laykq = "select * from kqkhoa where MaKhoa='$khoa'";
	$kq_laykq = mysqli_query($conn, $str_laykq);
	while($row = mysqli_fetch_array($kq_laykq))
	{	
		echo "<tr>";
		echo "<td>$row[MaKhoa]</td>";

		$str_laythongtinsv = "select * from user where MaUser='$row[MaSV]'";
		$kq_laythongtinsv = mysqli_query($conn, $str_laythongtinsv);
		$row2 = mysqli_fetch_array($kq_laythongtinsv);
		echo "<td>$row[MaSV] - $row2[HoTen]</td>";

		echo "<td>$row[MaLop]</td>";
		echo "<td>$row[DiemTongKet]</td>";
		echo "<td>$row[KetQua]</td>";

		echo "</tr>";
	}
						
?>