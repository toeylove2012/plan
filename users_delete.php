<?php
include 'connect.php';
	if($_POST["md_id"] != '')  
      {  
		$id =  $_POST["md_id"];
		$sql1 = "DELETE FROM running_balance WHERE md_id= '$id'";
        $result1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error()); 
        $sql2 = "DELETE FROM money_detail WHERE md_id= '$id'";
		$result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
		mysqli_close($con);
}