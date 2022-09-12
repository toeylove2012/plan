<?php 
    include 'connect.php';
	if(isset($_POST['md_id'])){
		$sql = "SELECT * FROM `money_detail` INNER JOIN `money_type` ON money_detail.mt_id = money_type.mt_id WHERE md_id= '".$_POST["md_id"]."'";  
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);

}
?>