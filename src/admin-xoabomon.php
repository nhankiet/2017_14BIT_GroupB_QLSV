	<?php require("header.php"); ?>
	<title>Xóa bộ môn - Admin</title>
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
						<th><label>Mã bộ môn</label></th>
						<th><label>Tên bộ môn</label></th>
						<th><label>Phòng</label></th>
						<th><label>SĐT</label></th>
						<th><label>Giáo viên phụ trách</label></th>
					</thead>
					
					
					<tbody>
						<?php
							$str_laybm = "select * from bomon";
							$kq_laybm = mysqli_query($conn, $str_laybm);
							while($row = mysqli_fetch_array($kq_laybm))
							{	
								echo "<tr>";
								echo "<td>$row[MaBM]</td>";
								echo "<td>$row[TenBM]</td>";
								echo "<td>$row[Phong]</td>";
								echo "<td>$row[SoDienThoai]</td>";
								
								$str_laytengv = "select * from user where MaUser='$row[GVPhuTrach]'";
								$kq_laytengv = mysqli_query($conn, $str_laytengv);
								$row3 = mysqli_fetch_array($kq_laytengv);
								echo "<td>$row3[HoTen]</td>";
								
								echo "<td><input name='$row[MaBM]' class='Xoa btn btn-danger' value='Xóa' type='button' alt='$row[TenBM]'></td>";
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
		var mabm = $(this).attr("name");
		var tenbm = $(this).attr("alt");
		if(confirm("Bạn có thực sự muốn xóa bộ môn "+tenbm))
		{
			$(this).parent().parent().remove();
			$.post("admin-xoabomon-ajax.php", { mabm:mabm }, function(data,status){
				if(status=="success")
				{
					alert("Xóa thành công bộ môn "+tenbm);
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