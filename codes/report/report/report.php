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
<!--    <link rel="stylesheet" href="../../css/fullcalendar.min.css"> -->


    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../js/bootadmin.min.js"></script>
    <script src="../../../js/datatables.min.js"></script>
    <script src="../../../js/moment.min.js"></script>
    <script src="../../../js/chart.min.js"></script>
    <!-- <script src="../../../js/asyc.js"></script> -->
 <!--    <script src="../../js/fullcalendar.min.js"></script> -->
   

 
    
    

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

        
        <div class="row">
            <div class="ml-3">
                <button type="button" id="send_data" class="btn btn-primary  btn-lg "> <i class="fas fa-cloud-upload-alt"></i> ອັບໂຫລດຂໍ້ມູນ</button>
            </div> 
            <div id="loading" class="ml-3 p-2 d-none" >
                <i class="fas fa-spinner fa-pulse fa-lg"></i> Loading...
            </div> 
            <div class="col-md-12 mt-3">
              <div class="card ">
                    <div class="card-header bg-white font-weight-bold">        
                      
                       
                      <h4>ຂໍ້ມູນ Chart</h4>
                      
                      
                    </div>
                    <div class="card-body">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3">
              <div class="card ">
                    <div class="card-header bg-white font-weight-bold">        
                      
                       
                      <h4>ຂໍ້ມູນສິນຄ້າຂາຍດີ</h4>
                      
                      
                    </div>
                    <div class="card-body" id="top_sale">
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3 ">
              <div class="card ">
                    <div class="card-header bg-white font-weight-bold">        
                      
                       
                      <h4>ຂໍ້ມູນພະນັກງານດີເດັ່ນ</h4>
                      
                      
                    </div>
                    <div class="card-body" id="top_employee">
                       
                    </div>
                </div>
            </div>

           

               
        </div>       

        

            
        
        
    
</div>


  
  
 

  
<script>

        window.onload = function() {

            
           
            

            var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "light2",
                        title:{
                            text: ""
                        },
                        axisY: {
                            title: ""
                        },
                        data: [{
                            type: "column",
                            yValueFormatString: "#,##0.## ກີບ",
                            dataPoints: []
                        }]
                        });
                        chart.render();



            $.ajax({
                    url:"chart_data.php",
                    method:"POST",
                    dataType:"json",
                    success:function(data){

                            console.log(data);
                        
                            chart.options.data[0].dataPoints = data;
                            chart.render();
                        
                      
                    }
                });
                       
        }

        
          

        
        $(document).ready(function () {


            

            $(document).on('click', '.back', function(){  
                window.location.replace('../../../main.php');
            });

            $.ajax({
                    url:"top_selling.php",
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                    $('#top_sale').html(data);
                    }
                });
            
           
            $.ajax({
                    url:"top_employee_selling.php",
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                    $('#top_employee').html(data);
                    }
                });


                $(document).on('click', '#send_data', function(){  
    
                    
                    document.getElementById("loading").classList.remove("d-none");


                    $.ajax({  
                        url:"../upload.php",  
                        method:"POST",  
                        data:{},  
                        dataType:"text",  
                        success:function(data){
                            console.log(data);  
                            document.getElementById("loading").classList.add("d-none");
                        }  
                    });  
        
  
                });

               

            


            
        });
</script>








</body>
</html>