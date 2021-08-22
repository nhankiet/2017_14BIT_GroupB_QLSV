	<?php require("header.php"); ?>
	<title>Xóa User - Admin</title>
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
   		<div class"row">
			<h3 class="text-center">Chọn nhóm User</h3>
   			<select class="input-lg center-block" id="chonnhomuser">
				<option value="tc">Tất cả</option>
				<option value="gv">Giảng viên</option>
				<optgroup label="Lớp">
				<?php
					$str_laylop = "select * from lop";
					$kq_laylop = mysqli_query($conn, $str_laylop);
					while($row2 = mysqli_fetch_array($kq_laylop))
					{
						echo "<option value='$row2[MaLop]'>$row2[MaLop]</option>";
					}
				?>
				</optgroup>	
			</select>
		</div> 
  		<hr><hr>
   		<div class="row">
   			<div class="col-lg-12">
   			
				<form class="" action="" method="post">
				<table class="table table-hover">
					<thead>
						<th><label>Hình ảnh</label></th>
						<th><label>Mã user</label></th>
						<th><label>Họ tên</label></th>
						<th><label>Phái</label></th>
						<th><label>Ngày sinh</label></th>
						<th><label>Loại user</label></th>
						<th><label>Email</label></th>
						<th><label>Tình trạng</label></th>
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

	
	$("#chonnhomuser").change(function(){
		var loaiuser = $(this).val();
		$.post("admin-xoanguoidung-ajax.php", { loaiuser:loaiuser }, function(data,status){
				if(status=="success")
				{
					$("#landing").html(data);

					$(".Xoa2").click(function(){
						var mauser = $(this).attr("name");
						var htuser = $(this).attr("alt");

						if(confirm("Bạn có thực sự muốn user "+htuser))
						{
							$(this).parent().parent().remove();
							$.post("admin-xoanguoidung-ajax2.php", { mauser:mauser }, function(data,status){
								if(status=="success")
								{
									alert("Xóa thành công user "+htuser);
								}
							}); 
						}
						else
						{
							alert ("Bạn đã chọn hủy");
						}
					});
				}
			}); 
		
	});
	
});
	
</script>	
  

<?php require("footer.php") ?>