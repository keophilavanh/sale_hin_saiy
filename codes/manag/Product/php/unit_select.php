<?php  
 //fetch.php 
 include_once('../../../../conn.php');
  
  
    $query = "SELECT * FROM tb_unit WHERE tb_unit.delete = '0'";  
    $result = mysqli_query($connect, $query);  
    $output='<option value="">ເລືອກ</option>';
    while( $row =  mysqli_fetch_array($result)) {
    
        $output.='<option value="'.$row["uni_id"].'">'.$row["uni_name"].'</option>';
        
       
    
    } 
    echo $output;  
 
 ?>