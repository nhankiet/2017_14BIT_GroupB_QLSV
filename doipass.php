	<?php require("header.php"); ?>
	<title>Đổi mật khẩu nhập</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php 
		require("topnavbar.php");
		if(!isset($_SESSION[userid]))
			header("Location:index.php");
		
	
	?>

    
   
  
  <div class="wrapper">
    <form class="form-signin" action="doipass.php" method="post">       
      <h2 class="form-signin-heading">Đổi mật khẩu</h2>
      <input type="password" class="form-control" name="newpass1" placeholder="Mật khẩu mới" required autofocus require pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Tối thiểu là 8 ký tự, trong đó yêu cầu ít nhất 1 ký tự viết hoa, ít nhất 1 ký tự viết thường và ít nhất 1 chữ số."/>
      <input type="password" class="form-control" name="newpass2" placeholder="Xác nhận mật khẩu mới" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Tối thiểu là 8 ký tự, trong đó yêu cầu ít nhất 1 ký tự viết hoa, ít nhất 1 ký tự viết thường và ít nhất 1 chữ số."/>      
	  <input type="password" class="form-control" name="oldpass" placeholder="Mật khẩu hiện tại" required
   	  /> 
     
      <input class="Chn btn btn-lg btn-primary btn-block" type="submit" value="Đổi mật khẩu" name="CHN">  
	  <button class="btn btn-lg btn-default center-block btn-block" type="reset">Reset</button>
    </form>
 </div>

<<<<<<< HEAD
<!--<script>
	$(document).ready(function(){
		$(".Chn").click(function(){
			var oldpass = $("input[name='oldpass']").val();
			var newpass1 = $("input[name='newpass1']").val();
			var newpass2 = $("input[name='newpass2']").val();
			$.post("doipass-proc.php", { oldpass: oldpass, newpass1: newpass1, newpass2: newpass2 }, function(data, status){
				if(status=="success")
				{
					alert("Đổi mật khẩu thành công");
					location.reload();
				}
				else
					alert("Đổi mật khẩu thất bại!");
			});
		});
	});
</script>-->
=======

>>>>>>> 01c5bb40e4046381533c7dd214315c05dc3368c3
<?php
	if(isset($_POST["CHN"])&&($_POST["CHN"]=="Đổi mật khẩu"))
	{	
		$oldpass = $_POST["oldpass"];
		$newpass1 = $_POST["newpass1"];
		$newpass2 = $_POST["newpass2"];

		$str_laythongtinuser = "select * from user where MaUser='$_SESSION[userid]'";
		$kq_laythongtinuser = mysqli_query($conn, $str_laythongtinuser);
		$row = mysqli_fetch_array($kq_laythongtinuser);

		if($oldpass==$row[MatKhau])
		{
			if($newpass1==$newpass2)
			{
				$str_doimatkhau = "update user set MatKhau='$newpass1' where MaUser='$row[MaUser]'";
				mysqli_query($conn, $str_doimatkhau);
				echo "<script>alert('Đổi mật khẩu thành công!')</script>";
			}
			else
				echo "<script>alert('Mật khẩu mới và mật khẩu xác nhận chưa giống nhau, thất bại')</script>";
		}
		else
		{
			echo "<script>alert('Sai mật khẩu hiện tại!')</script>";
		}
		
	}
?>




<?php require("footer.php") ?>