
<?php
include_once '../../../../conn.php';  
session_start();
if(!empty($_POST))
{

       
   
        $sum ="SELECT max(sel_id) as id FROM tb_sell ";
        $id =  mysqli_fetch_array(mysqli_query($connect, $sum));
      
            $data_id = $id["id"]+1;
        
        
        date_default_timezone_set("Asia/Bangkok");
      
        $sql="INSERT INTO `tb_sell` (`sel_id`, `sel_date`, `cus_id`, `emp_id`) 
        VALUES ('".$data_id."', '".date("Y/m/d H:i:s")."', '".$_POST["Customer_id"]."', '".$_SESSION['user_id']."')";

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
           
        $query ="INSERT INTO `tb_sell_detail` (`sel_id`, `pro_barcode`, `quality`, `price`, `total`) 
        VALUES ('".$data_id."', '".$item_code_clean."', '".$item_qty_clean."', '".$item_price_clean."', '".$item_total_price_clean."')";
           
        mysqli_multi_query($connect, $query);

        $sql_qty="SELECT `quality` FROM `tb_product` WHERE pro_barcode = '".$item_code_clean."'";  
        $row =  mysqli_fetch_array(mysqli_query($connect, $sql_qty));
        $qty =  $row["quality"] - $item_qty_clean;
        
        
        $update_product="UPDATE `tb_product` SET `quality` = '".$qty."' WHERE `pro_barcode` = '".$item_code_clean."'";
        mysqli_query($connect, $update_product);
        
        
        }

        
       
   

   

        echo $data_id;
    
     
    
    
}
?>
