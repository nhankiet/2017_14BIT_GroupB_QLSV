<?php
	session_start();
	require("connection.php");
	$output='';
	if(isset($_POST["query"]))
	{
		$ttyc=mysqli_real_escape_string($conn,$_POST["query"]);
		$query="
		select * from yeucau
		where Loai like '$ttyc'
		";
	}
	/*else {
		$query="
		select * from user where MaLop is not NULL ORDER BY MaUser
		";
	}*/
  if($ttyc!='')
	{
	$landing=mysqli_query($conn,$query);
if(mysqli_num_rows($landing) > 0)
{

	while($row = mysqli_fetch_array($landing ))
  {
    $tthai=$row["TrangThai"];
    switch ($tthai) {
    case "0":
        $tthai="Chưa duyệt";
        break;
    case "1":
        $tthai="Đã duyệt";
        break;
    default:
        $tthai="Chưa duyệt";
      }
			$ass=$row["MaYC"];
   $output .= '
    <tr>
     <td>'.$row["MaUser"].'</td>
     <td>'.$row["Loai"].'</td>
     <td>'.$row["ThoiDiemNop"].'</td>
     <td>'.$tthai.'</td>
     <td><button type="button" class="btn btn-info btn-sml" data-toggle="modal" data-target="#myModal" id="chitiet" value='.$ass.' onclick="getVal(this.value)">Chi tiết</button></td>
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
