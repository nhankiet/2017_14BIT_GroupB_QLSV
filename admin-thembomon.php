	<?php require("header.php"); ?>
	<title>Thêm bộ môn - Admin</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 1) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
  	
  	<?php
		if(isset($_POST["THEM"])&&($_POST["THEM"]=="Thêm"))
		{
			$tenbomon = $_POST["tenbomon"];
			$phong = $_POST["phong"];
			$giaovienpt = $_POST["giaovienpt"];
			$sdt = $_POST["gvsdt"];
			$str_thembomon = "insert into bomon(TenBM, Phong, GVPhuTrach, SoDienThoai) values('$tenbomon', '$phong', '$giaovienpt', '$sdt')";
			mysqli_query($conn, $str_thembomon);
		}
	?>
	
  	
   	<div class="container">
  		  		
   		<div class="row">
   			<div class="col-lg-12">
				<form class="" action="admin-thembomon.php" method="post">
				
				<table class="table table-hover">
					<thead>
						<th><label>Tên bộ môn</label></th>
						<th><label>Phòng</label></th>
						<th><label>Giáo viên phụ trách</label></th>
						<th><label>Số Điện Thoại</label></th>
					</thead>
					
					
					<tbody>
						<tr>
							<td><input class="input-lg" placeholder="Điền tên bộ môn" name="tenbomon" required=""></td>
							<td><input class="input-lg" placeholder="Điền phòng" name="phong" required=""></td>
							<td>
								<select name="giaovienpt" class="input-lg" id="chongv">
								<?php
									$str_laygiaovienpt = "select * from user where LoaiUser='2' and TinhTrang='Đang hoạt động'";
									$kq_laygiaovienpt = mysqli_query($conn, $str_laygiaovienpt);
									while($row = mysqli_fetch_array($kq_laygiaovienpt))
									{
										echo "<option value='$row[MaUser]'>$row[HoTen]</option>";
									}
								?>	
								 </select> 
							</td>
							<td><input class='input-lg' name='gvsdt' id='gvsdt' readonly></td>
						</tr>
					</tbody>
				</table>
				<input class="btn btn-success center-block btn-lg" value="Thêm" name="THEM" type="submit">
				</form>
			</div>
		</div>
	</div>
	
    <script>
		$(document).ready(function(){
			$("#chongv").change(function(){
				var magv2 = this.value;
				$.post("admin-thembomon-ajax.php", { magv2:magv2 }, function(data, status){
				if(status=="success")
				{
					$("#gvsdt").val(data);	
				}
				});
			});
		});
	</script>  

<?php require("footer.php") ?>