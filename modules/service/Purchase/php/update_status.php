<?php  
 //fetch.php  
 include_once('../../../../conn.php'); 
 if(isset($_POST["employee_id"]))  
 {  
      $query = "UPDATE `tb_order` SET `ord_status` = 'ໃບສັ່ງຊື້',`Payment_status`='ຍັງຄ້າງຈ່າຍ',`import_status`='ລໍຖ້າຮັບສິນຄ້າ' WHERE ord_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      
 }  
 ?>