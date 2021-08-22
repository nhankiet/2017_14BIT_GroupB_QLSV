<?php
	require("connection.php");
	$malop = $_POST["malop"];


	echo "<select name='loptruong' class='input-lg' required>";
		$str_laylt = "select * from user where LoaiUser=3 and MaLop='$malop'";
		$kq_laylt = mysqli_query($conn, $str_laylt);
		while($row2 = mysqli_fetch_array($kq_laylt))
		{
			echo "<option value='$row2[MaUser]'>$row2[HoTen]</option>";
		}
	echo "</select>";
	
	echo "&emsp;&emsp;&emsp;-&emsp;&emsp;&emsp;";

	$str_laylthientai = "select LopTruong from lop where MaLop='$malop'";
	$kq_laylthientai = mysqli_query($conn, $str_laylthientai);
	$row3 = mysqli_fetch_array($kq_laylthientai);

	if(isset($row3[LopTruong]))
	{
		$str_laytenlthientai = "select HoTen from user where MaUser=$row3[LopTruong]";
		$kq_laytenlthientai = mysqli_query($conn, $str_laytenlthientai);
		$row4 = mysqli_fetch_array($kq_laytenlthientai);

		if(isset($row4[HoTen]))
			echo "<input value='$row4[HoTen]' readonly class='input-lg'>";
			
	}
	else
	{
		echo "<input value='(Chưa có lớp trưởng)' readonly class='input-lg'>";
	}
?>