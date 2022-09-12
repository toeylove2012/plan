<?php
include 'connect.php';
	if($_POST["md_id"] != '')  
      {  
		$sql = "DELETE FROM money_detail WHERE md_id= '".$_POST["md_id"]."'";
		$id =  $_POST["md_id"];
		if (mysqli_query($con, $sql)) {
			echo $id;
		}else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
}
?>