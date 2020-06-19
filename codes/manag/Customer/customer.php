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
                    
                     
                    <h4>ຂໍ້ມູນລູກຄ້າ</h4>
                    
                    
                </div>
                <div class="card-body">
                <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ເພີ້ມຂໍ້ມູນລູກຄ້າ</button>
                    
                    <h1> </h1>
                    </div>
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                    <th>ລະຫັດ</th>
                    <th>ຊື່</th>
                    <th>ນາມສະກຸນ</th>
                    <th>ປ້າຍລົດ</th>
                    <th>ເບີໂທ</th>
                    <th>ບັດປະຈຳຕົວ</th>
                    <th>ທີ່ຢູ່</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
           
                
                
                
                
                
                
                
                </tbody>
            </table>

                 



                <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ເພີ້ມລາຍການ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" id="insert_form" autocomplete="off">
                               
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ຊື່ລູກຄ້າ</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName" >
                                    </div>
                                    
                                    <div class="col-sm-5">
                                            <label >ນາມສະກຸນ</label>
                                            <input type="text" class="form-control" name="lastName" id="lastName" >
                                    </div>
                                   
                                   
                            </div>
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ເບີໂທ</label>
                                        <input type="text" class="form-control" name="phone" id="phone" >
                                    </div>

                                    <div class="col-sm-5">
                                        <label  >ປ້າຍລົດ</label>
                                        <input type="text" class="form-control" name="car_number" id="car_number" >
                                    </div>
                            </div>
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ບັດປະຈຳຕົວ</label>
                                        <input type="text" class="form-control" name="cart" id="cart" >
                                    </div>

                                   
                            </div>
                            <div class="form-group row">
                                    
                                   
                                    <div class="col-sm-12">
                                            <label >ທີຢູ່ປັດຈຸບັນ</label>
                                            <textarea class="form-control"  rows="3" name="Address" id="Address"></textarea>
            
                                    </div>
                            </div>
                          
                                <br />
                                <input type="hidden" name="employee_id" id="employee_id" />
                                <input type="hidden" name="status" id="status" />
                                <input type="submit" name="insert" id="insert" value="ເພີ້ມລາຍການ" class="btn btn-success" />
                                

                                <h5> </h5>
                                        <div id="myAlert" class="alert alert-danger collapse">
                                                <button type="button" class="close" id="linkClose">&times;</button>
                                                <strong>ຜິດພາດ! :</strong> ກະລູນາປ້ອນຂໍ້ມູນໃຫ້ຄົບ ຂໍຂອບໃຈ.
                                        </div>

                            </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>



                


                
        

                
                
                    
                       
                   
                        
                

                    


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
               
                $('#add_data_Modal').modal('show');
                $('#insert').val("ເພີ້ມຂໍ້ມູນລູກຄ້າ");
                $('#insert_form')[0].reset();
                $('#status').val('Insert');
                  
            });




            $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });


             $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
         
            if($('#firstName').val() == '')  
            {  
                $('#myAlert').show('fade');  
            } 
            else if($('#lastName').val() == '')  
            {  
                $('#myAlert').show('fade');  
            } 
            else if($('#phone').val() == '')  
            {  
                $('#myAlert').show('fade');  
            } 

            else if($('#car_number').val() == '')  
            {  
                $('#myAlert').show('fade');  
            } 

            else if($('#cart').val() == '')  
            {  
                $('#myAlert').show('fade');  
            } 

            else if($('#Address').val() == '')  
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
            
            $(document).on('click', '.edit_data', function(){  
                var employee_id = $(this).attr("id");  
                
                $.ajax({  
                    url:"php/fetch.php",  
                    method:"POST",  
                    data:{employee_id:employee_id},  
                    dataType:"json",  
                    success:function(data){  
                         
                        $('#firstName').val(data.cus_fname);  
                        $('#lastName').val(data.cus_lname); 
                        $('#phone').val(data.cus_phone); 
                        $('#car_number').val(data.cus_car_number); 
                        $('#Address').val(data.cus_address);
                        $('#cart').val(data.cus_cart); 
                      

                        $('#employee_id').val(data.cus_id);  
                       
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂຂໍ້ມູນລູກຄ້າ");
                        $('#status').val('Update');  
                    }  
                });  
            });

            $(document).on('click', '.delete_data', function(){  
                var employee_id = $(this).attr("id");  
                var status ='Delete';
                 swal({
                        title: "ລົບຂໍ້ມູນ",
                        text: "ເຈົ້າຕ້ອງການລົບຂໍ້ມູນ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({  
                                    url:"php/insert_update_delete.php",  
                                    method:"POST",  
                                    data:{employee_id:employee_id,status:status},  
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


            
        });
</script>








</body>
</html>