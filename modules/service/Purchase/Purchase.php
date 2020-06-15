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
            <li class="nav-item"><a href="#" class="nav-link back"><i class="material-icons"></i><font size="4"> ກັບຄືນໜ້າຫຼັກ</font></a></li>
            
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
                    
                     
                    <h4>ຂໍ້ມູນສັ່ງຊື້ສິນຄ້າ</h4>
                    
                    
                </div>
                <div class="card-body">
                <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ສ້າງໃບຂໍລາຄາສິນຄ້າ</button>
                    
                    <h1> </h1>
                    </div>
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                    <th>ລະຫັດ</th>
                    <th>ຜູ້ສະໜອງ</th>
                    <th>ວັນທີ</th>
                    <th style="text-align: center">ມູນຄ່າລວມ</th>
                    <th>ສະຖານະ</th>
                    <th>ການຈ່າຍເງີນ</th>
                    <th>ພະນັກງານ</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                
           
                
                
                
                
                
                
                
                </tbody>
            </table>

                 



               



                


                
        

                
                
                    
                       
                   
                        
                

                    


                </div>
            </div>
            

            
        
         </div>
    
</div>

  
  
 

  
<script>
        $(document).ready(function () {

            $(document).on('click', '.back', function(){  
                window.location.replace('../../../main.php');
            });
            
            var dataTable = $('#example').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                url:"php/select.php",
                type:"POST"
                }

            });

            

            $('#add').click(function () {
               
                window.location.replace('quotation.php');
                  
            });




            $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });


             $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
         
            if($('#UnitName').val() == '')  
            {  
                $('#myAlert').show('fade');  
            } 
           
            
   
            else  
            {  
            $.ajax({  
                url:"php/insert_update_delete.php",  
                method:"POST",  
                data:$('#insert_form').serialize(),  
                beforeSend:function(){  
                $('#insert').val("ເພີ້ມລາຍການ");  
                },  
                success:function(data){  
                $('#insert_form')[0].reset();  
                $('#add_data_Modal').modal('hide');  
                dataTable.ajax.reload();
                
                }  
            }); 
                
            }  
            });
            
            $(document).on('click', '.Purchase', function(){  
                var employee_id = $(this).attr("id");  

                swal({
                        title: "ຢືນຢັນ ການສັ່ງຊື້ສິນຄ້າ ?",
                        text: "ເຈົ້າຕ້ອງການສັ່ງຊື້ສິນຄ້າ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            
                               
                            $.ajax({  
                                url:"php/update_status.php",  
                                method:"POST",  
                                data:{employee_id:employee_id},  
                                 
                                success:function(data){  
                                    dataTable.ajax.reload();
                
                                }  
                            });  
                            swal("ສຳເລັດ ການດຳເນີນງານ", {
                            icon: "success",
                            });
                        
  
                        } else {
                                
                                }
                        });

              
            });

             $(document).on('click', '.cash', function(){  
                var employee_id = $(this).attr("id");  

                swal({
                        title: "ຢືນຢັນ ການຈ່າຍຄ່າສິນຄ້າ ?",
                        text: "ເຈົ້າຕ້ອງການຈ່າຍຄ່າສິນຄ້າ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            
                               
                            $.ajax({  
                                url:"php/Payment_status.php",  
                                method:"POST",  
                                data:{employee_id:employee_id},  
                                 
                                success:function(data){  
                                    dataTable.ajax.reload();
                
                                }  
                            });  
                            swal("ສຳເລັດ ການດຳເນີນງານ", {
                            icon: "success",
                            });
                        
  
                        } else {
                                
                                }
                        });

              
            });

            $(document).on('click', '.cancel_data', function(){  
                var employee_id = $(this).attr("id");  
                
                 swal({
                        title: "ຢືນຢັນ ການຍົກເລີກ",
                        text: "ເຈົ້າຕ້ອງການຍົກເລີກ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({  
                                    url:"php/cancel_status.php",  
                                    method:"POST",  
                                    data:{employee_id:employee_id},  
                                    dataType:"json",  
                                    success:function(data){  
                                       
                                    }
                                });
                                dataTable.ajax.reload();

                            swal("ສຳເລັດ ການດຳເນີນງານ", {
                            icon: "success",
                            });

                        }      
                    }); 
                
                  
            }); 

            $(document).on('click', '.Edit_data', function(){  
                var id = $(this).attr("id");  
                
                window.location.replace('Edit_quotation.php?id='+id);
                
                  
            }); 

             $(document).on('click', '.View_Purchas', function(){  
                var id = $(this).attr("id");  

                
                window.open('invoice/invoice_purchase.php?id='+id, '_blank')
                  
            }); 

            $(document).on('click', '.View_quotation', function(){  
                var id = $(this).attr("id");  

                
                window.open('invoice/invoice.php?id='+id, '_blank')
                  
            }); 



            
        });
</script>








</body>
</html>