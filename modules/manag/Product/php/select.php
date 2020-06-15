

 <?php
 include_once('../../../../conn.php');
 $columns = array('pro_barcode', 'pro_name');
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
 $sql .= 'ORDER BY pro_name DESC ';
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
        if($row["image"] == ''){
            $image = 1543118333;
        }else{
            $image=$row["image"];
        }

        $sub_array[] = '<div class="card" style="width: 70px; height: 80px;">
                    <img class="card-img-top" height="80" width="70" src="images/'.$image.'" alt="Card image cap">
                </div>
        ';

        $sub_array[] = $row["pro_barcode"];
        $sub_array[] = $row["pro_name"];
        $sub_array[] = $row["cat_name"];
        $sub_array[] = $row["quality"].' '.$row["uni_name"];
        $sub_array[] = number_format($row["buy_price"],0);
        $sub_array[] = number_format($row["sell_price"],0);
        
        
  
  
        $sub_array[] = '
                        <a href="#" id="'.$row["pro_barcode"].'" class="btn btn-pill btn-secondary Upload" data-toggle="tooltip" title="Upload"><i class="fas fa-images"></i></a> 
                        <a href="#" id="'.$row["pro_barcode"].'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                        <a href="#" id="'.$row["pro_barcode"].'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';
       
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