<?php
$id=$_POST['id'];

//login.php
session_start();
$connect = mysqli_connect("localhost", "plan", "asdasdz501", "plan");
$query ="SELECT * FROM money_detail WHERE md_id = $id";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result);
echo $id;
// if(isset($_POST["id"]))
// {
//  $mtid = mysqli_real_escape_string($connect, $_POST["mtid"]);
//  $mdname = mysqli_real_escape_string($connect, $_POST["mdname"]);
//  $description = mysqli_real_escape_string($connect, $_POST["description"]);
//  $status = mysqli_real_escape_string($connect, $_POST["status"]);
//  $sql = "UPDATE `money_detail`( `mt_id`, `md_name`, `description`, `status`) 
//          SET ('$mtid','$mdname','$description','$status') WHERE md_id = $id";
//  $result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());
//  if($result) {
//     echo 1;
// }
// else
// {
//     echo 0;
// }

// mysqli_close($connect);
// }
?>

