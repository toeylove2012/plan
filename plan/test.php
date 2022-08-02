<?php
    require 'connect.php';
    echo "<table border='1'><tr><td>Detail</td>";
    for($i=1;$i<=12;$i++)
    {
        echo "<td>No $i</td>";
    }
    echo "</tr>";

    $arr_mt_id = array();
    $arr_mt_name = array();
	$query = $con->query("SELECT * FROM money_type");
    while($fetch = $query->fetch_array()){
        $arr_mt_id[]=$fetch['mt_id'];
        $arr_mt_name[]=$fetch['mt_name'];

    }
    $a=0;
    while($a<count($arr_mt_id))
    {
        // echo $arr_mt_name[$a]."<br>";
        echo "<tr><td colspan='13'>".$arr_mt_name[$a]."</td></tr>";
        $arr_md_id = array();
        $arr_md_name = array();
        $sql = "SELECT md_id,md_name FROM money_detail WHERE mt_id = $arr_mt_id[$a]"; 
		$result = $con->query($sql);
        $i=0;
		// if ($result->num_rows > 0) {
            echo "<tr>";
			while($fetch = $result->fetch_assoc()) {
				$arr_md_id[$i]=$fetch['md_id'];
                $arr_md_name[$i]=$fetch['md_name'];
                echo "<td>".$arr_md_name[$i]."</td>";
            }
                $b=0;
                while($b<count($arr_md_id))
                {
                    $sql1="SELECT mv_price FROM money_value WHERE md_id = $arr_md_id[$b]"; 
                    $result1 =$con->query($sql1);
                    $r=1;
                    if($result->num_rows!=0)
                    {
                        while($row1 = $result1->fetch_assoc()) 
                        {
                            echo "<td>".$row1['mv_price']."</td>";
                            $r++;
                        }
                        while($r<=12)
                        {
                            echo "<td>-</td>";
                            $r++;
                        }
                    }
                    $b++;
                }
                echo "</tr>";
                $i++;
            // }
        $a++;
    }

    // $i=0;
    // while($i<count($arr_mt_id))
    // {
    //     $arr_md_id = array();
    //     $arr_md_name = array();
    //     $sql = "SELECT md_id,md_name FROM money_detail WHERE mt_id = $arr_mt_id[$i]"; 
	// 	$result = mysqli_query($con,$sql);
	// 	if (mysqli_num_rows($result) > 0) {
	// 		while($fetch = mysqli_fetch_assoc($result)) {
	// 			$arr_md_id[]=$fetch['md_id'];
    //             $arr_md_name[]=$fetch['md_name'];
                
    //         }
    //     }
    //     $i++;
    // }
    
    // $d=0;
    // while($d<=count($arr_mt_id))
    // {
    //     echo "<tr><td>".$arr_md_name[$d]."</td>";
    //     $e=0;
    //     while($e<=count($arr_md_id))
    //     {
    //         $sql1="SELECT mv_price FROM money_value WHERE md_id = $arr_md_id[$e]"; 
    //         $result1 = mysqli_query($con,$sql1);
    //         $r=0;
    //             if (mysqli_num_rows($result1) > 0) 
    //             {
    //                 while($row1 = mysqli_fetch_assoc($result1)) {
    //                     echo "<td>".$row1['mv_price']."</td>";
    //                     $r++;
    //                 }
    //             }
    //             while($r<=12){
    //                 echo "<td>-</td>";
    //                 $r++;
    //             }
    //             echo "</tr>";
    //             $e++;
    //         }
    //         $d++;
    //     }
    //     echo "</table>";
?>