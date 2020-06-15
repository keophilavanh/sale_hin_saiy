<?php  
 //fetch.php  
 include_once('../../../../conn.php'); 
 if(isset($_POST["employee_id"]))  
 {  
      $query = "UPDATE `tb_order` SET `ord_status` = 'ໃບສັ່ງຊື້' WHERE ord_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      
 }  
 ?>