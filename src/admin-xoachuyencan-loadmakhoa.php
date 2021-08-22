<?php require("connection.php");

header('Content-type: application/json');
//echo '{"abc":"123"}';
$malop = $_GET['malop'];

$khoaarray = array();
$str_laymakh = "select * from khoa WHERE MaLop = '$malop'";
$kq_laymakh = mysqli_query($conn, $str_laymakh);
while($khoa = mysqli_fetch_array($kq_laymakh))
{
    $khoaarray[] = $khoa['MaKhoa'];
}

echo json_encode($khoaarray);

