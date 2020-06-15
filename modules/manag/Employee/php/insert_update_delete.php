
<?php
include_once('../../../../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){
        $query = "INSERT INTO `tb_employee` (`emp_fname`, `emp_lname`, `emp_phone`, `emp_address`, `username`, `password`, `permission`) 
        VALUES ( '".$_POST["firstName"]."', '".$_POST["lastName"]."', '".$_POST["phone"]."', '".$_POST["Address"]."', '".$_POST["Username"]."', '".$_POST["Password"]."', '".$_POST["Type"]."')";
        mysqli_query($connect, $query);
    }
    else if($_POST["status"]=='Update')  
    {  
        $query="UPDATE `tb_employee` SET `emp_fname`='".$_POST["firstName"]."',`emp_lname`='".$_POST["lastName"]."',`emp_phone`='".$_POST["phone"]."',`emp_address`='".$_POST["Address"]."',`username`= '".$_POST["Username"]."',`password`='".$_POST["Password"]."',`permission`='".$_POST["Type"]."'

        WHERE emp_id = '".$_POST["employee_id"]."'";  
        mysqli_query($connect, $query);
            
            
    }
    else if($_POST["status"]=='Delete')  
    {  
            $query = "DELETE  FROM tb_employee WHERE emp_id = '".$_POST["employee_id"]."'";  
            mysqli_query($connect, $query);
            
            
    }

    
    
     
    
    
}
?>
