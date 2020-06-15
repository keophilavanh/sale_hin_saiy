
<?php
include_once '../../../../conn.php';  
session_start();
if(!empty($_POST))
{

       
        $data_id = $_POST["id_url"];
        $DELETE ="DELETE FROM `tb_order_detail` WHERE ord_id='".$data_id."' ";
        mysqli_query($connect, $DELETE);
      
           
        
        
        date_default_timezone_set("Asia/Bangkok");
      
        $sql="UPDATE `tb_order` SET `sup_id` = '".$_POST["supplier_id"]."', `emp_id` = '".$_SESSION['user_id']."' WHERE `tb_order`.`ord_id` = '".$data_id."'";



        mysqli_query($connect, $sql);

        $item_code = $_POST["item_code"];
        $item_name = $_POST["item_name"];
        $item_qty = $_POST["item_qty"];
        $item_price = $_POST["item_price"];
        $item_total_price = $_POST["item_total_price"];
        
        $query = '';
        for($count = 0; $count < count($item_name); $count++)
        {
        $item_code_clean = mysqli_real_escape_string($connect, $item_code[$count]);
        $item_name_clean = mysqli_real_escape_string($connect, $item_name[$count]);
        $item_qty_clean = mysqli_real_escape_string($connect, $item_qty[$count]);
        $item_price_clean = mysqli_real_escape_string($connect, $item_price[$count]);
        $item_total_price_clean = mysqli_real_escape_string($connect, $item_total_price[$count]);
           
        $query ="INSERT INTO `tb_order_detail` (`ord_id`, `pro_barcode`, `quality`, `price`, `total`) 
        VALUES ('".$data_id."', '".$item_code_clean."', '".$item_qty_clean."', '".$item_price_clean."', '".$item_total_price_clean."')";
           
            mysqli_multi_query($connect, $query);
        
        }

        
       
   

   

        echo $data_id;
    
     
    
    
}
?>
