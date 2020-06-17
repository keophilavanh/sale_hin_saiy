<?php  
 //fetch.php  
 include_once('../../../../conn.php'); 
 if(isset($_POST["employee_id"]))  
 {  
      $query = "DELETE from tb_order_detail  WHERE ord_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  

      $query = "DELETE from tb_order  WHERE ord_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);
      
 }  
 ?>