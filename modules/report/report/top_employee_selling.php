<?php
include_once '../../../conn.php';

$date_start = date("Y-01-01");
$date_end = date("Y-12-31");

$sql = "SELECT em.emp_id,em.emp_fname,em.emp_lname,sum(sd.total) as total
FROM tb_employee em
    INNER JOIN tb_sell s ON s.emp_id = em.emp_id 
    INNER JOIN tb_sell_detail sd ON sd.sel_id = s.sel_id

    Where s.sel_date >='".$date_start."' and 
          s.sel_date <='".$date_end."'


    GROUP BY em.emp_id,em.emp_fname,em.emp_lname
    ORDER BY total DESC
   ";

 $sql .= 'LIMIT 5';

$total_count = 0;
$total_count = mysqli_num_rows(mysqli_query($connect, $sql));

$data_table = '';

 $result = mysqli_query($connect, $sql);
 $data = array();
if ($total_count > 0){
    
    while( $row =  mysqli_fetch_array($result)) {
        
        $data_table .= '<tr>
                       
                            <td>'.$row['emp_id'].'</td>
                            <td>'.$row['emp_fname'].' '.$row['emp_lname'].'</td>
                            <td class="text-right">'.number_format($row['total'],0).'</td>
                            
                        </tr>';

    }
}
else{



}

$table = '<table  class="table table-bordered " cellspacing="0" width="100%">
                
        <thead>
        <tr>
           
            <th>ລະຫັດ</th>
            <th>ຊື່ພະນັກງານ</th>
            <th class="text-right">ລວມຍອດຂາຍ</th>
            
        </tr>
        </thead>
        <tbody>
            '.$data_table.'
        </tbody>
        </table>';

    echo $table;
?>