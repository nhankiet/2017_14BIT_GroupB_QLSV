	<?php require("header.php"); ?>
	<title>Cập nhật User - Admin</title>
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
   			<div class="col-lg-12" id="landing">
   				
<!--				<table class="table table-responsive">
					<thead>
						<th><label>Hình ảnh</label></th>
						<th><label>Họ tên</label></th>
						<th><label>Phái</label></th>
						<th><label>Ngày sinh</label></th>
						<th><label>Email</label></th>
						<th><label>Password</label></th>
						<th><label>Lớp</label></th>
						<th><label>Tình trạng</label></th>
					</thead>
					
					
					<tbody>

						
					</tbody>
				</table>-->
				
			</div>
		</div>
	</div>
<script>
$(document).ready(function() {

	
	$("#chonnhomuser").change(function(){
		var loaiuser = $(this).val();
		$.post("admin-capnhatnguoidung-ajax.php", { loaiuser:loaiuser }, function(data,status){
				if(status=="success")
				{
					$("#landing").html(data);

					$(".Up").click(function(){
						var mauser = $(this).attr("name");
						var hinhanh = $(this).closest("tr").find("input[name='hinhanh']").val();
						var hoten = $(this).closest("tr").find("input[name='hoten']").val();
						var phai = $(this).closest("tr").find("select[name='phai']").val();
						var ngaysinh = $(this).closest("tr").find("input[name='ngaysinh']").val();
						var email = $(this).closest("tr").find("input[name='email']").val();
						var matkhau = $(this).closest("tr").find("input[name='matkhau']").val();
						var tinhtrang = $(this).closest("tr").find("select[name='tinhtrang']").val();
						var malop = $(this).closest("tr").find("select[name='malop']").val();
						var sdt = $(this).closest("tr").find("input[name='sdt']").val();
						var diachi = $(this).closest("tr").find("input[name='diachi']").val();
						
						if(confirm("Bạn có thực sự muốn cập nhật user "+hoten+" ngày sinh: "+ngaysinh))
						{
							$.post("admin-capnhatnguoidung-ajax2.php", { mauser:mauser, hinhanh:hinhanh, hoten:hoten, phai:phai, ngaysinh:ngaysinh, email:email, matkhau:matkhau, tinhtrang:tinhtrang, malop:malop, sdt:sdt, diachi:diachi }, function(data,status){
								if(status=="success")
								{
									alert("Cập nhật thành công user "+hoten);
									location.reload();
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