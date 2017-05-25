	<?php require("header.php"); ?>
	<title>Xóa lớp - Admin</title>
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
						<th><label>Mã lớp</label></th>
						<th><label>Lớp trưởng</label></th>
					</thead>
					
					
					<tbody>
						<?php
							$str_laymalop = "select * from lop";
							$kq_laymalop = mysqli_query($conn, $str_laymalop);
							while($row1 = mysqli_fetch_array($kq_laymalop))
							{	
								$str_laytenlt = "select HoTen from user where MaUser='$row1[LopTruong]'";
								$kq_laytenlt = mysqli_query($conn, $str_laytenlt);
								$row2 = mysqli_fetch_array($kq_laytenlt);
								echo "<tr>";
								echo "<td><input name='malop' class='input-lg' readonly value='$row1[MaLop]'></td>";
								
								if(isset($row2[HoTen]))
									echo "<td><input name='loptruong' class='input-lg' readonly value='$row2[HoTen]'></td>";
								else
									echo "<td><input name='loptruong' class='input-lg' readonly value='(Chưa có lớp trưởng)'></td>";
								
								echo "<td><input name='$row1[MaLop]' class='Xoa btn btn-danger' value='Xóa' type='button'></td>";
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
		var malop = $(this).attr("name");
		if(confirm("Bạn có thực sự muốn xóa lớp "+malop))
		{
			$(this).parent().parent().remove();
			$.post("admin-xoalop-ajax.php", { malop:malop }, function(data,status){
				if(status=="success")
				{
					alert("Xóa thành công lớp "+malop);
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