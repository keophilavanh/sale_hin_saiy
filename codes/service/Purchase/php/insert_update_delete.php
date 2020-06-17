
<?php
include_once('../../../../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){
        $query = "INSERT INTO `tb_unit` ( `uni_name`) VALUES ( '".$_POST["UnitName"]."')";
        
        mysqli_query($connect, $query);
    }
    else if($_POST["status"]=='Update')  
    {  
        $query="UPDATE `tb_unit` SET `uni_name`='".$_POST["UnitName"]."'

        WHERE uni_id = '".$_POST["employee_id"]."'";  
        mysqli_query($connect, $query);
            
            
    }
    else if($_POST["status"]=='Delete')  
    {  
            $query = "DELETE  FROM tb_unit WHERE uni_id = '".$_POST["employee_id"]."'";  
            mysqli_query($connect, $query);
            
            
    }

    
    
     
    
    
}
?>
