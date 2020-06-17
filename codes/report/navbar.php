<?php

$navbar="";
if( $_SESSION['permission'] == "Admin"){
    
    $navbar = '

    <div class="sidebar sidebar-dark bg-dark ">
    <ul class="list-unstyled">
        
        <li>  
            
            <li><a href="../report/report.php"><i class="fa fa-fw fa-tachometer-alt"></i> ເດດບອດ</a></li>
            <li><a href="../report_sale/report_sale.php"><i class="fas fa-chart-pie"></i> ລາຍງານການຂາຍສິນຄ້າ</a></li>
            <li><a href="../report_product/report_product.php"><i class="fas fa-chart-pie"></i> ລາຍງານສິນຄ້າໃນຮ້ານ</a></li>
            <!--    <li><a href="../report_product_minimum/report.php" target="_blank"><i class="fas fa-chart-pie"></i> ລາຍງານສິນຄ້າໃກ້ໝົດ</a></li>
            <li><a href="../report_Expire_product/report_Expire_product.php"><i class="fas fa-chart-pie"></i> ລາຍງານສິນຄ້າໝົດອາຍຸແລ້ວ</a></li> -->
            <li><a href="../report_Purchase/report_Purchase.php"><i class="fas fa-chart-pie"></i> ລາຍງານການສັ່ງຊື້ສິນຄ້າ</a></li>
            <li><a href="../report_Import/report_Import.php"><i class="fas fa-chart-pie"></i> ລາຍງານການຮັບຊື້ສິນຄ້າ</a></li> 
            <li><a href="../report_payment/report_payment.php"><i class="fas fa-chart-pie"></i> ລາຍງານລາຍຈ່າຍ</a></li>

        <!--    <li><div class="p-3"> <button type="button" id="send_inbox" class="btn btn-primary  btn-lg form-control"> <i class="fas fa-cloud-upload-alt"></i> ອັບໂຫລດຂໍ້ມູນ</button><div></li> -->
                        
                      
            
            
        </li>
       
    
        
    </ul>
    </div>
    ';
    
} elseif( $_SESSION['permission'] == "Employee"){

   
    $navbar = '

    <div class="sidebar sidebar-dark bg-dark ">
    <ul class="list-unstyled">
        
        <li>  
            
                       
        <!--     <li><a href="../report_sale/report_sale.php"><i class="fas fa-chart-pie"></i> ລາຍງານການຂາຍສິນຄ້າ</a></li> -->
            <li><a href="../report_product/report_product.php" ><i class="fas fa-chart-pie"></i> ລາຍງານສິນຄ້າໃນຮ້ານ</a></li>
            <li><a href="../report_product_minimum/report.php" target="_blank"><i class="fas fa-chart-pie"></i> ລາຍງານສິນຄ້າໃກ້ໝົດ</a></li>
            <li><a href="../report_Expire_product/report_Expire_product.php"><i class="fas fa-chart-pie"></i> ລາຍງານສິນຄ້າໝົດອາຍຸແລ້ວ</a></li> 
        <!--    <li><a href="../report_Purchase/report_Purchase.php"><i class="fas fa-chart-pie"></i> ລາຍງານການສັ່ງຊື້ສິນຄ້າ</a></li>
            <li><a href="../report_Import/report_Import.php"><i class="fas fa-chart-pie"></i> ລາຍງານການຮັບຊື້ສິນຄ້າ</a></li> 
            <li><a href="../report_payment/report_payment.php"><i class="fas fa-chart-pie"></i> ລາຍງານລາຍຈ່າຍ</a></li> -->
                        
                      
            
            
        </li>
       
    
        
    </ul>
    </div>
    ';
    

}

?>