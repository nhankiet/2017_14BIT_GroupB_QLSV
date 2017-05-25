<?php
	$sl = $_POST["sl"];
	session_start();
	$_SESSION["sl"] = $sl;
	require("connection.php");
	for($i=1; $i<=$sl;$i++)
	{
			echo "
	<tr>
		<td><input class='input-sm' placeholder='Điền họ tên' name='hoten$i'></td>
		<td>
			<select class='input-sm' name='phai$i'>	
				<option value='1'>Nam</option>
				<option value='0'>Nữ</option>
			</select>
		</td>
		<td><input class='input-sm' type='date' name='ngaysinh$i' value='2000-01-01'></td>
		<td><input class='input-sm' name='diachi$i' placeholder='Địa chỉ'></td>
		<td><input class='input-sm' name='sdt$i' type='tel' placeholder='Số điện thoại' maxlength='20'></td>
		<td><input class='input-sm' name='email$i' type='email' placeholder='Email'></td>
		<td><input class='input-sm' name='matkhau$i' placeholder='Mật khẩu'></td>
		<td>
			<select name='lop$i' class='input-sm'>";
				$str_laymalop = "select * from lop";
				$kq_laymalop = mysqli_query($conn, $str_laymalop);
				while($row = mysqli_fetch_array($kq_laymalop))
				{
					echo "<option value='$row[MaLop]'>$row[MaLop]</option>";
				}
		echo"
			</select> 
		</td>
	</tr>
	";
	}

?>