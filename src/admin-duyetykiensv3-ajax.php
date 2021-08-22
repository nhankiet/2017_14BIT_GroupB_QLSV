<?php
	session_start();
	require("connection.php");
	$output='';
	if(isset($_POST["MaYC"])&&isset($_POST["trangthai"]))
	{
    $mayc=$_POST["MaYC"];
		$ttyc=mysqli_real_escape_string($conn,$_POST["trangthai"]);
		$query="
		update yeucau
    set TrangThai=$ttyc
    where MaYC like '$mayc'
		";
	}
  if($ttyc!='')
	{
	$landing=mysqli_query($conn,$query);
if(mysqli_num_rows($landing) > 0)
{

	$row = mysqli_fetch_array($landing);
	$output .= '
	 <tr>
	 <td>Tiêu Đề:</td>
		<td>'.$row["TieuDe"].'</td>
	 </tr>
	 <tr>
	 <td>Nội Dung:</td>
		<td>'.$row["NoiDung"].'</td>
	 </tr>
	';
}
	echo $output;
}





  ?>
