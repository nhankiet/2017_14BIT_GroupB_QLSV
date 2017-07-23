
<?php require("connection.php");

header('Content-type: application/json');
$macc = $_POST['macc'];

$query = "DELETE FROM chuyencan WHERE MaCC = '$macc'";
$kq = mysqli_query($conn, $query);

if($kq ) {
    echo json_encode(array(
        "ok" => true,
        "message" => "Xóa thành công!"
    ));
} else {
    echo json_encode(array(
        "ok" => false,
        "message" => "Xóa bị lỗi. Vui lòng kiểm tra lại! "
    ));
}
