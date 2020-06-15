<?php  
 //fetch.php  
 include_once '../../../../conn.php';  
 if(isset($_POST["id"]))  
 {  
      $query = "SELECT o.sup_id,s.sup_name,(SELECT sum(`total`) FROM `tb_order_detail` WHERE `ord_id`='".$_POST["id"]."') as total
                    FROM tb_order o
      
                INNER JOIN tb_supplier s ON o.sup_id = s.sup_id 
                
                WHERE ord_id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>