<?php

include_once('../../conn.php'); 

function  select_table($table_name,$connect){
       
    $query = "SELECT * FROM $table_name";  
    $result = mysqli_query($connect, $query);  
     
    $data = array();
        while( $row =  mysqli_fetch_array($result)) {
    
            $data[] = $row;
            //print_r($row);
        }

    return $data;
}

     

    //print_r(select_table('tb_category',$connect)) ;
    $postdata = http_build_query(
        array(
            'tb_category' => select_table('tb_category',$connect),
            'tb_customer' => select_table('tb_customer',$connect),
            'tb_unit' => select_table('tb_unit',$connect),
            'tb_supplier' => select_table('tb_supplier',$connect),
            'tb_product' => select_table('tb_product',$connect),
            'tb_sell' => select_table('tb_sell',$connect),
            'tb_sell_detail' => select_table('tb_sell_detail',$connect),
            'tb_order' => select_table('tb_order',$connect),
            'tb_order_detail' => select_table('tb_order_detail',$connect),
            'tb_import' => select_table('tb_import',$connect),
            'tb_import_detail' => select_table('tb_import_detail',$connect),
            'tb_expire_product' => select_table('tb_expire_product',$connect),
            'tb_expire_product_detail' => select_table('tb_expire_product_detail',$connect),
            'tb_employee' => select_table('tb_employee',$connect),
        )
    );
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );
    $context  = stream_context_create($opts);
    $result = file_get_contents('http://localhost/host_data/asyc.php', false, $context);

    echo $result;

?>