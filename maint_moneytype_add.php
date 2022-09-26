<?php  
 include 'connect.php';
 if(!empty($_POST))  
 {   
      $mt_name = mysqli_real_escape_string($con, $_POST["mt_name"]);  
          if($_POST["mt_id"] != '')  
          {  
           $query = "  
           UPDATE money_type   
           SET mt_name='$mt_name'  
           WHERE mt_id='".$_POST["mt_id"]."'";  
		   echo 1;
             $message = 'อัพเดทข้อมูลสำเร็จ';  
           //Data Updated 
      }  
      else  
      {  
           $query = "  
           INSERT INTO money_type(mt_name)  
           VALUES('$mt_name');  
           ";
		   echo 2;  
             $message = 'เพิ่มข้อมูลสำเร็จ';  
           //Data Inserted  
      }
      if(mysqli_query($con, $query))  
      {  
           echo "<script>
                    Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: '$message',
                         showConfirmButton: false,
                         timer: 800
                    })
                 </script>";
          
     }    
 }  
 ?>