<?php
//login.php
session_start();
session_destroy();
session_start();
$connect = mysqli_connect("localhost", "plan", "asdasdz501", "plan");
if(isset($_POST["username"]) && isset($_POST["pwd"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["username"]);
 $pwd = $_POST["pwd"];
 $sql = "SELECT * FROM member WHERE m_username = '".$username."' AND m_password = '".$pwd."'";
 $result = mysqli_query($connect, $sql);
 $num_row = mysqli_num_rows($result);
 if($num_row ==1)
 {
  $data = mysqli_fetch_array($result);
  $_SESSION["username"] = $data["m_username"];
  $_SESSION["firstname"] = $data["m_firstname"];
  $_SESSION["lastname"] = $data["m_lastname"];
  echo $data["username"];
 }
}
?>