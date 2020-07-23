<?php  
 //fetch.php 
 include_once '../../../../conn.php';
  
   
    $query = "SELECT * FROM tb_product WHERE  tb_product.delete = '0' AND cat_id=".$_POST["id"];  
    $result = mysqli_query($connect, $query);  
    $output='';
    while( $row =  mysqli_fetch_array($result)) {
        
        
        $output.='  <div class="Click_Product" style="padding: 7px;"  data-code="'.$row["pro_barcode"].'"  data-Name="'.$row["pro_name"].'" data-Price="'.$row["sell_price"].'">
                    <div class="d-flex border bg-primary" style="width: 150px; height: 100px;" >
                   
                        <div class=" bg-white  manag" style="text-overflow: ellipsis; overflow: hidden; width:150px;">
                        <span class="badge badge-info " style="margin:3px;"><font size="2"  >'.number_format($row["sell_price"],0).'</font></span> 
                       
                        <!-- <span class="badge badge-info float-right " style="margin:3px;"><font size="2"  >12</font></span>  -->
                        
                            <center>
                            
                            <font size="4"  >'.$row["pro_name"].'</font>
                            </center>
                        </div>
                    </div>
                    </div>
        ';
        
       
    
    } 
    echo $output;  
 
 ?>