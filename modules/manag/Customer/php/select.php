

 <?php
 include_once('../../../../conn.php');
 $columns = array('cus_id', 'cus_fname','cus_lname','cus_phone','cus_address');
 //$sql = "SELECT * FROM tbl_sample ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY ";
 $sql = "SELECT * FROM tb_customer ";

 


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= ' WHERE cus_fname LIKE "%'.$_POST["search"]["value"].'%" 
    OR cus_lname LIKE "%'.$_POST["search"]["value"].'%"
    OR cus_phone LIKE "%'.$_POST["search"]["value"].'%"
    OR cus_car_number LIKE "%'.$_POST["search"]["value"].'%"
    OR cus_address LIKE "%'.$_POST["search"]["value"].'%"
    OR cus_id LIKE "%'.$_POST["search"]["value"].'%"
    
    ';

 }

 if(isset($_POST["order"]))
{
 $sql .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= 'ORDER BY cus_id DESC ';
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
        $sub_array[] = $row["cus_id"];
        $sub_array[] = $row["cus_fname"];
        $sub_array[] = $row["cus_lname"];
        $sub_array[] = $row["cus_car_number"];
        $sub_array[] = $row["cus_phone"];
        $sub_array[] = $row["cus_address"];
        $sub_array[] = '
                        <a href="#" id="'.$row["cus_id"].'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                        <a href="#" id="'.$row["cus_id"].'" class="btn btn-icon btn-pill btn-danger delete_data" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></a>';
       
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