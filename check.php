<?php
//login.php
session_start();
$connect = mysqli_connect("localhost", "plan", "asdasdz501", "plan");
if(isset($_POST["username"]) && isset($_POST["password"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["username"]);
 $password = md5(mysqli_real_escape_string($connect, $_POST["password"]));
 $sql = "SELECT * FROM member WHERE m_username = '".$username."' AND m_password = '".$password."'";
 $result = mysqli_query($connect, $sql);
 $num_row = mysqli_num_rows($result);
 if($num_row > 0)
 {
  $data = mysqli_fetch_array($result);
  $_SESSION["username"] = $data["m_username"];
  $_SESSION["firstname"] = $data["m_firstname"];
  $_SESSION["lastname"] = $data["m_lastname"];
  echo 1;
 }
}
?>