<?php 
session_start();
include 'connect.php';
$m_id = $_SESSION["m_id"];
$id = mysqli_real_escape_string($con, $_POST["idSend"]);
$amount = mysqli_real_escape_string($con, $_POST["amountSend"]);
      $remarks = mysqli_real_escape_string($con, $_POST["remarksSend"]);
      $balance_type = mysqli_real_escape_string($con, $_POST["balance_typeSend"]);
      $md_id = mysqli_real_escape_string($con, $_POST["md_idSend"]);
      $sql = "  
           UPDATE running_balance SET balance_type='$balance_type', md_id='$md_id', amount='$amount', remarks='$remarks', m_id='$m_id' WHERE id='$id';";
           $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error()); 
           $sql1 = "SELECT SUM(amount) as total FROM `running_balance` where `balance_type` = 1 and `md_id` = '$md_id' ";
           $result1 = mysqli_query($con, $sql1);
           while($row1 = mysqli_fetch_array($result1)){
             $allbudget = $row1['total'];
           }
           $sql2 = "SELECT SUM(amount) as total FROM `running_balance` where `balance_type` = 2 and `md_id` = '$md_id' ";
           $result2 = mysqli_query($con, $sql2);
           while($row2 = mysqli_fetch_array($result2)){
             $allexpense = $row2['total'];
           }
           $balance = $allbudget - $allexpense;
           $sql3= "UPDATE `money_detail` set `balance` = '$balance' where `md_id` = '$md_id';";
           $result3 = mysqli_query($con, $sql3);
           mysqli_close($con);
?>