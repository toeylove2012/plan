<?php
include 'connect.php';
	if($_POST["mt_id"] != '')  
      {  
		$id =  $_POST["mt_id"];
		$sql1 = "DELETE FROM money_type WHERE mt_id= '$id'";
        $result1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error()); 
		mysqli_close($con);
}