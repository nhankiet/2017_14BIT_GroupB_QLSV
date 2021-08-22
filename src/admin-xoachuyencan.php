<?php require("header.php"); ?>
<title>Xóa chuyên cần - Admin</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php require("topnavbar.php") ?>
<?php
if( !(isset($_SESSION["userid"]) && $_SESSION["userloaiuser"] == 1) )
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
                <th><label>Chọn khóa học</label></th>
                </thead>
                <tbody>
                <td><select name='malop' id="js-malop">
                        <?php
                        $lopdautien = null;
                        $str_laymalop = "select * from lop";
                        $kq_laymalop = mysqli_query($conn, $str_laymalop);
                        while($lop = mysqli_fetch_array($kq_laymalop))
                        {
                            if (!$lopdautien)
                                $lopdautien = $lop;
                            ?>
                            <option value="<?php echo $lop['MaLop'] ?>"><?php echo $lop['MaLop'] ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <select name='makhoa' id="js-makhoahoc">
                        <?php
                        $khoadautien = null;
                        $str_laymakh = "select * from khoa WHERE MaLop = '{$lopdautien["MaLop"]}'";
                        $kq_laymakh = mysqli_query($conn, $str_laymakh);
                        while($khoa = mysqli_fetch_array($kq_laymakh))
                        {
                            if (!$khoadautien)
                                $khoadautien = $khoa;
                            ?>
                                <option value="<?php echo $khoa['MaKhoa'] ?>"><?php echo $khoa['MaKhoa'] ?></option>
                            <?php
                        } ?>
                    </select>
                </td>
                </tbody>
            </table>
        </form>
    </div>
</div>
<h2 style="align-items: center">Danh sách chuyên cần của sinh viên</h2>
<div class="row">
    <div class="col-lg-12">
        <form class="" action="" method="post">
            <table class="table table-hover">
                <thead>
                <th><label>Mã chuyên cần</label></th>
                <th><label>Tên sinh viên</label></th>
                <th><label>Khóa học</label></th>
                <th><label>Loại</label></th>
                <th><label>Ngày (dd/mm/yy)</label></th>
                <th></th>
                </thead>
                <tbody  id="js-dschuyencan">
                <?php
                $tensv = "SELECT * FROM user";
                $chuyencan = "SELECT * FROM chuyencan JOIN user ON chuyencan.MaUser = user.MaUser
                  AND chuyencan.MaKhoa = '{$khoadautien["MaKhoa"]}'";
                $query = mysqli_query($conn, $chuyencan);
                while($row = mysqli_fetch_array($query))
                {
                    $date=date_create($row['ThoiDiem']);
                    ?>
                    <tr>
                        <td><?php echo $row['MaCC'] ?></td>
                        <td><?php echo $row['HoTen'] ?></td>
                        <td><?php echo $row['MaKhoa'] ?></td>
                        <td><?php echo $row['Loai'] ?></td>
                        <td><?php echo date_format($date,"d/m/y") ?></td>
                        <td><button data-id="<?php echo $row['MaCC'] ?>" class="Up btn btn-danger js-delete">Xóa</button></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
</div>

<script language="javascript" type="text/javascript">
$(document).ready(function() {
    $("#js-malop").change(function() {
        var malopvalue = $(this).val();
        $.ajax({
            url: "admin-xoachuyencan-loadmakhoa.php",
            data: {
                malop: malopvalue
            }
        })
            .done(function( data ) {
                $('#js-makhoahoc').empty();
                data.forEach(function(item) {
                    $('#js-makhoahoc').append($('<option>', {
                        value: item,
                        text : item
                    }));
                });
            });
    })

    $("#js-makhoahoc").change(function() {
        var makhoavalue = $(this).val();
        $.ajax({
            url: "admin-xoachuyencan-loadchuyencan.php",
            data: {
                makhoa: makhoavalue
            }
        })
            .done(function( data ) { //callback function
                $('#js-dschuyencan').empty();
                data.forEach(function(item) {
                    var d = new Date(item.thoidiem);
                    $("#js-dschuyencan").append("<tr>" +
                        "<td>" + item.macc + "</td>" +
                        "<td>" + item.hoten + "</td>" +
                        "<td>" + item.khoa + "</td>" +
                        "<td>" + item.loai + "</td>" +
                        "<td>" + d.getDate() + "/" + (d.getMonth() + 1) + "/" + (d.getYear() + 1900) + "</td>" +
                        '<td><button data-id="' + item.macc + '" class="Up btn btn-danger js-delete">Xóa</button></td>' +
                        "</tr>"
                    );
                });
            });
    })

    $(document).on("click", ".js-delete", function (e) {
        e.preventDefault();
        var temp = $(this);
        if (confirm('Bạn có chắc muốn xóa chuyên cần?')) {
            $.post({
                url: "admin-xoachuyencan-ajax.php",
                data: {
                    macc: temp.attr('data-id')
                }
            })
                .done(function (data) {
                    if (data.ok) {
                        temp.parent().parent().remove();
                        alert(data.message);
                    } else {
                        alert(data.message);
                    }
                });
        }
    })
});

</script>


<?php require("footer.php") ?>