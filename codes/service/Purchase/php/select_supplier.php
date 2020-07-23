

 <?php
 include_once('../../../../conn.php');
 $columns = array('sup_id', 'sup_name');
 //$sql = "SELECT * FROM tbl_sample ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY ";
 $sql = "SELECT * FROM tb_supplier WHERE tb_supplier.delete = '0'";

 


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= ' AND ( sup_name LIKE "%'.$_POST["search"]["value"].'%" 
   
   
    OR sup_id LIKE "%'.$_POST["search"]["value"].'%"
    
    )';

 }

 if(isset($_POST["order"]))
{
 $sql .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= 'ORDER BY sup_id DESC ';
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
        $sub_array[] = $row["sup_id"];
        $sub_array[] = $row["sup_name"];

        $sub_array[] = '
                        <a href="#" data-code="'.$row["sup_id"].'"  data-Name="'.$row["sup_name"].'" class="btn btn-pill btn-primary select_pupplier" data-toggle="tooltip" title="Select"><i class="fas fa-hand-point-up"></i></a> 
                       ';
       
        $data[] = $sub_array;
    
    }
}
else{

        $sub_array = array();
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