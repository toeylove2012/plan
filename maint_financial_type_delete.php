<?php
include 'connect.php';
	if($_POST["f_id"] != '')  
      {  
		$id =  $_POST["f_id"];
		$sql1 = "DELETE FROM financial_type WHERE f_id= '$id'";
        $result1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error()); 
		mysqli_close($con);
}