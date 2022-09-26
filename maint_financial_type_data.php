<?php 
    include 'connect.php';
	if(isset($_POST['f_id'])){
		$sql = "SELECT * FROM `financial_type` WHERE f_id= '".$_POST["f_id"]."'";  
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);

}
?>