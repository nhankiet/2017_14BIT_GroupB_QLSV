<?php
	session_start();
	require("connection.php");
	$output='';
	if(isset($_POST["query"]))
	{
		$ttsinhvien=mysqli_real_escape_string($conn,$_POST["query"]);
		$query="
		select * from user
		where (HoTen like '%".$ttsinhvien."%' or CAST(MaUser as char) like '%".$ttsinhvien."%' or MaLop like '%".$ttsinhvien."%') and LoaiUser!=1
		";
	}
	/*else {
		$query="
		select * from user where MaLop is not NULL ORDER BY MaUser
		";
	}*/
	if($ttsinhvien!='')
	{
	$landing=mysqli_query($conn,$query);
if(mysqli_num_rows($landing) > 0)
{
	while($row = mysqli_fetch_array($landing ))
  	{
	   $output .= '
		<tr>
		 <td>'.$row["MaUser"].'</td>
		 <td><a href="admin-xemthongtinnguoidung.php?ID='.$row["MaUser"].'">'.$row["HoTen"].'</a></td>
		 ';
		if($row[LoaiUser]==2)
			$output .= '<td>Giảng viên</td>';
		else
			$output .= '<td>Sinh viên</td>';
			
		$output .= '
		 <td>'.$row["MaLop"].'</td>
		</tr>
	   ';
 	}
	echo $output;
}
else {
	echo '';
}
}
	
	
	$thongtin = $_POST["thongtin"];
	if($thongtin!="gvgvgv")
	{
		$str_laythongtin = "select * from user where MaLop='$thongtin'";
		$kq_laythongtin = mysqli_query($conn, $str_laythongtin);
		while($row2 = mysqli_fetch_array($kq_laythongtin))
		{
			echo "
			<tr>
				<td>$row2[MaUser]</td>
				<td><a href='admin-xemthongtinnguoidung.php?ID=$row2[MaUser]'>$row2[HoTen]</a></td>
				<td>Sinh viên</td>
				<td>$row2[MaLop]</td>
			</tr>";
		}
	}
	else
	{
		$str_laythongtin = "select * from user where LoaiUser=2";
		$kq_laythongtin = mysqli_query($conn, $str_laythongtin);
		while($row3 = mysqli_fetch_array($kq_laythongtin))
		{
			echo "
			<tr>
			
				<td>$row3[MaUser]</td>
				<td><a href='admin-xemthongtinnguoidung.php?ID=$row3[MaUser]'>$row3[HoTen]</a></td>
				<td>Giảng viên</td>
			</tr>";
		}
	}
	

	/*$ttsinhvien = $_POST["ttsinhvien"];

	$str_layttsv = "select * from user where HoTen like '%".$ttsinhvien."%' and MaLop is not NULL";
	$kq_layttsv = mysqli_query($conn, $str_layttsv);

  	$i = 1;
  	while($row2 = mysqli_fetch_array($kq_layttsv))
  	{
  		echo "<tr name='ttsv'>";
  		echo "<td name='ttsv1'><input value='$row2[MaLop]' name='malop$i' class='input-lg' readonly></td>";
  		echo "<td name='ttsv1'><input value='$row2[MaUser]' name='masv$i' class='input-lg' readonly></td>";
  		echo "<td name='ttsv1'><input value='$row2[HoTen]' name='hoten$i' class='input-lg' readonly></td>";
  		echo "</tr>";
  		$i++;
  	}
  	$i--;
  	$_SESSION["slkq"] = $i;*/

  ?>
