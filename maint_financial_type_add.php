<?php  
 include 'connect.php';
 if(!empty($_POST))  
 {   
      $f_name = mysqli_real_escape_string($con, $_POST["f_name"]);  
          if($_POST["f_id"] != '')  
          {  
           $query = "  
           UPDATE financial_type   
           SET f_name='$f_name'  
           WHERE f_id='".$_POST["f_id"]."'";  
		   echo 1;
             $message = 'อัพเดทข้อมูลสำเร็จ';  
           //Data Updated 
      }  
      else  
      {  
           $query = "  
           INSERT INTO financial_type(f_name)  
           VALUES('$f_name');  
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