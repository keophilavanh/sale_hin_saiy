<?php
 include_once('../../../session.php');
 include_once('../navbar.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../../css/bootadmin.min.css">
    <link rel="stylesheet" href="../../../css/datatables.min.css">
    <link rel="stylesheet" href="../../../font-face/stylesheet.css">
    


    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../js/bootadmin.min.js"></script>
    <script src="../../../js/datatables.min.js"></script>
    <script src="../../../js/sweetalert.min.js"></script>
    


    
    

    <title><?php echo $_SESSION['system_name'];?></title>
    
</head>
<body class="bg-light" style="font-family: 'Phetsarath OT'">
<nav class="navbar navbar-expand navbar-dark bg-dark shadow">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#"><?php echo $_SESSION['system_name'];?></a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#" class="nav-link back"><i class="material-icons"></i><font size="4"> ກັບຄືນ</font></a></li>
            
        </ul>
    </div>
</nav>

<div class="d-flex">

    <?php 
        echo $navbar;
    ?>

        <div class="content p-4">
              
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">        
                
                            <div class="col-sm-3">
                                <h5  id="supplier_name" >ຊື້ຜູ້ສະໜອງ :  </h5>
                                <h5  id="op_number" >ເລກທີສັ່ງຊື້ :  </h5>
                            </div>

                         
                
                    
                    
                </div>
                <div class="card-body">
                <table id="example" class="table table-bordered"  width="80%">
                <tr >
                    <td  height="400" colspan="2">

            
                            <div id="list" style="position: relative; overflow: hidden; overflow-y: scroll; height: 350px; width: 100%; ">
                          
                            </div>
                    </td>
                </tr> 
                <tr>
                   
                    <td  width="85%" >
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ລວມເງີນ</span>
                                </div>
                                <input type="text" id="total_ticket" class="form-control"  value="0"  style="text-align:right;" disabled>
                                <div class="input-group-append">
                                    <span class="input-group-text">ກີບ</span>
                                </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-lg Cash">ຮັບສິນຄ້າ</button>
                    </td>
                </tr> 
                </table>
                 







                


                
        

                
                
                    
                       
                   
                        
                

                    


                </div>
            </div>
            

            
        
         </div>
    
</div>

  
  
 

  
<script>
        $(document).ready(function () {

            $(document).on('click', '.back', function(){  
                window.location.replace('Purchase_list.php');
            });


            var id_url = location.search.split('id=')[1];

             $.ajax({  
                    url:"php/fetch_supplier.php",  
                    method:"POST",  
                    data:{id:id_url},  
                    dataType:"json",  
                    success:function(data){  
                         
                        
                        
                        $('#total_ticket').val(data.total);
                        document.getElementById("supplier_name").innerHTML ='ຊື້ຜູ້ສະໜອງ : '+data.sup_name ;
                        document.getElementById("op_number").innerHTML ='ເລກທີສັ່ງຊື້ : '+id_url ;
               
                       
                    }  
                });  

             $.ajax({
                    url:"php/select_itemlist.php",
                    method:"POST",
                    data:{id:id_url},
                    dataType:"text",
                    success:function(data){
                       
                    $('#list').html(data);
                    }
            })
            
           
            
         


            

           
            
           



            






          

            
            

            
            $(document).on('click', '.Cash', function(){  
                var x  = document.getElementById("list_item").rows[1].cells.item(0).innerHTML;
                if($('#supplier_id').val() == '')  
                    {  
                        swal({
                            title: "ເລືອກຜູ້ສະໜອງ",
                            text:   ' ຂໍ້ມູນຜູ້ສະໜອງ ບໍ່ມີຂໍ້ມູນ',
                            icon: "warning",
                        });  
                }
                
                else if(x != "" )
                {

                 
                    swal({
                        title: "ກະລຸນາຢືນຢັນ ?",
                        text: "ເຈົ້າຕ້ອງການບັນທືກ ແລະ ພິມໃບຂໍລາຄາ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            swal("ສຳເລັດ ການດຳເນີນງານ", {
                            icon: "success",
                            });
                            
                                var order_id =  location.search.split('id=')[1];
                                var item_code = [];
                                var item_name = [];
                                var item_qty = [];
                                var item_price = [];
                              
                                var ticket = 0;
                            
                                $('.item_code').each(function(){
                                item_code.push($(this).text());
                                });
                                $('.item_name').each(function(){
                                item_name.push($(this).text());
                                });
                                $('.item_qty').each(function(){
                                item_qty.push($(this).text());
                                });
                                $('.item_price').each(function(){
                                item_price.push($(this).text());
                                });
                               

                                $.ajax({
                                    url:"php/insert.php",
                                    method:"POST",
                                    data:{item_code:item_code,item_name:item_name,item_qty:item_qty,item_price:item_price,order_id:order_id},
                                    datatype:"text",
                                    success:function(data){
                                        
                                         ticket = data;
                                    }
                                });

                            
                            
                               window.setTimeout(
                                    function(){
                                            window.location.replace('Purchase_list.php')
                                        }, 800);
                        
  
                        } else {}

                    });
                    
                }
            });


            
            
        });
</script>








</body>
</html>