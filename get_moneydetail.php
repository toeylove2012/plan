<?php
include('connect.php');
$sql = "SELECT * FROM money_detail WHERE mt_id={$_GET['mt_id']}";
$query = mysqli_query($con, $sql);

$json = array();
while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json);