<?php  
 include 'connect.php';
 if(!empty($_POST))  
 {   
	 $mt_id = mysqli_real_escape_string($con, $_POST["mt_id"]);
      $md_name = mysqli_real_escape_string($con, $_POST["md_name"]);  
      $description = mysqli_real_escape_string($con, $_POST["description"]);  
      $status = mysqli_real_escape_string($con, $_POST["status"]);  
      $grade_id = mysqli_real_escape_string($con, $_POST["grade_id"]);
      $f_id = mysqli_real_escape_string($con, $_POST["f_id"]);
          if($_POST["md_id"] != '')  
          {  
           $query = "  
           UPDATE money_detail   
           SET mt_id='$mt_id',   
		   md_name='$md_name',  
           description='$description',   
           status='$status',
           grade_id='$grade_id',
           f_id='$f_id'
           WHERE md_id='".$_POST["md_id"]."'";  
		   echo 1;
             $message = 'อัพเดทข้อมูลสำเร็จ';  
           //Data Updated 
      }  
      else  
      {  
           $query = "  
           INSERT INTO money_detail(mt_id, md_name, description, status, grade_id, f_id)  
           VALUES('$mt_id', '$md_name', '$description', '$status', '$grade_id', '$f_id');  
           ";
		   echo $query;  
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