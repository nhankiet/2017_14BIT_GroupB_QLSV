<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Trang chủ</a>
	
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav keotrai">
				
				<li>
					<a href="gioithieu.php">Giới thiệu</a>
				</li>
				<li>
					<a href="tintuc.php">Tin tức</a>
				</li>
				<li>
					<a href="lienhe.php">Liên hệ</a>
				</li>
				<?php
					if(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 1)
						echo "<li><a href='panel-admin.php'>Bảng Điều Khiển - Admin</a></li>";
					if(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 2)
							echo "<li><a href='panel-giangvien.php'>Bảng Điều Khiển - Giảng viên</a></li>";
					if(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 3)
							echo "<li><a href='panel-sinhvien.php'>Bảng Điều Khiển - Sinh viên</a></li>";
				?>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<li>
					<?php
						if(!isset($_SESSION["userid"]))
							echo "<a href='login.php'>Đăng Nhập</a>";
						else		
							echo "<a href='logout.php'>Đăng Xuất</a>";
					?>
				</li>

			</ul>
		</div>
	</div>
</nav>