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
    <link rel="stylesheet" href="../../../jq/jquery.datetimepicker.min.css"> 
    <link rel="stylesheet" href="../../../font-face/stylesheet.css">


    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../js/bootadmin.min.js"></script>
    <script src="../../../js/datatables.min.js"></script>
    <script src="../../../js/sweetalert.min.js"></script>
    <script src="../../../jq/jquery.datetimepicker.full.js"></script>
    


    
    

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
                
                <div class="card-body">
                <br/>
                <center>
                <h2>ລາຍງານສິນຄ້າພາຍໃນຮ້ານ </h2>
                </center>
                <br/>
                <br/>
                <form name="myForm" id="myForm" action="report.php" target="_blank" method="post" autocomplete="off"  >
                    <div class="row">
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-2">
                                        <center  ><h4>ປະເພດສິນຄ້າ</h4></center>
                                        <select class="form-control"  name="category" id="category">

                                        </select>
                                    </div>
                            


                    </div>
                    <div class="col-sm-5">
                    </div>
                                            
                    <br/>
                    <br/>

                    <center>
                        <input type="submit" name="insert" id="insert" value="ພືມລາຍງານ" class="btn btn-primary btn-lg print" />
                    
                    </center>
                    
                
                    
                    </div>
                </form>
            </div>
            

            
        
         </div>
    
</div>

  
  
 

  
<script>

       

        $(document).ready(function () {

            $(document).on('click', '.back', function(){  
                window.location.replace('../../../main.php');
            });


            $.ajax({
                    url:"php/category_select.php",
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                    $('#category').html(data);
                    }
                })

           
           

             $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });

            
        });
</script>








</body>
</html>