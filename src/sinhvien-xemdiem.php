	<?php require("header.php"); ?>
	<title>Xem điểm - Sinh viên</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 3) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
 
  	
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-12">
				<h1 class="text-center">Kết quả</h1>
				<hr><hr>	
				<?php
					$masv = $_SESSION["userid"];
					$str_laythongtin = "select * from user where MaUser='$masv'";
					$kq_laythongtin = mysqli_query($conn, $str_laythongtin);
					$row1 = mysqli_fetch_array($kq_laythongtin);
				?>
				
				<div class="col-lg-4"><h4>MSSV: <?php echo"$row1[MaUser]"; ?></h4></div>
				<div class="col-lg-4"><h4>Họ tên: <?php echo"$row1[HoTen]"; ?></h4></div>
				<div class="col-lg-4"><h4>Lớp: <?php echo"$row1[MaLop]"; ?></h4></div>
					
				<hr><hr><hr><hr>		
				<table class="table table-bordered">
					<thead>
						<th><label>STT</label></th>
						<th><label>Mã khóa</label></th>
						<th><label>Tên bộ môn</label></th>
						<th><label>Điểm tổng kết</label></th>
						<th><label>Kết quả</label></th>
					</thead>
					
					<tbody>
					<?php
						$str_laydiem = "select * from kqkhoa where MaSV=$masv";
						$kq_laydiem = mysqli_query($conn, $str_laydiem);
						$tongdiem=0;
						$i=0;
						while($row2 = mysqli_fetch_array($kq_laydiem))
						{
							$j=$i+1;
							echo "<tr>";
							echo "<td>$j</td>";
							echo "<td><div class='btn btn-default btn-lg'>$row2[MaKhoa]</div></td>";
							
							$str_laymabm = "select MaBM from khoa where MaKhoa='$row2[MaKhoa]'";
							$kq_laymabm = mysqli_query($conn, $str_laymabm);
							$row3 = mysqli_fetch_array($kq_laymabm);
							
							$str_laytenbm = "select * from bomon where MaBM=$row3[MaBM]";
							$kq_laytenbm = mysqli_query($conn, $str_laytenbm);
							$row4 = mysqli_fetch_array($kq_laytenbm);
							
							echo "<td><div class='btn btn-primary btn-lg'>$row4[TenBM]</div></td>";
							
							if($row2[DiemTongKet]>=5)
								echo "<td><div class='btn btn-primary btn-lg'>$row2[DiemTongKet]</div></td>";
							else
								echo "<td><div class='btn btn-danger btn-lg'>$row2[DiemTongKet]</div></td>";
							
							if($row2[KetQua]=="Đạt")
								echo "<td><div class='btn btn-success btn-lg'>$row2[KetQua]</div></td>";
							else
								echo "<td><div class='btn btn-danger btn-lg'>$row2[KetQua]</div></td>";
							echo "</tr>";
							$i++;
							$tongdiem+=$row2[DiemTongKet];
						}
						if($i!==0)
						{
							$dtb = $tongdiem/$i;
						}
					?>
					</tbody>
				</table>
				
				<hr><hr><hr>
				<div class="col-md-6">
					<h3>Điểm trung bình: </h3>
				</div>
				<div class="col-md-6">	
					<?php 
						if($dtb>=5)
							echo "<input class='btn btn-success btn-lg' value='$dtb' readonly>";
						else
							echo "<input class='btn btn-danger btn-lg' value='$dtb' readonly>";
					
					?>
		        </div>
				
			</div>
		</div>
	</div>
	
  

<?php require("footer.php") ?>