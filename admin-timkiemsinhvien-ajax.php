<?php
	session_start();
	require("connection.php");
	$output='';
	if(isset($_POST["query"]))
	{
		$ttsinhvien=mysqli_real_escape_string($conn,$_POST["query"]);
		$query="
		select * from user
		where (HoTen like '%".$ttsinhvien."%' or CAST(MaUser as char) like '%".$ttsinhvien."%' or MaLop like '%".$ttsinhvien."%') and MaLop is not NULL
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
     <td>'.$row["HoTen"].'</td>
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
