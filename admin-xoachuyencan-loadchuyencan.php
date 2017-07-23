<?php require("connection.php");

header('Content-type: application/json');
//echo '{"abc":"123"}';
$makhoa = $_GET['makhoa'];

$chuyencanarray = array();
$str_laychuyencan = "SELECT * FROM chuyencan JOIN user ON chuyencan.MaUser = user.MaUser
                  AND chuyencan.MaKhoa = '$makhoa'";
$query = mysqli_query($conn, $str_laychuyencan);
while($chuyencan = mysqli_fetch_array($query))
{
    $chuyencanarray[] = array(
        "macc" => $chuyencan['MaCC'],
        "hoten" => $chuyencan['HoTen'],
        "khoa" => $chuyencan['MaKhoa'],
        "loai" => $chuyencan['Loai'],
        "thoidiem" => $chuyencan['ThoiDiem'],
    );
}

echo json_encode($chuyencanarray);

