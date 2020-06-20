<?php

$navbar="";
if( $_SESSION['permission'] == "Admin"){
    $navbar = '

<div class="sidebar sidebar-dark bg-primary ">
<ul class="list-unstyled">
    
    <li>  
        
                   
        <li><a href="../Sell/Sell.php"><i class="fas fa-shopping-cart"></i> ການຂາຍສິນຄ້າ</a></li>
        <li><a href="../Purchase/Purchase.php"><i class="fas fa-cart-plus"></i> ການສັ່ງຊື້ສິນຄ້າ</a></li>
        <li><a href="../import/Purchase_list.php"><i class="fas fa-cart-arrow-down"></i> ການຮັບສິນຄ້າ</a></li>

    </li>
   

    
</ul>
</div>
';
} elseif( $_SESSION['permission'] == "Employee"){

    $navbar = '

<div class="sidebar sidebar-dark bg-primary ">
<ul class="list-unstyled">
    
    <li>  
        
                   
        <li><a href="../Sell/Sell.php"><i class="fas fa-shopping-cart"></i> ການຂາຍສິນຄ້າ</a></li>
    <!--    <li><a href="../Purchase/Purchase.php"><i class="fas fa-cart-plus"></i> ການສັ່ງຊື້ສິນຄ້າ</a></li> -->
        <li><a href="../import/Purchase_list.php"><i class="fas fa-cart-arrow-down"></i> ການຮັບສິນຄ້າ</a></li>

    </li>
   

    
</ul>
</div>
';

}


?>