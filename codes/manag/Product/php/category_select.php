<?php  
 //fetch.php 
 include_once('../../../../conn.php');
  
  
    $query = "SELECT * FROM tb_category WHERE tb_category.delete = '0'";  
    $result = mysqli_query($connect, $query);  
    $output='<option value="">ເລືອກ</option>';
    while( $row =  mysqli_fetch_array($result)) {
    
        $output.='<option value="'.$row["cat_id"].'">'.$row["cat_name"].'</option>';
        
       
    
    } 
    echo $output;  
 
 ?>