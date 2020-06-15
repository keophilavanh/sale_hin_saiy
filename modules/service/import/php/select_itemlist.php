<?php  
 //fetch.php 
 include_once('../../../../conn.php');
  
  
    $query = "SELECT * FROM tb_order_detail Where ord_id='".$_POST["id"]."'";  
    $result = mysqli_query($connect, $query);  
    $output='   <table id="list_item" class="table table-bordered " cellspacing="0" width="80%">              
                <thead>
                <tr>
                    <th>ລະຫັດ</th>
                    <th  width="60%">ລາຍການສິນຄ້າ</th>
                    <th width="8%"style="text-align: center">ຈຳນວນ</th>
                    <th  width="15%" style="text-align: right">ລາຄາ</th>
                    <th  width="15%" style="text-align: right">ລາຄາລວມ</th>
                   
                
                </tr>
                </thead>
                <tbody>';
    while( $row =  mysqli_fetch_array($result)) {

        $sql = "SELECT pro_name FROM tb_product Where pro_barcode ='".$row["pro_barcode"]."'";
          $result_name =  mysqli_fetch_array(mysqli_query($connect, $sql));
    
        $output.="      <tr id='row".$row["pro_barcode"]."'>
                        <td  contenteditable='false' class='item_code'>".$row["pro_barcode"]."</td>
                        <td  contenteditable='false' class='item_name'>".$result_name["pro_name"]."</td>
                        <td align='center'  contenteditable='false' class='item_qty'>".$row["quality"]."</td>
                        <td  contenteditable='false' class='item_price' style='text-align: right'>".$row["price"]."</td>
                        <td  contenteditable='false' style='text-align: right'>".$row["total"]."</td>
                        
                        </tr>  
        ";
        
       
    
    } 
    $output.='</tbody>
    </table>';
    echo $output;  
 
 ?>