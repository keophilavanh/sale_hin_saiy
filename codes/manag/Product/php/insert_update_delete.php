
<?php
include_once('../../../../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){
        $query = "INSERT INTO `tb_product` (`pro_barcode`, `pro_name`, `quality`, `image`, `buy_price`, `sell_price`, `cat_id`, `uni_id`) 
        VALUES ('".$_POST["barcode"]."', '".$_POST["Name"]."', '0', NULL, '".$_POST["buy_price"]."', '".$_POST["sell_price"]."', '".$_POST["category"]."', '".$_POST["unit"]."')";
        
        mysqli_query($connect, $query);
    }
    else if($_POST["status"]=='Update')  
    {  
        $query="UPDATE `tb_product` SET `pro_name` = '".$_POST["Name"]."', `buy_price` = '".$_POST["buy_price"]."', `sell_price` = '".$_POST["sell_price"]."', `cat_id` = '".$_POST["category"]."', `uni_id` = '".$_POST["unit"]."' 

        WHERE pro_barcode = '".$_POST["employee_id"]."'";  
        mysqli_query($connect, $query);
            
            
    }
    else if($_POST["status"]=='Delete')  
    {  

            $query="UPDATE `tb_product` SET `delete` = '1'

            WHERE pro_barcode = '".$_POST["employee_id"]."'";  
            mysqli_query($connect, $query);
            // $query = "DELETE  FROM tb_product WHERE pro_barcode = '".$_POST["employee_id"]."'";  
            // mysqli_query($connect, $query);
            
            
    }

    
    
     
    
    
}
?>
