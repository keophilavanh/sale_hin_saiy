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
                    
                     
                    <h4>ຂໍ້ມູນສິນຄ້າ</h4>
                    
                    
                </div>
                <div class="card-body">
                <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ເພີ້ມຂໍ້ມູນສິນຄ້າ</button>
                    
                    <h1> </h1>
                    </div>
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                    <th>ຮູບພາບ</th>
                    <th>Barcode</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ປະເພດສິນຄ້າ</th>
                    <th>ຈຳນວນສິນຄ້າ</th>
                    <th>ລາຄາທົນທືນ</th>
                    <th>ລາຄາຂາຍ</th>
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
                                    
                                    <div class="col-sm-6">
                                        <label  >ບາໂຄດ</label>
                                        <input type="text" class="form-control" name="barcode" id="barcode" >
                                    </div>
                                    <div class="col-sm-6">
                                        <label  >ຊື່ສິນຄ້າ</label>
                                        <input type="text" class="form-control" name="Name" id="Name" >
                                    </div>
                                    
                                   
                                   
                            </div>
                            <div class="form-group row">
                                    
                                    <div class="col-sm-6">
                                        <label  >ປະເພດສິນຄ້າ</label>
                                        <select class="form-control"  name="category" id="category">

                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label  >ຫົວໜວ່ຍສິນຄ້າ</label>
                                        <select class="form-control"  name="unit" id="unit">

                                        </select>
                                    </div>
                                    
                                   
                                   
                            </div>
                            <div class="form-group row">
                                    
                                    <div class="col-sm-6">
                                        <label  >ລາຄາທົນທືນ</label>
                                        <input type="text" class="form-control" name="buy_price" id="buy_price" >
                                    </div>
                                    <div class="col-sm-6">
                                        <label  >ລາຄາຂາຍ</label>
                                        <input type="text" class="form-control" name="sell_price" id="sell_price" >
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


                
                <div id="add_data_Modal2" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ແກ້ໄຂຮູບພາບ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form id="image_form" method="post" enctype="multipart/form-data">
                    <center>
                    <h4  class="modal-title">ເລືອກຮູບສິນຄ້າ</h4>
                    <br />
                    <p><label>Select Image</label>
                    <input type="file" name="image" id="image" /></p><br />
                    <input type="hidden" name="id_update" id="id_update" class="form-control" style="width:250px"/>
                    <input type="submit" name="cancel" id="cancel" value="ບັນທຶກ" class="btn btn-success"/>
                    </center>
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

             $.ajax({
                    url:"php/category_select.php",
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                    $('#category').html(data);
                    }
                })
                $.ajax({
                    url:"php/unit_select.php",
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                    $('#unit').html(data);
                    }
                })

            

            $('#add').click(function () {
               
                $('#add_data_Modal').modal('show');
                $('#insert').val("ເພີ້ມຂໍ້ມູນສິນຄ້າ");
                $('#insert_form')[0].reset();
                $('#status').val('Insert');
                  
            });




            $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });


             $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
         
            if($('#barcode').val() == '')  
            {  
                $('#myAlert').show('fade');  
            } 
            else if($('#Name').val() == '')  
            {  
                $('#myAlert').show('fade');  
            }
            else if($('#category').val() == '')  
            {  
                $('#myAlert').show('fade');  
            }
            else if($('#unit').val() == '')  
            {  
                $('#myAlert').show('fade');  
            }
            else if($('#buy_price').val() == '')  
            {  
                $('#myAlert').show('fade');  
            }
            else if($('#sell_price').val() == '')  
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
                         
                        $('#barcode').val(data.pro_barcode); 
                        $('#Name').val(data.pro_name);  
                        $('#category').val(data.cat_id);  
                        $('#unit').val(data.uni_id);  
                        $('#buy_price').val(data.buy_price);  
                        $('#sell_price').val(data.sell_price);   

                        $('#employee_id').val(data.pro_barcode);  
                       
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂຂໍ້ມູນສິນຄ້າ");
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


             $(document).on('click', '.Upload', function(){  
                
                $('#id_update').val($(this).attr("id"));
                $('#add_data_Modal2').modal('show');
                 
            });

            $('#image_form').submit(function(event){
                event.preventDefault();
                var image_name = $('#image').val();
                if(image_name == '')
                {
                alert("Please Select Image");
                return false;
                }
                else
                {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Invalid Image File");
                    $('#image').val('');
                    return false;
                }
                else
                {
                    $.ajax({
                    url:"php/upload.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                    
                    
                    $('#image_form')[0].reset();
                    $('#add_data_Modal2').modal('hide');
                    dataTable.ajax.reload();
                    }
                    });
                }
                }
                });


            
        });
</script>








</body>
</html>