
<?php
include_once '../../../../conn.php';  
session_start();
if(!empty($_POST))
{

       
   
        $sum ="SELECT max(imp_id) as id FROM tb_import ";
        $id =  mysqli_fetch_array(mysqli_query($connect, $sum));
      
            $data_id = $id["id"]+1;
        
        
        date_default_timezone_set("Asia/Bangkok");

      
        $sql="INSERT INTO `tb_import` (`imp_id`, `imp_date`, `ord_id`, `emp_id`)
        VALUES ('".$data_id."','".date("Y/m/d H:i:s")."', '".$_POST["order_id"]."', '".$_SESSION['user_id']."')";

        mysqli_query($connect, $sql);

        $item_code = $_POST["item_code"];
        $item_name = $_POST["item_name"];
        $item_qty = $_POST["item_qty"];
        $item_price = $_POST["item_price"];
       
        
        $query = '';
        for($count = 0; $count < count($item_name); $count++)
        {
        $item_code_clean = mysqli_real_escape_string($connect, $item_code[$count]);
        $item_name_clean = mysqli_real_escape_string($connect, $item_name[$count]);
        $item_qty_clean = mysqli_real_escape_string($connect, $item_qty[$count]);
        $item_price_clean = mysqli_real_escape_string($connect, $item_price[$count]);
        
           
        $query ="INSERT INTO `tb_import_detail` (`imp_id`, `pro_barcode`, `quality`) 
        VALUES ('".$data_id."', '".$item_code_clean."', '".$item_qty_clean."')";
           
        mysqli_multi_query($connect, $query);

        $sql_qty="SELECT `quality` FROM `tb_product` WHERE pro_barcode = '".$item_code_clean."'";  
        $row =  mysqli_fetch_array(mysqli_query($connect, $sql_qty));
        $qty = $row["quality"]+$item_qty_clean;
        
        
        $update_product="UPDATE `tb_product` SET `quality` = '".$qty."', `buy_price` = '".$item_price_clean."' WHERE `pro_barcode` = '".$item_code_clean."'";
        mysqli_query($connect, $update_product);
        
        }

        $update_order = "UPDATE `tb_order` SET `import_status`='ຮັບສິນຄ້າແລ້ວ' WHERE ord_id = '".$_POST["order_id"]."'";
        $result = mysqli_query($connect, $update_order);  
        
       
   

   

        echo $data_id;
    
     
    
    
}
?>
