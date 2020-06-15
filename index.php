
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootadmin.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="font-face/stylesheet.css">


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootadmin.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>


    
    

    <title>System Name</title>
    
</head>
<body class="bg-light" style="font-family: 'Phetsarath OT'">
<div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                
                <center>
                <img src="image/logo.jpg" width="300" height="200"/>
                </center>
                <br/>
                <div class="card">
                    <div class="card-body">
                        <form method="post" id="login_form" >
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input id="Username" name="Username" type="text" class="form-control" placeholder="Username" autocomplete="off">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" autocomplete="off">
                            </div>

                            <div id="myAlert" class="alert alert-danger collapse">
                                                <button type="button" class="close" id="linkClose">&times;</button>
                                                <strong>ຜິດພາດ! :</strong> ກະລູນາປ້ອນຂໍ້ມູນໃຫ້ຄົບ ຂໍຂອບໃຈ.
                            </div>
                            <div id="myAlert2" class="alert alert-danger collapse">
                                                <button type="button" class="close" id="linkClose2">&times;</button>
                                                <strong>ຜິດພາດ! :</strong> ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ ຂໍຂອບໃຈ.
                            </div>

                            

                            <div class="row">
                                <div class="col pr-2">
                                    <button id="login" type="button" class="btn btn-block btn-primary">Login</button>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">

    $(document).ready(function () {

         $('#linkClose').click(function () {
                $('#myAlert').hide('fade');
            });
        $('#linkClose2').click(function () {
                $('#myAlert2').hide('fade');
            });

        $("#login").click(function () {
            if($("#Username").val() == '' ){
                $('#myAlert').show('fade');
            } else if($("#Password").val() == '' ){
                $('#myAlert').show('fade');
            }

            else{
                $.ajax({
                url: "check.php",
                type: 'POST',
                data: $('#login_form').serialize(),
                datatype:"text",
                success: function(data){
                   
                    if(data === 'true'){
                        
                        window.location.replace('main.php');
                    }else{
                        $('#myAlert2').show('fade');
                        //alert(data);
                    } 
                }
                });


            }
            

        });
    });
</script>