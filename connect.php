<?php
$servername="localhost";
$username="64309010032";
$password="asdasdz501";
$datadb   = "64309010032";

$con = new mysqli($servername, $username, $password, $datadb);
mysqli_query($con, "SET NAMES 'utf8' ");
if ($con->connect_error) {
  die("เชื่อมต่อข้อมูลไม่สำเร็จ: " . $con->connect_error);
}
?>
