<?php  
 //fetch.php  
 include_once('../../../../conn.php'); 
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM tb_product WHERE pro_barcode = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>