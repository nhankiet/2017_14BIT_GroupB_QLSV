<?php require("header.php"); ?>
	<title>Trang chủ</title>
</head>


<body id="page-top" class="index">
    <?php require("topnavbar.php"); ?>


    <header id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://web.hcmus.edu.vn/images/stories/cachoatdong/keuka.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Lễ tốt nghiệp cử nhân năm 2014</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://www.itec.hcmus.edu.vn/vn/images/stories/thuvienanh/20160725_Cycle7_ITSM_Indra/IMG_0294.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Một buổi học thực hành với giảng viên nước ngoài</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://www.itec.hcmus.edu.vn/vn/images/stories/thuvienanh/20160725_Cycle7_ITSM_Indra/IMG_0291.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Cùng nhau khám phá những tri thức mới</h2>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
    
   
    <div class="container">
        <div class="row">
            <div class="col-lg-12 center-block">
               
            </div>
        </div>
    </div>
    
                    
                    
      
        <div class="container">
          <div class="row">
        <div class="quote col-sm-7 col-xs-12">
        <h1>Chào mừng đã đến trang Quản Lý Sinh Viên của nhóm BHKT</h1>
                <?php 
					if(isset($_SESSION[userid]))
					{
						echo "Chào mừng <span class='userwel'>$_SESSION[userhoten]</span> đã đăng nhập vào hệ thống, chúc bạn một ngày tốt lành";
					}
				?>
      </div>
      </div>
      </div>
    
  
                    
                    
                    

                    

    
<?php require("footer.php"); ?>
