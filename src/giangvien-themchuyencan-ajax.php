
<?php require("connection.php");
header('Content-type: application/json');

$makhoa = $_POST['makhoa'];
$mauser = $_POST['mauser'];
$loai = $_POST['loai'];
$thoidiem = $_POST['thoidiem'];

if(!($makhoa && $mauser && $loai && $thoidiem)) {
    echo json_encode(array(
        "ok" => false,
        "message" => "Dữ liệu không phù hợp. Vui lòng kiểm tra lại!"
    )); die;
}

$query = "INSERT INTO chuyencan(MaKhoa, MaUser, Loai, ThoiDiem) VALUES ('$makhoa', $mauser, '$loai', '$thoidiem')";
$kq = mysqli_query($conn, $query);
if($kq ) {
    echo json_encode(array(
        "ok" => true,
        "message" => "Thêm thành công!"
    ));
} else {
    echo json_encode(array(
        "ok" => false,
        "message" => "Thêm bị lỗi. Vui lòng kiểm tra lại!"
    ));
}

