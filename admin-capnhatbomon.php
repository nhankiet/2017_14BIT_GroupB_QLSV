	<?php require("header.php"); ?>
	<title>Cập nhật bộ môn - Admin</title>
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
						<th><label>Chọn giáo viên phụ trách</label></th>
					</thead>
					
					
					<tbody>
						<?php
							$str_laybm = "select * from bomon";
							$kq_laybm = mysqli_query($conn, $str_laybm);
							while($row = mysqli_fetch_array($kq_laybm))
							{	
								echo "<tr>";
								echo "<td><input value='$row[MaBM]' name='mabm' readonly></td>";
								echo "<td><input value='$row[TenBM]' name='tenbm' required></td>";
								echo "<td><input value='$row[Phong]' name='phong' required></td>";
								
															 
								echo "<td><select name='giaovienpt' class='chongv'>";
								$str_laygv = "select * from user where LoaiUser='2'";
								$kq_laygv = mysqli_query($conn, $str_laygv);
								while($row1 = mysqli_fetch_array($kq_laygv))
								{
									if($row[GVPhuTrach]==$row1[MaUser])
									{
										echo "<option value='$row1[MaUser]' selected>$row1[HoTen]</option>";
									}
									else
										echo "<option value='$row1[MaUser]'>$row1[HoTen]</option>";
								}
								echo "<select></td>";
								

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
		var mabm = $(this).closest("tr").find("input[name='mabm']").val();
		var tenbm = $(this).closest("tr").find("input[name='tenbm']").val();
		var phong = $(this).closest("tr").find("input[name='phong']").val();
		var giaovienpt = $(this).closest("tr").find("select[name='giaovienpt']").val();
		var tengv = $(this).closest("tr").find("select[name='giaovienpt'] :selected").text(); 
		if(confirm("Bạn muốn cập nhật bộ môn có mã '"+mabm+"' với tên "+tenbm+" phòng "+phong+" giáo viên "+tengv))
		{
			$.post("admin-capnhatbomon-ajax.php", { mabm:mabm, tenbm:tenbm, phong:phong, giaovienpt:giaovienpt },
			function(data,status){
				if(status=="success")
				{
					alert("Cập nhật thành công bộ môn có mã "+mabm+" tên: "+tenbm);	
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