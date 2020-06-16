<?php
include_once '../../../conn.php';

$date_start = date("Y-01-01");
$date_end = date("Y-12-31");

$sql = "SELECT sd.pro_barcode,p.pro_name,c.cat_name,u.uni_name,sum(sd.quality)as quality,sd.price ,sum(sd.total) as total
FROM tb_sell_detail sd
    INNER JOIN tb_sell s ON s.sel_id = sd.sel_id 
    INNER JOIN tb_product p ON p.pro_barcode = sd.pro_barcode 
    INNER JOIN tb_unit u ON u.uni_id = p.uni_id 
    INNER JOIN tb_category c ON c.cat_id = p.cat_id 

    Where s.sel_date >='".$date_start."' and 
          s.sel_date <='".$date_end."'

    GROUP BY sd.pro_barcode,p.pro_name
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
                        <!--    <td>'.$row['pro_barcode'].'</td> -->
                            <td>'.$row['pro_name'].'</td>
                            <td>'.$row['cat_name'].'</td>
                            <td>'.$row['quality'].'</td>
                            <td>'.$row['uni_name'].'</td>
                            <td class="text-right">'.number_format($row['price'],0).'</td>
                            <td class="text-right">'.number_format($row['total'],0).'</td>
                            
                        </tr>';

    }
}
else{



}

$table = '<table  class="table table-bordered " cellspacing="0" width="100%">
                
        <thead>
        <tr>
           <!-- <th>Barcode</th> -->
            <th>ຊື່ສິນຄ້າ</th>
            <th>ປະເພດ</th>
            <th>ຈຳນວນ</th>
            <th>ຫົວໜ່ວຍ</th>
            <th class="text-right">ລາຄາ</th>
            <th class="text-right">ລາຄາລວມ</th>
            
        </tr>
        </thead>
        <tbody>
            '.$data_table.'
        </tbody>
        </table>';

    echo $table;
?>