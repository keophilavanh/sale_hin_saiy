
<?php
include_once('../../../../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){
        $query = "INSERT INTO `tb_category` ( `cat_name`,`active`) VALUES ( '".$_POST["UnitName"]."',0)";
        
        mysqli_query($connect, $query);
    }
    else if($_POST["status"]=='Update')  
    {  
        $query="UPDATE `tb_category` SET `cat_name`='".$_POST["UnitName"]."'

        WHERE cat_id = '".$_POST["employee_id"]."'";  
        mysqli_query($connect, $query);
            
            
    }
    else if($_POST["status"]=='Delete')  
    {  
            $query = "DELETE  FROM tb_category WHERE cat_id = '".$_POST["employee_id"]."'";  
            mysqli_query($connect, $query);
            
            
    }

    
    
     
    
    
}
?>
