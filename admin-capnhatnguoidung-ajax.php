<?php
	require("connection.php");
	$loaiuser = $_POST["loaiuser"];
	
	if($loaiuser=="gv")
	{
		$str_layuser = "select * from user where LoaiUser='2'";
		$kq_layuser = mysqli_query($conn, $str_layuser);
		echo "<table class='table table-responsive'>
					<thead>
						<th><label>Hình ảnh</label></th>
						<th><label>Họ tên - SĐT</label></th>
						<th><label>Phái</label></th>
						<th><label>Ngày sinh - Địa chỉ</label></th>
						<th><label>Email</label></th>
						<th><label>Password</label></th>
						<th><label>Tình trạng</label></th>
					</thead>
					
					
					<tbody>";
		while($row1 = mysqli_fetch_array($kq_layuser))
		{	
			echo "<tr>";
			echo "<td><img src='$row1[HinhAnh]' class='img-circle' width='150' height='90'><br>
			<input name='hinhanh' placeholder='Ảnh mới'>
			</td>";
			
			
			echo "<td><input value='$row1[HoTen]' name='hoten'><br>
			<input value='$row1[SoDienThoai]' name='sdt'>
			</td>";
			echo "<td><select name='phai'>
			<optgroup label='Phái hiện tại'><option value='$row1[Phai]'>";
			if($row1[Phai]==1)
				echo "Nam";
			else
				echo "Nữ";
			echo "</option></optgroup>
			<optgroup label='Phái mới:'>
			<option value='1'>Nam</option>
			<option value='0'>Nữ</option>
			</optgroup>
			</select></td>";
			
			echo "<td><input value='$row1[NgaySinh]' name='ngaysinh' type='date'><br>
			<input value='$row1[DiaChi]' name='diachi'>
			</td>";
			
			echo "<td><input value='$row1[Email]' name='email' type='email'>
			<br>
			<input name='$row1[MaUser]' class='Up btn btn-success' value='Cập nhật' type='button'>
			</td>";
			echo "<td><input name='matkhau' placeholder='Đê trống nếu không đổi'
			pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Tối thiểu là 8 ký tự, trong đó yêu cầu ít nhất 1 ký tự viết hoa, ít nhất 1 ký tự viết thường và ít nhất 1 chữ số.'></td>";
			
			echo "<td><select name='tinhtrang'><optgroup label='Hiện tại: $row1[TinhTrang]'>
			<option value='Đang hoạt động'>Đang hoạt động</option>
			<option value='Ngừng hoạt động'>Ngừng hoạt động</option>
			</optgroup></select></td>";
			
			echo "</tr>";
		}
		echo "</tbody></table>";
	}
	else
	{
		echo "<table class='table table-responsive'>
					<thead>
						<th><label>Hình ảnh</label></th>
						<th><label>Họ tên - SĐT</label></th>
						<th><label>Phái</label></th>
						<th><label>Ngày sinh - Địa chỉ</label></th>
						<th><label>Email</label></th>
						<th><label>Password</label></th>
						<th><label>Lớp</label></th>
						<th><label>Tình trạng</label></th>
					</thead>
					
					
					<tbody>";

						
					
		$str_layuser = "select * from user where MaLop='$loaiuser'";
		$kq_layuser = mysqli_query($conn, $str_layuser);
		while($row1 = mysqli_fetch_array($kq_layuser))
		{	
			echo "<tr>";
			echo "<td><img src='$row1[HinhAnh]' class='img-circle' width='150' height='90'><br>
			<input name='hinhanh' placeholder='Ảnh mới'>
			</td>";
			
			
			echo "<td><input value='$row1[HoTen]' name='hoten'><br>
			<input value='$row1[SoDienThoai]' name='sdt'>
			</td>";
			echo "<td><select name='phai'>
			<optgroup label='Phái hiện tại'><option value='$row1[Phai]'>";
			if($row1[Phai]==1)
				echo "Nam";
			else
				echo "Nữ";
			echo "</option></optgroup>
			<optgroup label='Phái mới:'>
			<option value='1'>Nam</option>
			<option value='0'>Nữ</option>
			</optgroup>
			</select></td>";
			
			echo "<td><input value='$row1[NgaySinh]' name='ngaysinh' type='date'><br>
			<input value='$row1[DiaChi]' name='diachi'>
			</td>";
			
			echo "<td><input value='$row1[Email]' name='email' type='email'>
			<br>
			<input name='$row1[MaUser]' class='Up btn btn-success' value='Cập nhật' type='button' alt='$row1[HoTen]'>
			</td>";
			echo "<td><input value='$row1[MatKhau]' name='matkhau'></td>";
			
			
			$str_laylop = "select * from lop where MaLop!='$row1[MaLop]'";
			$kq_laylop = mysqli_query($conn, $str_laylop);
			echo "<td><select name='malop'><optgroup label='Lớp hiện tại: $row1[MaLop]'>
			<option value='$row1[MaLop]'>$row1[MaLop]</option>";
			while($row2 = mysqli_fetch_array($kq_laylop))
			{
				echo "<option value='$row2[MaLop]'>$row2[MaLop]</option>";
			}
			echo"</optgroup>
			</select></td>";
			
			echo "<td><select name='tinhtrang'><optgroup label='Hiện tại: $row1[TinhTrang]'>
			<option value='Đang hoạt động'>Đang hoạt động</option>
			<option value='Ngừng hoạt động'>Ngừng hoạt động</option>
			</optgroup></select></td>";
			
			echo "</tr>";
		}
		echo "</tbody></table>";
	}
?>