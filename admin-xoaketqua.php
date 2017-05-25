	<?php require("header.php"); ?>
	<title>Xóa kết quả - Admin</title>
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
   		<div class"row">
			<h3 class="text-center">Chọn khóa</h3>
   			<select class="input-lg center-block" id="chonkhoa">
				<?php
					$str_laylop = "select * from khoa";
					$kq_laylop = mysqli_query($conn, $str_laylop);
					while($row3 = mysqli_fetch_array($kq_laylop))
					{
						echo "<option value='$row3[MaKhoa]'>$row3[MaKhoa]</option>";
					}
				?>
			</select>
		</div> 
  		<hr><hr>
   		<div class="row">
   			<div class="col-lg-12">
				<form class="" action="" method="post">
				
				<table class="table table-hover">
					<thead>
						<th><label>Mã khóa</label></th>
						<th><label>MSSV - Họ Tên</label></th>
						<th><label>Lớp</label></th>
						<th><label>Điểm tổng kết</label></th>
						<th><label>Kết quả</label></th>
					</thead>
					
					
					<tbody id="landing">
						
						
					</tbody>
				</table>
				
				</form>
			</div>
		</div>
	</div>
	
<script>
$(document).ready(function() {
	$("#chonkhoa").change(function(){
		var khoa = $(this).val();
		$.post("admin-xoaketqua-ajax2.php", { khoa:khoa }, function(data,status){
			if(status=="success")
			{
				$("#landing").html(data);
				$(".Xoa").click(function() {
					var makhoa = $(this).attr("data-makhoa");
					var mauser = $(this).attr("data-mauser");
					var malop = $(this).attr("data-malop");
					var general = $(this).attr("alt");

					if(confirm("Bạn có thực sự muốn xóa kết quả sau: "+general))
					{
						$(this).parent().parent().remove();
						$.post("admin-xoaketqua-ajax.php", { makhoa:makhoa, mauser:mauser, malop:malop }, function(data,status){
							if(status=="success")
							{
								alert("Xóa thành công kết quả "+general);
							}
						}); 
					}
					else
					{
						alert ("Bạn đã chọn hủy");
					}
				});
			}
			else
			{
			
			}

		});
	});
	
	
});
	
</script>	
  

<?php require("footer.php") ?>