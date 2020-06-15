<?php

$navbar="";
if( $_SESSION['permission'] == "Admin"){
    
$navbar = '

<div class="sidebar sidebar-dark bg-dark ">
<ul class="list-unstyled">
    
    <li>  
        
                   
        <li><a href="../Product/Product.php"><i class="fas fa-shopping-cart"></i> ຈັດການຂໍ້ມູນສິນຄ້າ</a></li>
        <li><a href="../Category/Category.php"><i class="fas fa-box-open"></i> ຈັດການຂໍ້ມູນປະເພດສິນຄ້າ</a></li>
        <li><a href="../Unit/Unit.php"><i class="fas fa-cubes"></i> ຈັດການຂໍ້ມູນຫົວໜ່ວຍ</a></li>
        <li><a href="../Supplier/Supplier.php"><i class="fas fa-truck"></i> ຈັດການຂໍ້ມູນຜູ້ສະໜອງ</a></li> 
        <li><a href="../Customer/customer.php"><i class="fas fa-users"></i> ຈັດການຂໍ້ມູນລູກຄ້າ</a></li>
        <!--    <li><a href="../Expire_product/Expire_product.php"><i class="fas fa-history"></i> ຈັດການຂໍ້ມູນສິນຄ້າໝົດອາຍຸແລ້ວ</a></li> -->
        <li><a href="../Employee/Employee.php"><i class="fas fa-address-card"></i> ຈັດການຂໍ້ມູນພະນັກງານ</a></li>
                    
                  
        
        
    </li>
   

    
</ul>
</div>
';
} elseif( $_SESSION['permission'] == "Employee"){

   
$navbar = '

<div class="sidebar sidebar-dark bg-dark ">
<ul class="list-unstyled">
    
    <li>  
        
                   
    <!--    <li><a href="../Product/Product.php"><i class="fas fa-shopping-cart"></i> ຈັດການຂໍ້ມູນສິນຄ້າ</a></li> 
        <li><a href="../Category/Category.php"><i class="fas fa-box-open"></i> ຈັດການຂໍ້ມູນປະເພດສິນຄ້າ</a></li>
        <li><a href="../Unit/Unit.php"><i class="fas fa-cubes"></i> ຈັດການຂໍ້ມູນຫົວໜ່ວຍ</a></li>
        <li><a href="../Supplier/Supplier.php"><i class="fas fa-truck"></i> ຈັດການຂໍ້ມູນຜູ້ສະໜອງ</a></li>  -->
        <li><a href="../Customer/customer.php"><i class="fas fa-users"></i> ຈັດການຂໍ້ມູນລູກຄ້າ</a></li>
        <!--    <li><a href="../Expire_product/Expire_product.php"><i class="fas fa-history"></i> ຈັດການຂໍ້ມູນສິນຄ້າໝົດອາຍຸແລ້ວ</a></li> 
                <li><a href="../Employee/Employee.php"><i class="fas fa-address-card"></i> ຈັດການຂໍ້ມູນພະນັກງານ</a></li>  -->
                    
                  
        
        
    </li>
   

    
</ul>
</div>
';

}


?>