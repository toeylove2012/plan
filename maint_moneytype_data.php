<?php 
    include 'connect.php';
	if(isset($_POST['mt_id'])){
		$sql = "SELECT * FROM `money_type` WHERE mt_id= '".$_POST["mt_id"]."'";  
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);

}
?>