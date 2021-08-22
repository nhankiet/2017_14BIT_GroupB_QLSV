	<?php require("header.php"); ?>
	<title>Trang thông tin cá nhân - Profile</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php require("topnavbar.php") ?>
    <?php
		if( !(isset($_SESSION["userid"])) )
			header("Location:index.php");
	?>
  	<hr><hr><hr>
  	<?php
		$masv = $_SESSION["userid"];
		$str_laythongtin = "select * from user where MaUser='$masv'";
		$kq_laythongtin = mysqli_query($conn, $str_laythongtin);
		$row1 = mysqli_fetch_array($kq_laythongtin);
	?>
	
	<div class="col-md-3 col-lg-3 " align="center"> 
		<img src="<?php echo "$row1[HinhAnh]"; ?>" class="img-circle" width="304" height="236" alt="User Pic">


		<div>Để đổi ảnh đại diện, dán link ảnh mới vào ô dưới và ấn cập nhật.<br>Dưới đây là một số host miễn phí.</div>
  		<ul>
			<li>http://imgur.com/</li>
			<li>http://tinypic.com/</li>
			<li>https://postimage.org/</li>
			<li>https://imgsafe.org/</li>
		</ul>
   		<input name="capnhatanh" class="input-lg" placeholder="Link ảnh" id="linkanh">
   		<input class="btn btn-primary" id="capnhatanh" value="Cập nhật">
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

<script>
	$(document).ready(function(){
		$("#capnhatanh").click(function(){
			var linkanh = $("#linkanh").val();
			if(linkanh.length>7)
			{
				$.post("capnhatanh.php", { linkanh:linkanh }, function(data, status){
					if(status=="success")
					{
						alert("Cập nhật ảnh thành công");
						location.reload();
					}
					else
					{
						alert("Cập nhật ảnh thất bại!");
						location.reload();
					}
				});
			}
			else
			{
				alert("URL quá ngắn, không hợp lệ");		
			}
		});
	});
</script>	
<?php require("footer.php") ?>