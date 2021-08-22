<?php require("header.php"); ?>
<title>Xem chuyên cần - Sinh viên</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php require("topnavbar.php") ?>
<?php

if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 3) )
    header("Location:index.php");
?>
    <hr><hr><hr>

    -
<div class="container">
    <h2 style="align-items: center">Chuyên cần của bạn</h2>
    <div class="row">
        <div class="col-lg-12">
            <form class="" action="" method="post">
                <table class="table table-hover">
                    <thead>
                    <th><label>Khóa học</label></th>
                    <th><label>Loại</label></th>
                    <th><label>Ngày (dd/mm/yy)</label></th>
                    </thead>
                    <tbody>
                    <?php
                    $chuyencan = "SELECT * FROM chuyencan WHERE MaUser = '{$_SESSION["userid"]}'";
                    $query = mysqli_query($conn, $chuyencan);
                    while($row = mysqli_fetch_array($query))
                    {
                        $date=date_create($row['ThoiDiem']);
                        ?>
                    <tr>
                        <td><input value="<?php echo $row['MaKhoa'] ?>" readonly></td>
                        <td><input value="<?php echo $row['Loai'] ?>" readonly></td>
                        <td><input value="<?php echo date_format($date,"d/m/y") ?>" readonly></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>


<?php require("footer.php") ?>