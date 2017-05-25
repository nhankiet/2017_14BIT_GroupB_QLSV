	<?php require("header.php"); ?>
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="css/style.css">
	
</head>




<body>
    <?php 
		require("topnavbar.php");
		if(isset($_SESSION[userid]))
			header("Location:index.php");
	
	?>

    
   
  
  <div class="wrapper">
    <form class="form-signin" action="login-proc.php" method="post">       
      <h2 class="form-signin-heading">Mời đăng nhập</h2>
      <input type="text" class="form-control" name="bhktusername" placeholder="Email" required="" autofocus />
      <input type="password" class="form-control" name="bhktpass" placeholder="Mật khẩu" required=""/>      

      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>   
    </form>
 </div>


<?php
	if($_SESSION["useremail"]==="SAI")
	{
		echo "<script>alert('Tài khoản hoặc mật khẩu không khớp. Vui lòng nhập lại!');</script>";
	}
	unset($_SESSION["useremail"]);
?>



<?php require("footer.php") ?>