	<?php require("header.php"); ?>
	<title>Cập nhật khóa - Admin</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 1) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
  	

   	<div class="container-fluid">
   		<div class="row">
   			<div class="col-lg-12">
				<form class="" action="" method="post">
				
				<table class="table table-hover">
					<thead>
						<th><label>Mã khóa</label></th>
						<th><label>Mã lớp</label></th>
						<th><label>Tên bộ môn</label></th>
						<th><label>Chọn giáo viên phụ trách</label></th>
						<th><label>Chọn số tín chỉ</label></th>
						<th><label>Chọn tình trạng</label></th>
					</thead>
					
					
					<tbody>
						<?php
							$str_laykhoa = "select * from khoa";
							$kq_laykhoa = mysqli_query($conn, $str_laykhoa);
							while($row = mysqli_fetch_array($kq_laykhoa))
							{	
								echo "<tr>";
								echo "<td><input value='$row[MaKhoa]' name='makhoa' readonly></td>";
								echo "<td><input value='$row[MaLop]' name='malop' readonly></td>";
								
								$str_laytenbm = "select * from bomon where MaBM='$row[MaBM]'";
								$kq_laytenbm = mysqli_query($conn, $str_laytenbm);
								$row3 = mysqli_fetch_array($kq_laytenbm);
								echo "<td><input value='$row3[TenBM]' name='tenbm' readonly></td>";
																

															 
								echo "<td><select name='giaovienpt'>";
								$str_laygv = "select * from user where LoaiUser='2'";
								$kq_laygv = mysqli_query($conn, $str_laygv);
								while($row1 = mysqli_fetch_array($kq_laygv))
								{
									if($row[MaGV]==$row1[MaUser])
									{
										echo "<option value='$row1[MaUser]' selected>$row1[HoTen]</option>";
									}
									else
									{
										echo "<option value='$row1[MaUser]'>$row1[HoTen]</option>";
									}
								}
								echo "<select></td>";
								
								echo "<td><select name='tinchi'>";
								echo "<optgroup label='Tín chỉ hiện tại'>
								<option value='$row[SoTinChi]' selected>$row[SoTinChi]</option>
								</optgroup>";
								
								echo "<optgroup label='Chọn mới tín chỉ'>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option></optgroup>
								</select>
								</td>";
								
								
								echo "<td><select name='tinhtrang'>";
								echo "<optgroup label='Tình trạng hiện tại'>
								<option value='$row[TinhTrang]' selected>$row[TinhTrang]</option>
								</optgroup>";
									
								echo "<optgroup label='Chọn tình trạng mới'>
								<option value='Đang hoạt động'>Đang hoạt động</option>
								<option value='Ngừng hoạt động'>Ngừng hoạt động</option><optgroup>
								</select>
								</td>";
								
								echo "<td><input class='Up btn btn-success' value='Cập nhật' type='button'></td>";
								echo "</tr>";
							}
						?>
						
					</tbody>
				</table>
				
				</form>
			</div>
		</div>
	</div>
<script>
$(document).ready(function() {
	$(".Up").click(function(){
		var makhoa = $(this).closest("tr").find("input[name='makhoa']").val();
		var giaovienpt = $(this).closest("tr").find("select[name='giaovienpt']").val();
		var tengv = $(this).closest("tr").find("select[name='giaovienpt'] :selected").text(); 
		var tinchi = $(this).closest("tr").find("select[name='tinchi']").val();
		var tinhtrang = $(this).closest("tr").find("select[name='tinhtrang']").val();
		
		if(confirm("Bạn muốn cập nhật khóa có mã '"+makhoa+"' với giáo viên "+tengv+" số tín chỉ "+tinchi+" tình trạng "+tinhtrang))
		{
			$.post("admin-capnhatkhoa-ajax.php", { makhoa:makhoa, giaovienpt:giaovienpt, tinchi:tinchi, tinhtrang:tinhtrang },
			function(data,status){
				if(status=="success")
				{
					alert("Cập nhật thành công khóa có mã "+makhoa);
					location.reload();
				}
			});
		}
		else
		{
			alert("Bạn đã chọn Hủy");
		}
	});
	
});
	
</script>	
  

<?php require("footer.php") ?>