<?php require("header.php"); ?>
<title>Thêm chuyên cần - Giảng viên</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php require("topnavbar.php") ?>
<?php

if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 2) )
    header("Location:index.php");
?>
<hr><hr><hr>

-
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form class="" action="" method="post">
                <table class="table table-hover">
                    <thead>
                    <th><label>Chọn lớp</label></th>
                    </thead>
                    <tbody>
                    <td><select name='malop' class="malop">
                            <?php
                            $lopdautien = null;
                            $str_laymalop = "select * from lop";
                            $kq_laymalop = mysqli_query($conn, $str_laymalop);
                            while($lop = mysqli_fetch_array($kq_laymalop))
                            {
                                if (!$lopdautien)
                                    $lopdautien = $lop;
//								    $lopdautien = !$lopdautien ? $lop : $lopdautien;
                                ?>
                                <option value="<?php echo $lop['MaLop'] ?>"><?php echo $lop['MaLop'] ?></option>
                            <?php } ?>
                        </select>
                    </td>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form class="" action="" method="post">
                <table class="table table-hover">
                    <thead>
                    <th><label>Sinh viên</label></th>
                    <th><label>Khóa học</label></th>
                    <th><label>Loại</label></th>
                    <th><label>Chọn ngày</label></th>
                    </thead>
                    <tbody>
                    <td>
                        <select name='masv' id="js-masinhvien">
                            <?php $str_laymasv = "SELECT * FROM user WHERE MaLop = '{$lopdautien["MaLop"]}' AND LoaiUser = 3";
                            $kq_laymasv = mysqli_query($conn, $str_laymasv);
                            while($sinhvien = mysqli_fetch_array($kq_laymasv))
                            {
                                {?>
                                    <option value="<?php echo $sinhvien['MaUser'] ?>"><?php echo $sinhvien['HoTen'] ?></option>
                                <?php }
                            } ?>
                        </select>
                    </td>
                    <td>
                        <select name='makhoa' id="js-makhoahoc">
                            <?php $str_laymakh = "SELECT * FROM khoa WHERE MaLop = '{$lopdautien["MaLop"]}' AND MaGV = '{$_SESSION["userid"]}'";

                            $kq_laymakh = mysqli_query($conn, $str_laymakh);
                            while($khoa = mysqli_fetch_array($kq_laymakh))
                                {?>
                                    <option value="<?php echo $khoa['MaKhoa'] ?>"><?php echo $khoa['MaKhoa'] ?></option>
                                <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select id="js-loai">
                            <option value="Đi trễ">Đi trễ</option>
                            <option value="Vắng không phép">Vắng không phép</option>
                            <option value="Vắng có phép">Vắng có phép</option>
                        </select>
                    </td>
                    <td><input id="js-thoidiem" type="date" value="2017-01-01"></td>
                    <td><input class='Up btn btn-success' value='Thêm' type='button' id="js-add"></td>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var userid = "<?php echo $_SESSION['userid'] ?>";
        $(".malop").change(function() {
            var malopvalue = $(this).val();
            $.ajax({
                url: "giangvien-themchuyencan-loadkhoavasinhvien.php",
                data: {
                    malop: malopvalue,
                    magv: userid
                }
            })
                .done(function( data ) { //callback function
                    $('#js-makhoahoc').empty();
                    data.khoa.forEach(function(item) {
                        $('#js-makhoahoc').append($('<option>', {
                            value: item,
                            text : item
                        }));
                    });

                    $('#js-masinhvien').empty();
                    data.sinhvien.forEach(function(item) {
                        $('#js-masinhvien').append($('<option>', {
                            value: item.masv,
                            text : item.hoten
                        }));
                    });
                });

        })

        $("#js-add").click(function (e) {
            e.preventDefault();
            if (confirm('Bạn có chắc muốn thêm chuyên cần? ')) {
                $.post({
                    url: "giangvien-themchuyencan-ajax.php",
                    data: {
                        makhoa: $('#js-makhoahoc').val(),
                        mauser: $('#js-masinhvien').val(),
                        loai: $('#js-loai').val(),
                        thoidiem: $('#js-thoidiem').val(),
                    }
                })
                    .done(function( data ) { //callback function
                        //console.log(typeof data);
                        if(data['ok']) {
                            alert(data.message);
                        } else {
                            alert(data.message);
                        }
                    });
            } else {
                return;
            }

        })
    });

</script>


<?php require("footer.php") ?>