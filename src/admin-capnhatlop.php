	<?php require("header.php"); ?>
	<title>Cập nhật lớp - Admin</title>
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
			$malop = $_POST["malop"];
			$loptruong = $_POST["loptruong"];
			$str_capnhatlop = "update lop set LopTruong='$loptruong' where MaLop='$malop'";
			mysqli_query($conn, $str_capnhatlop);
		}
	?>

  	
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-12">
				<form class="" action="admin-capnhatlop.php" method="post">
				
				<table class="table table-hover">
					<thead>
						<th><label>Mã lớp</label></th>
						<th><label>Chọn lớp trưởng mới &emsp;&emsp; - &emsp;&emsp; Lớp trưởng hiện tại</label></th>
					</thead>
					
					
					<tbody>
						<tr>
							<td><select name="malop" class="input-lg" id="chonlop" required>
							<?php
								$str_laymalop = "select * from lop";
								$kq_laymalop = mysqli_query($conn, $str_laymalop);
								while($row1 = mysqli_fetch_array($kq_laymalop))
								{
									echo "<option value='$row1[MaLop]'>$row1[MaLop]</option>";
								}
							?>
							</select></td>
							
							<td id="landing">
							
							</td>	
							
						</tr>
					</tbody>
				</table>
				<input class="btn btn-success center-block btn-lg" value="Thêm" name="THEM" type="submit">				
				</form>
			</div>
		</div>
	</div>
	
<script>
$(document).ready(function() {
	$("#chonlop").change(function(){
		var malop = this.value;
			$.post("admin-capnhatlop-ajax.php", { malop:malop }, function(data, status){
			if(status=="success")
			{
				$("#landing").html(data);	
			}
			});
	});
});
	
</script>	
  

<?php require("footer.php") ?>