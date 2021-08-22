<?php
	session_start();
	require("connection.php");
	$output='';
	if(isset($_POST["MaYC"]))
	{
		$ttyc=mysqli_real_escape_string($conn,$_POST["MaYC"]);
		$query="
		select * from yeucau
		where MaYC like '$ttyc'
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
