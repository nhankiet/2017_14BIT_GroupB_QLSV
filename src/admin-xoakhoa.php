	<?php require("header.php"); ?>
	<title>Xóa khóa - Admin</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 1) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
  	


  	
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-12">
				<form class="" action="" method="post">
				
				<table class="table table-hover">
					<thead>
						<th><label>Mã khóa</label></th>
						<th><label>Mã lớp</label></th>
						<th><label>Bộ môn</label></th>
						<th><label>Giáo viên</label></th>
						<th><label>Số tín chỉ</label></th>
					</thead>
					
					
					<tbody>
						<?php
							$str_laykhoa = "select * from khoa";
							$kq_laykhoa = mysqli_query($conn, $str_laykhoa);
							while($row = mysqli_fetch_array($kq_laykhoa))
							{	
								echo "<tr>";
								echo "<td>$row[MaKhoa]</td>";
								echo "<td>$row[MaLop]</td>";
								
								$str_laythongtinbm = "select * from bomon where MaBM='$row[MaBM]'";
								$kq_laythongtinbm = mysqli_query($conn, $str_laythongtinbm);
								$row1 = mysqli_fetch_array($kq_laythongtinbm);
								echo "<td>$row1[TenBM]</td>";
																
								$str_laythongtingv = "select * from user where MaUser='$row[MaGV]'";
								$kq_laythongtingv = mysqli_query($conn, $str_laythongtingv);
								$row2 = mysqli_fetch_array($kq_laythongtingv);
								echo "<td>$row2[HoTen]</td>";
								
								echo "<td>$row[SoTinChi]</td>";
								echo "<td><input name='$row[MaKhoa]' class='Xoa btn btn-danger' value='Xóa' type='button'></td>";
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
	$(".Xoa").click(function() {
		var makhoa = $(this).attr("name");
		if(confirm("Bạn có thực sự muốn xóa khóa "+makhoa))
		{
			$(this).parent().parent().remove();
			$.post("admin-xoakhoa-ajax.php", { makhoa:makhoa }, function(data,status){
				if(status=="success")
				{
					alert("Xóa thành công khóa "+makhoa);
				}
			}); 
		}
		else
		{
			alert ("Bạn đã chọn hủy");
		}
	});
});
	
</script>	
  

<?php require("footer.php") ?>