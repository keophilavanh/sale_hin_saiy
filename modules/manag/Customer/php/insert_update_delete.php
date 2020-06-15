
<?php
include_once('../../../../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){
        $query = "INSERT INTO `tb_customer` ( `cus_fname`, `cus_lname`, `cus_phone`, `cus_address`,`cus_car_number`)
        VALUES ( '".$_POST["firstName"]."', '".$_POST["lastName"]."', '".$_POST["phone"]."', '".$_POST["Address"]."', '".$_POST["car_number"]."')";
        mysqli_query($connect, $query);
    }
    else if($_POST["status"]=='Update')  
    {  
        $query="UPDATE `tb_customer` SET `cus_fname`='".$_POST["firstName"]."',`cus_lname`='".$_POST["lastName"]."',`cus_phone`='".$_POST["phone"]."',`cus_address`='".$_POST["Address"]."',`cus_car_number`='".$_POST["car_number"]."'

        WHERE cus_id = '".$_POST["employee_id"]."'";  
        mysqli_query($connect, $query);
            
            
    }
    else if($_POST["status"]=='Delete')  
    {  
            $query = "DELETE  FROM tb_customer WHERE cus_id = '".$_POST["employee_id"]."'";  
            mysqli_query($connect, $query);
            
            
    }

    
    
     
    
    
}
?>
