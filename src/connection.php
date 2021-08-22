<?php

$host = "localhost";
$db = "qlsv";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_errno == 0) {
  //echo "Kết nối thành công tới database!";
} 
else {
  echo $conn->connect_errno;
}

if ($conn->connect_errno) {
  die("Kết nối với database thất bại!");
}

$conn->set_charset("utf8");

?>