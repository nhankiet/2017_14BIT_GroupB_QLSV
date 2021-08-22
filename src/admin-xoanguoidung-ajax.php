<?php
	require("connection.php");
	$loaiuser = $_POST["loaiuser"];
	
	if($loaiuser=="gv")
	{
		$str_layuser = "select * from user where LoaiUser='2'";
		$kq_layuser = mysqli_query($conn, $str_layuser);
		while($row1 = mysqli_fetch_array($kq_layuser))
		{	
			echo "<tr>";
			echo "<td><img src='$row1[HinhAnh]' class='img-circle' width='250' height='190'></td>";
			echo "<td>$row1[MaUser]</td>";
			echo "<td>$row1[HoTen]</td>";
			if($row1[Phai]==1)
				echo "<td>Nam</td>";
			else
				echo "<td>Nữ</td>";
			echo "<td>$row1[NgaySinh]</td>";
			if($row1[LoaiUser]==2)
				echo "<td>Giảng viên</td>";
			else
				echo "<td>Sinh viên</td>";
			echo "<td>$row1[Email]</td>";
			echo "<td>$row1[TinhTrang]</td>";
			echo "<td><input name='$row1[MaUser]' class='Xoa2 btn btn-danger' value='Xóa' type='button' alt='$row1[HoTen]'></td>";
			echo "</tr>";
		}
	}
	elseif($loaiuser=="tc")
	{
		$str_layuser = "select * from user where LoaiUser!='1'";
		$kq_layuser = mysqli_query($conn, $str_layuser);
		while($row1 = mysqli_fetch_array($kq_layuser))
		{	
			echo "<tr>";
			echo "<td><img src='$row1[HinhAnh]' class='img-circle' width='250' height='190'></td>";
			echo "<td>$row1[MaUser]</td>";
			echo "<td>$row1[HoTen]</td>";
			if($row1[Phai]==1)
				echo "<td>Nam</td>";
			else
				echo "<td>Nữ</td>";
			echo "<td>$row1[NgaySinh]</td>";
			if($row1[LoaiUser]==2)
				echo "<td>Giảng viên</td>";
			else
				echo "<td>Sinh viên</td>";
			echo "<td>$row1[Email]</td>";
			echo "<td>$row1[TinhTrang]</td>";
			echo "<td><input name='$row1[MaUser]' class='Xoa2 btn btn-danger' value='Xóa' type='button' alt='$row1[HoTen]'></td>";
			echo "</tr>";
		}
	}
	else
	{
		$str_layuser = "select * from user where MaLop='$loaiuser'";
		$kq_layuser = mysqli_query($conn, $str_layuser);
		while($row1 = mysqli_fetch_array($kq_layuser))
		{	
			echo "<tr>";
			echo "<td><img src='$row1[HinhAnh]' class='img-circle' width='250' height='190'></td>";
			echo "<td>$row1[MaUser]</td>";
			echo "<td>$row1[HoTen]</td>";
			if($row1[Phai]==1)
				echo "<td>Nam</td>";
			else
				echo "<td>Nữ</td>";
			echo "<td>$row1[NgaySinh]</td>";
			if($row1[LoaiUser]==2)
				echo "<td>Giảng viên</td>";
			else
				echo "<td>Sinh viên</td>";
			echo "<td>$row1[Email]</td>";
			echo "<td>$row1[TinhTrang]</td>";
			echo "<td><input name='$row1[MaUser]' class='Xoa2 btn btn-danger' value='Xóa' type='button' alt='$row1[HoTen]'></td>";
			echo "</tr>";
		}
	}
?>