<?php
 include 'session.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootadmin.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="font-face/stylesheet.css">
 

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootadmin.min.js"></script>
    <script src="js/datatables.min.js"></script>
 


    
    

    <title><?php echo $_SESSION['system_name'];?></title>
    
</head>
<body class="bg-light" style="font-family: 'Phetsarath OT'">

<nav class="navbar navbar-expand navbar-dark bg-dark shadow">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#"><?php echo $_SESSION['system_name'];?></a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="material-icons"></i><font size="4"> ອອກຈາກລະບົບ</font></a></li>
            
        </ul>
    </div>
</nav>


<div class="bg-light py-5 text-center">
        <div class="container">
           
    
            <h1><?php echo $_SESSION['system_name'];?></h1>
            <p class="lead mb-4">...</p>
    
            <div class="row">
                
                    <div class="col-md-4 service">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-desktop fa-stack-1x fa-inverse"></i>
                        
                        
                        
                    </span>
                        <h4>ບໍລິການ</h4>
                        <p class="mb-4">Service</p>
                    </div>
                
                    <div class="col-md-4 manag">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-cog fa-stack-1x fa-inverse"></i>
                        
                    <!--  -->
                        
                    </span>
                        <h4>ຈັດການຂໍ້ມູນ</h4>
                        <p class="mb-4"> Manage Data</p>
                    </div>

                   <div class="col-md-4 report">
                    <span class="fa-stack fa-5x mb-2">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-file-alt fa-stack-1x fa-inverse"></i>
                        
                       
                    </span>
                        <h4>ບົດລາຍງານ</h4>
                        <p class="mb-4">Report</p>
                    </div>
               
               
              
                
            </div>

           
        </div>
    </div>
  
  
 

  
<script>
        $(document).ready(function () {

           

           


            

             $(document).on('click', '.manag', function(){  
                 
                window.location.replace('modules/manag/manag/manag.php');
                  
            });
            $(document).on('click', '.service', function(){  
                 
                 window.location.replace('modules/service/Service/service.php');
                   
             });
             $(document).on('click', '.report', function(){  
                 
                 window.location.replace('modules/report/report/report.php');
                   
             });


            
        });
</script>








</body>
</html>