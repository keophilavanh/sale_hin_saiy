<?php  
 //fetch.php  
 include 'conn.php';
 $response;
 if(!empty($_POST)) 
 {  
      $query = "SELECT * FROM tb_employee WHERE username ='".$_POST['Username']."' And password ='".$_POST['Password']."'";
      $result = mysqli_query($connect, $query);  
      $row=mysqli_fetch_array($result);  
      if($row != ''){
        session_start();
					$_SESSION['ses_id']= session_id();
          $_SESSION['user']= $row["emp_fname"];
          $_SESSION['user_id']= $row["emp_id"];
          $_SESSION['permission']= $row["permission"];
          $_SESSION['system_name']= 'ລະບົບຈັດການຂາຍຫີນຊາຍ';
        $response = 'true';

      } else {
        
        $response = 'false';
      }
      echo $response;
      
 }  
 ?>