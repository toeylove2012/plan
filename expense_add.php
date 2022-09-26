<?php
 session_start();
 include 'connect.php';
 $m_id = $_SESSION["m_id"];
	  $amount = mysqli_real_escape_string($con, $_POST["amountSend"]);
      $remarks = mysqli_real_escape_string($con, $_POST["remarksSend"]);
      $balance_type = mysqli_real_escape_string($con, $_POST["balance_typeSend"]);
      $md_id = mysqli_real_escape_string($con, $_POST["md_idSend"]);
           $sql1 = "  
           INSERT INTO running_balance(balance_type, md_id, amount, remarks, m_id)  
           VALUES('$balance_type', '$md_id', '$amount', '$remarks', '$m_id');  
           ";
           $result1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error()); 

           $sql2 = "SELECT SUM(amount) as total FROM `running_balance` where `balance_type` = 1 and `md_id` = '$md_id'";
           $result2 = mysqli_query($con, $sql2);
           while($row2 = mysqli_fetch_array($result2)){
               $budget = $row2['total'];
           }

           $sql3 = "SELECT SUM(amount) as total FROM `running_balance` where `balance_type` = 2 and `md_id` = '$md_id'";
           $result3 = mysqli_query($con, $sql3);
           while($row3 = mysqli_fetch_array($result3)){
               $expense = $row3['total'];
           }

           $balance = $budget - $expense;
           $sql4 = "  
           UPDATE money_detail SET balance='$balance' WHERE md_id='$md_id';  
           ";
		       $result4 = mysqli_query($con, $sql4) or die ("Error in query: $sql4 " . mysqli_error());
           mysqli_close($con);
 ?>