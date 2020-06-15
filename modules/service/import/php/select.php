

 <?php
 include_once '../../../../conn.php';
 $columns = array('ord_id', 'ord_date');
 //$sql = "SELECT * FROM tbl_sample ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY ";

 $sql = "SELECT o.ord_id,o.ord_date,o.ord_status,o.import_status,s.sup_name,e.emp_fname,e.emp_lname
            FROM tb_order o
            
            INNER JOIN tb_supplier s ON o.sup_id = s.sup_id
            INNER JOIN tb_employee e ON o.emp_id  = e.emp_id 
            
            WHERE o.ord_status ='ໃບສັ່ງຊື້'
            ";

            
 


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= 'and ( o.ord_date LIKE "%'.$_POST["search"]["value"].'%" 
    OR o.ord_id LIKE "%'.$_POST["search"]["value"].'%"
    
    )';

 }

 if(isset($_POST["order"]))
{
 $sql .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= 'ORDER BY ord_id DESC ';
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

         

           

            $sub_array[] = $row["ord_id"];
            $sub_array[] = $row["sup_name"];
            $sub_array[] = $row["ord_date"];
    
            $sql_total=" SELECT sum(`total`) as total FROM `tb_order_detail` WHERE `ord_id`='".$row["ord_id"]."'";
            $result_total = mysqli_fetch_array(mysqli_query($connect,$sql_total));
            
    
            $sub_array[] = number_format($result_total["total"],0).' ກີບ';

          

                $sub_array[] =  $row["import_status"];
                $sub_array[] = $row["emp_fname"].' '.$row["emp_lname"];


                if($row["import_status"]=="ຮັບສິນຄ້າແລ້ວ"){
                    $sub_array[] = '
                    <a href="#" id="'.$row["ord_id"].'" class="btn btn-pill btn-success View_data_Purchase" data-toggle="tooltip" title="View Purchase List"><i class="fas fa-file "></i></a> 
                    
                    ';
                }
                else{
                    $sub_array[] = '
                                <a href="#" id="'.$row["ord_id"].'" class="btn btn-pill btn-success View_data_Purchase" data-toggle="tooltip" title="View Purchase List"><i class="fas fa-file "></i></a> 
                                <a href="#" id="'.$row["ord_id"].'" class="btn btn-pill btn-info  Edit_data" data-toggle="tooltip" title="Import">ຮັບສິນຄ້າ</a> 
                                ';
                }

       
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