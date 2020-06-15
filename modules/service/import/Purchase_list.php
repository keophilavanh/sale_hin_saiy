<?php
 include_once '../../../session.php';
 include_once '../navbar.php';
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
                    
                     
                    <h4>ຮັບສິນຄ້າ</h4>
                    
                    
                </div>
                <div class="card-body">
               
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                    <th>ລະຫັດ</th>
                    <th>ຜູ້ສະໜອງ</th>
                    <th>ວັນທີ</th>
                    <th >ມູນຄ່າລວມ</th>
                    <th>ສະຖານະ</th>
                    <th>ພະນັກງານ</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                
           
                
                
                
                
                
                
                
                </tbody>
            </table>

                 



                <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ລາຍການສິນຄ້າ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" id="insert_form" autocomplete="off">
                               
                            <div id="list">
                                    
                                    
                                    
                                   
                                   
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

            

            






             
            

           

            $(document).on('click', '.Edit_data', function(){  
                var id = $(this).attr("id");  
                
                window.location.replace('Import.php?id='+id);
                
                  
            }); 
            $(document).on('click', '.View_data_Purchase', function(){  
                var id = $(this).attr("id");  
                
                $.ajax({
                    url:"php/select_itemlist.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"text",
                    success:function(data){
                       
                    $('#list').html(data);
                    }

                })
                $('#add_data_Modal').modal('show');
                
                  
            }); 


            
        });
</script>








</body>
</html>