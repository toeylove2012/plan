<?php
$servername="localhost";
$username="plan";
$password="asdasdz501";
$datadb   = "plan";

$con = new mysqli($servername, $username, $password, $datadb);
mysqli_query($con, "SET NAMES 'utf8' ");
if ($con->connect_error) {
  die("เชื่อมต่อข้อมูลไม่สำเร็จ: " . $con->connect_error);
}
?>
