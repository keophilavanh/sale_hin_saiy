

 <?php
 include_once('../../../../conn.php');
 $columns = array('pro_barcode', 'pro_name','quality','quality','quality');
 //$sql = "SELECT * FROM tbl_sample ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY ";
 $sql = "select p.pro_barcode , p.pro_name,p.quality,p.buy_price,p.sell_price,p.image,c.cat_name,u.uni_name
            from tb_product p 
            INNER JOIN tb_unit u ON p.uni_id = u.uni_id
            INNER JOIN tb_category c ON p.cat_id  = c.cat_id 
           ";

 


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= ' where p.pro_name LIKE "%'.$_POST["search"]["value"].'%" 
    OR p.pro_barcode LIKE "%'.$_POST["search"]["value"].'%"
    
    ';

 }

 if(isset($_POST["order"]))
{
 $sql .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= 'ORDER BY quality ASC ';
}



$qry =" ";
 if($_POST["length"] != -1)
{
 $qry = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
 //$qry = ' OFFSET '. $_POST['start'].' ROWS FETCH NEXT ' . $_POST['length'].' ROWS ONLY';
}

$total_count = 0;
$total_count = mysqli_num_rows(mysqli_query($connect, $sql));


 
 $result = mysqli_query($connect, $sql . $qry);
 $data = array();
if ($total_count > 0){
    
    while( $row =  mysqli_fetch_array($result)) {
    
        $sub_array = array();
      

        $sub_array[] = $row["pro_barcode"];
        $sub_array[] = $row["pro_name"];
        $sub_array[] = $row["cat_name"];
        $sub_array[] = $row["quality"].' '.$row["uni_name"];
        
        
        
  
  
        $sub_array[] = '<a href="#" data-code="'.$row["pro_barcode"].'"  data-Name="'.$row["pro_name"].'" data-Price="'.$row["buy_price"].'" class="btn btn-pill btn-primary select_product" data-toggle="tooltip" title="Select"><i class="fas fa-hand-point-up"></i></a> ';
       
        $data[] = $sub_array;
    
    }
}
else{

        $sub_array = array();
        $sub_array[] = " ";
        $sub_array[] = " ";
        $sub_array[] = " ";
        $sub_array[] = " ";
        $sub_array[] = " ";
      
     
      
       
        $data[] = $sub_array;


}




$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $total_count,
    "recordsFiltered" => $total_count,
    "data"    => $data
   );

echo json_encode($output);

?>