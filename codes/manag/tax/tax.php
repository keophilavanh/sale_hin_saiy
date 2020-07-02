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
<!--    <link rel="stylesheet" href="../../css/fullcalendar.min.css"> -->


    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../js/bootadmin.min.js"></script>
    <script src="../../../js/datatables.min.js"></script>
    <script src="../../../js/moment.min.js"></script>
    <script src="../../../js/sweetalert.min.js"></script>
 <!--    <script src="../../js/fullcalendar.min.js"></script> -->
   

 
    
    

    <title><?php echo $_SESSION['system_name'];?></title>
    
</head>
<body class="bg-light" style="font-family: 'Phetsarath OT'">
<nav class="navbar navbar-expand navbar-dark bg-primary shadow">
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
                      <h4>ຂໍ້ມູນອາກອນ</h4>
                  </div>
                  <div class="card-body">
                  
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ອາກອນ %</label>
                                        <input type="number" class="form-control" name="tax" id="tax" >
                                    </div>
                                    
                                   
                                   
                            </div>
  
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="Save">ບັນທືກຂໍ້ມູນ</button>
                </div>
              </div>
              
  
              
          
           

        

            
        
        
    
</div>

  
  
 

  
<script>
        $(document).ready(function () {

            $(document).on('click', '.back', function(){  
                window.location.replace('../../../main.php');
            });

            $.ajax({
                    url:"php/fetch.php",
                    method:"POST",
                    dataType:"json",
                    success:function(data){
                        $('#tax').val(data.total);
                    }
                });

          
            

            $('#Save').click(function () {
               
                var tax = $('#tax').val();

                $.ajax({  
                    url:"php/update.php",  
                    method:"POST",  
                    data:{tax:tax},  
                    dataType:"json",  
                    success:function(data){  
                        console.log(data);

                        if(data.status == 'ok'){
                            swal("ສຳເລັດ ການດຳເນີນງານ", {
                            icon: "success",
                            });

                        }
                         
                        
                    }  
                });  
                  
            });




            $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });


             $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
             if($('#Name').val() == '')  
            {  
                $('#myAlert').show('fade');  
            }
            else if($('#password').val() == '')  
            {  
                $('#myAlert').show('fade');  
            }  
            
   
            else  
            {  
            $.ajax({  
                url:"php/User/insert.php",  
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
                    url:"php/User/fetch.php",  
                    method:"POST",  
                    data:{employee_id:employee_id},  
                    dataType:"json",  
                    success:function(data){  
                         
                        $('#Name').val(data.Name);  
                        $('#password').val(data.password); 
                        $('#employee_id').val(data.id);  
                        $('#type').val(data.permistion);
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂລາຍການ");
                        $('#status').val('Update');  
                    }  
                });  
            });

            $(document).on('click', '.delete_data', function(){  
                var employee_id = $(this).attr("id");  
                
                $.ajax({  
                    url:"php/User/fetch.php",  
                    method:"POST",  
                    data:{employee_id:employee_id},  
                    dataType:"json",  
                    success:function(data){  
                        $('#Name').val(data.Name);  
                        $('#password').val(data.password); 
                        $('#employee_id').val(data.id);  
                        $('#type').val(data.permistion);
                       
                        
                        $('#employee_id').val(data.id);  
                        $('#insert').val("ລົບລາຍການ");  
                        $('#status').val('Delete'); 
                        $('#add_data_Modal').modal('show');
                    }
                });
                dataTable.ajax.reload();  
            }); 


            
        });
</script>








</body>
</html>