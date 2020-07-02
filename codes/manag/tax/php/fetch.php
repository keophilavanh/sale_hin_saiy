<?php  
 //fetch.php  
 include_once('../../../../conn.php'); 
 
      $query = "SELECT * FROM tb_tax WHERE id = 1";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  

 ?>