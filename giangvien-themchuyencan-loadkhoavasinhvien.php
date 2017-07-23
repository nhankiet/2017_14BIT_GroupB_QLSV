
<?php require("connection.php");

header('Content-type: application/json');
//echo '{"abc":"123"}';
$malop = $_GET['malop'];
$magv = $_GET['magv'];


$khoaarray = array();
$str_laymakh = "select * from khoa WHERE MaLop = '$malop' AND MaGV = '$magv'";
$kq_laymakh = mysqli_query($conn, $str_laymakh);
while($khoa = mysqli_fetch_array($kq_laymakh))
{
    $khoaarray[] = $khoa['MaKhoa'];
}

$sinhvienarray = array();
$str_laymasv = "select * from user WHERE MaLop = '$malop' AND LoaiUser = 3";
$kq_laymasv = mysqli_query($conn, $str_laymasv);
while($sinhvien = mysqli_fetch_array($kq_laymasv))
{
    $sinhvienarray[] = array(
        "masv" => $sinhvien['MaUser'],
        "hoten" => $sinhvien['HoTen'],
    );
}


echo json_encode(array(
    "khoa" => $khoaarray,
    "sinhvien" => $sinhvienarray
));

