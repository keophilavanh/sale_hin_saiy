<?php  
 //fetch.php  
 include_once('../../../../conn.php');  
 if(isset($_POST["id"]))  
 {  
      $query = "SELECT * FROM tb_product WHERE pro_barcode = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>