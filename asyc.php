<?php  
 //fetch.php  
 include_once 'conn.php'; 

    function  remove_table($table_name,$connect){
       
        mysqli_query($connect,"DELETE FROM $table_name"); 
    }

    function  insert_table($table_name,$data_table,$connect){
       
        foreach ($data_table as $array_data) {
            $sql_column ='';
            $sql_value = '';
            foreach ($array_data as $key => $value_data) {
    
               if(!is_numeric($key)){
                    if($sql_column == ''){
                        $sql_column.= $key;
                        $sql_value.= "'".$value_data."'";
                    }else{
                        $sql_column.= ','.$key;
                        $sql_value.= ','."'".$value_data."'";
                    }
               }
                
            }
    
             $query = "INSERT INTO $table_name ($sql_column)  VALUES ($sql_value)";
             mysqli_query($connect, $query);
        }
    }

   
 if(isset($_POST))  
 {  
   

    $tb_category = $_POST['tb_category'];
    $tb_customer = $_POST['tb_customer'];
    $tb_unit = $_POST['tb_unit'];
    $tb_supplier = $_POST['tb_supplier'];
    $tb_employee = $_POST['tb_employee'];
    $tb_product = $_POST['tb_product'];
    $tb_sell = $_POST['tb_sell'];
    $tb_sell_detail = $_POST['tb_sell_detail'];
    $tb_order = $_POST['tb_order'];
    $tb_order_detail = $_POST['tb_order_detail'];
    $tb_import = $_POST['tb_import'];
    $tb_import_detail = $_POST['tb_import_detail'];
    $tb_expire_product = $_POST['tb_expire_product'];
    $tb_expire_product_detail = $_POST['tb_expire_product_detail'];

     remove_table('tb_expire_product_detail',$connect); 
     remove_table('tb_expire_product',$connect); 
     remove_table('tb_import_detail',$connect); 
     remove_table('tb_import',$connect); 
     remove_table('tb_order_detail',$connect); 
     remove_table('tb_order',$connect); 
     remove_table('tb_sell_detail',$connect); 
     remove_table('tb_sell',$connect); 
     remove_table('tb_product',$connect); 
     remove_table('tb_employee',$connect); 
     remove_table('tb_supplier',$connect); 
     remove_table('tb_unit',$connect); 
     remove_table('tb_customer',$connect); 
     remove_table('tb_category',$connect); 




    insert_table('tb_category',$tb_category,$connect); 
    insert_table('tb_customer',$tb_customer,$connect); 
    insert_table('tb_unit',$tb_unit,$connect); 
    insert_table('tb_supplier',$tb_supplier,$connect); 
    insert_table('tb_employee',$tb_employee,$connect); 
    insert_table('tb_product',$tb_product,$connect); 
    insert_table('tb_sell',$tb_sell,$connect); 
    insert_table('tb_sell_detail',$tb_sell_detail,$connect); 
    insert_table('tb_order',$tb_order,$connect); 
    insert_table('tb_order_detail',$tb_order_detail,$connect); 
    insert_table('tb_import',$tb_import,$connect); 
    insert_table('tb_import_detail',$tb_import_detail,$connect); 
    insert_table('tb_expire_product',$tb_order,$connect); 
    insert_table('tb_expire_product_detail',$tb_order_detail,$connect); 



   
   
 }  
 
 
  
 ?>