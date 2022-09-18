<?php
 include 'connect.php';
	  if(isset($_POST['deletesend'])){
        $id=$_POST['deletesend'];
        $sql = "SELECT amount,md_id FROM `running_balance` where `balance_type` = 2 and `id` = '$id'";
        $result=mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
          $budgetout = $row['amount'];
          $md_id = $row['md_id'];
        }

        $sql2 = "SELECT balance FROM money_detail WHERE md_id=$md_id";
        $result2=mysqli_query($con,$sql2);
        while($row2 = mysqli_fetch_array($result2)){
          $budget = $row2['balance'];
        }
        $budget += $budgetout;
        $sql3 = "UPDATE money_detail SET balance='$budget' WHERE md_id='$md_id';";
        $result3=mysqli_query($con,$sql3);
        
        $sql4="DELETE FROM running_balance WHERE id= '$id'";
        $result4=mysqli_query($con,$sql4);
      }
 ?>