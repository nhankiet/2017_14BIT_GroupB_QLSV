	<?php require("header.php"); ?>
	<title>Gửi yêu cầu - Sinh viên</title>
	<link rel="stylesheet" href="css/style.css">

</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 3) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
  	<?php
		$masv = $_SESSION["userid"];
		if(isset($_POST["THEM"])&&($_POST["THEM"]=="GỬI YÊU CẦU"))
		{
			$loai = $_POST["loai"];
			$tieude = $_POST["tieude"];
			$noidung = $_POST["noidung"];

			$str_laymayc = "select count(*) from yeucau";
			$kq_laymayc = mysqli_query($conn, $str_laymayc);
			$somayc = mysqli_fetch_array($kq_laymayc);

			$mayc = "YC".sprintf("%08d", $somayc[0]+1);


			$str_guiyeucau = "insert into yeucau(MaYC, MaUser, Loai, TieuDe, NoiDung, TrangThai) values('$mayc', '$masv', '$loai', '$tieude', '$noidung', '0');";
			mysqli_query($conn, $str_guiyeucau);

			$str_guiyeucau = NULL;
			unset($mayc, $masv, $loai, $tieu, $noidung, $str_laymayc, $str_guiyeucau);
			header('Refresh: 0');

		}


	?>


   	<div class="container">
   		<div class="row">
   			<div class="col-lg-12">
   				<form class="" action="sinhvien-guiyeucau.php" method="post" onSubmit="return confirm('Bạn muốn gửi yêu cầu này?');">

   				<h1 class="text-center">Gửi yêu cầu</h1>
				<hr><hr>
   				<div class="row">
					<div class="col-lg-3">&nbsp;</div>
					<div class="col-lg-6">
						<h3 class="text-center">Chọn loại yêu cầu</h3>
						<select class="center-block btn btn-lg btn-block" name="loai">
							<option value="Xin nghỉ học">Xin nghỉ học</option>
							<option value="Xin tạm hoãn học tập và bảo lưu kết quả">Xin tạm hoãn học tập và bảo lưu kết quả</option>
							<option value="Xin giấy xác nhận sinh viên">Xin giấy xác nhận sinh viên</option>
							<option value="Xin phúc khảo">Xin phúc khảo</option>
							<option value="Xin có ý kiến đóng góp">Xin có ý kiến đóng góp</option>
							<option value="Khác">Khác</option>
						</select>
					</div>
					<div class="col-lg-3">&nbsp;</div>

					<hr><br>
					<hr><hr>

					<div class="col-lg-3">&nbsp;</div>
					<div class="col-lg-6">
						<h3 class="text-center">Nhập tiêu đề</h3>
						<input required class="input-lg center-block btn-block" name="tieude" placeholder="Nhập tiêu đề của yêu cầu"/>
					</div>
					<div class="col-lg-3">&nbsp;</div>


					<hr><br>
					<hr><hr>

					<div class="col-lg-2">&nbsp;</div>
					<div class="col-lg-8">
						<h3 class="text-center">Nhập nội dung</h3>
						 <textarea class="form-control" rows="18" name="noidung" placeholder="Nội dung chi tiết yêu cầu" required></textarea>
					</div>
					<div class="col-lg-2">&nbsp;</div>

					<br><br><hr>

					<div class="col-lg-3">&nbsp;</div>
					<div class="col-lg-6">
						<input class="btn btn-success btn-block center-block btn-lg" value="GỬI YÊU CẦU" name="THEM" type="submit">
					</div>
					<div class="col-lg-3">&nbsp;</div>


					</form>
				</div>
			</div>
		</div>
	</div>



<?php require("footer.php") ?>
