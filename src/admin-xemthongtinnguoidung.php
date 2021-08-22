	<?php require("header.php"); ?>
	<title>Trang xem thông tin người dùng - Admin</title>
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
		$masv = $_GET["ID"];
		$str_laythongtin = "select * from user where MaUser='$masv'";
		$kq_laythongtin = mysqli_query($conn, $str_laythongtin);
		$row1 = mysqli_fetch_array($kq_laythongtin);
	?>
	
	<div class="col-md-3 col-lg-3 " align="center"> 
		<img src="<?php echo "$row1[HinhAnh]"; ?>" class="img-circle" width="304" height="236" alt="User Pic">

    </div>
	<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo "$row1[HoTen]"; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">


                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Mã số sinh viên:</td>
                        <td><?php echo "$row1[MaUser]"; ?></td>
                      </tr>
                      <tr>
                        <td>Lớp</td>
                        <td><?php echo "$row1[MaLop]"; ?></td>
                      </tr>
                      <tr>
                        <td>Ngày sinh</td>
                        <td><?php echo "$row1[NgaySinh]"; ?></td>
                      </tr>
                   
                      <tr>
                      <tr>
                        <td>Giới tính</td>
                        <td><?php 
							if($row1[Phai]==0)
								echo "Nữ";
							else
								echo "Nam";
							?>
                        </td>
                      </tr>
                        <tr>
                        <td>Địa chỉ</td>
                        <td><?php echo "$row1[DiaChi]"; ?></td>
                      </tr>
                      <tr>
						<td>Loại user</td>
						<td><?php 
							if($row1[LoaiUser]==1)
								echo "Admin";
							elseif($row1[LoaiUser]==2)
								echo "Giảng viên";
							else
								echo "Sinh viên";
							?>
						</td>
					  </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo "$row1[Email]"; ?></td>
                      </tr>
                      <tr>
						<td>Tình trạng</td>
						<td><?php echo "$row1[TinhTrang]"; ?></td>
					  </tr>
                        <td>Điện thoại</td>
                        <td><?php echo "$row1[SoDienThoai]"; ?></td>
                           
                      </tr>
                     
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    

	<?php
	if($row1[LoaiUser]==3)
	echo "
	<div class='container'>
    	<div class='col-lg-3'>
			<a href='admin-xemdiemsinhvien.php?ID=$row1[MaUser]'>
    		<div class='btn btn-success btn-lg'>
					Xem kết quả của sinh viên này
			</div>
			</a>
		</div>
	</div>
	";
			?>



    
<?php require("footer.php") ?>