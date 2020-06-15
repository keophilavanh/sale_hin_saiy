
<?php
include_once('../../../../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){
        $query = "INSERT INTO `tb_supplier` (`sup_name`, `sup_phone`, `sup_address`) 
        VALUES ( '".$_POST["Name"]."', '".$_POST["phone"]."', '".$_POST["Address"]."')";
        mysqli_query($connect, $query);
    }
    else if($_POST["status"]=='Update')  
    {  
        $query="UPDATE `tb_supplier` SET `sup_name`='".$_POST["Name"]."',`sup_phone`='".$_POST["phone"]."',`sup_address`='".$_POST["Address"]."'

        WHERE sup_id = '".$_POST["employee_id"]."'";  
        mysqli_query($connect, $query);
            
            
    }
    else if($_POST["status"]=='Delete')  
    {  
            $query = "DELETE  FROM tb_supplier WHERE sup_id = '".$_POST["employee_id"]."'";  
            mysqli_query($connect, $query);
            
            
    }

    
    
     
    
    
}
?>
