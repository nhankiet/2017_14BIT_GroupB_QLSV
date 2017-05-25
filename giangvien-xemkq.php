	<?php require("header.php"); ?>
	<title>Xem kết quả - Giảng viên</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 2) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
  	


  	
   	<div class="container">
   	  	<div class="row">
				<div class="col-lg-2">&nbsp;</div>
				<div class="col-lg-8">
					<div class="alert alert-warning alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Lưu ý:</strong><br>_ Giảng viên chỉ có thể xem kết quả cho các khóa mà mình dạy.
						<br>
						_ Những sinh viên chưa có kết quả sẽ không hiện ra.
					</div>
					</div>
				<div class="col-lg-2">&nbsp;</div>
		</div>
   		<div class"row">
			<h3 class="text-center">Chọn khóa</h3>
   			<select class="input-lg center-block" id="chonkhoa">
				<?php
					$str_laylop = "select * from khoa where MaGV='$_SESSION[userid]'";
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
	var khoa = $("#chonkhoa").val();
	$.post("giangvien-xemkq-ajax.php", { khoa:khoa }, function(data,status){
		if(status=="success")
		{
			$("#landing").html(data);
		}
	});	
	$("#chonkhoa").change(function(){
		var khoa = $(this).val();
		$.post("giangvien-xemkq-ajax.php", { khoa:khoa }, function(data,status){
			if(status=="success")
			{
				$("#landing").html(data);
			}
		});
	});
	
	
});
	
</script>	
  

<?php require("footer.php") ?>