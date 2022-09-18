<?php 
    include 'connect.php';
	if(isset($_POST['updateid'])){
		$id=$_POST['updateid'];
		$sql = "SELECT * FROM `running_balance` WHERE id='$id' AND balance_type = 2";  
		$result = mysqli_query($con, $sql);
		$response=array();
		while($row = mysqli_fetch_array($result)){
			$response=$row;
		}
		echo json_encode($response);
	}else{
		$response['status'] = 200;
		$response['message'] = "Inavalid or data not found";
	}
?>