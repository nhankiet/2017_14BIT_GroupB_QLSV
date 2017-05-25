<?php
	$sl = $_POST["sl"];
	session_start();
	$_SESSION["sl2"] = $sl;
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
		
	</tr>
	";
	}

?>