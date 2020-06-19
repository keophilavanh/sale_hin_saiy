<?php
 
 include '../../../session.php';
 include '../../../conn.php';
 include '../navbar.php';
 
 

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
    <!-- <link rel="stylesheet" href="../../../css/select2.css"> -->
    <link rel="stylesheet" href="../../../jq/jquery.datetimepicker.min.css"> 
    <link rel="stylesheet" href="../../../font-face/stylesheet.css">
<!--    <link rel="stylesheet" href="../../css/fullcalendar.min.css"> -->


    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../js/bootadmin.min.js"></script>
    <script src="../../../js/datatables.min.js"></script>
    <script src="../../../js/moment.min.js"></script>
    <!-- <script src="../../../js/select2.js"></script> -->
    <script src="../../../js/sweetalert.min.js"></script>
    <script src="../../../jq/jquery.datetimepicker.full.js"></script>
 <!--    <script src="../../js/fullcalendar.min.js"></script> -->
   

 
    
    

    <title><?php echo $_SESSION['system_name'];?></title>
    
</head>
<body class="bg-light" style="font-family: 'Phetsarath OT'">
<nav class="navbar navbar-expand navbar-dark bg-dark shadow">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#"><?php echo $_SESSION['system_name'];?></a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <a href="#" class="nav-link back"><i class="fas fa-sign-in-alt"></i><font size="4"> ກັບຄືນໜ້າຫຼັກ</font></a>
            
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
                    
                <div class="row mb-4" >
                            <div class="col-sm-3">
                                <h5  id="Customer_name" >ຊື້ລູກຄ້າ : ລູກຄ້າທົ່ວໄປ </h5>
                                <button type="button" class="btn btn-success customer">ເລືອກລູກຄ້າ</button>
                            </div>

                            <div  class="col-sm-9">
                                
                                <input type="hidden" name="customer" class="form-control" id="Customer_id" value="3"  />
                            </div>
                </div>
                   
                    
                    
                </div>
                <div class="card-body">
                <div align="right">   
                   
                    
                    <h1> </h1>
                    </div>
                <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                
                
                <tr >
                    <td width="450px" height="400" colspan="2">
                        
                          
                       
                        <div style="position: relative; overflow: hidden; overflow-y: scroll; height: 350px; width: 100%; padding: 8px;">
                        <table id="list_item" class="table table-bordered" cellspacing="0" width="100%">
                            <tr>
                                <th style="display:none;"></th>
                                <th width="60%">ຊື່ລາຍການ</th>
                                <th width="15%">ຈຳນວນ</th>
                                <th style="display:none;"></th>
                                <th width="25%">ລາຄາ</th>
                                <th width="5%"> </th>
                            
                            </tr>
                         
                           



                            


                        </table>
                        </div>
                    </td>
                    <td width="200px" height="400" rowspan="2">
                    <div style="position: relative; overflow: hidden; overflow-y: scroll; height: 450px; width: 100%; padding: 8px;">
                    <div class="row mb-4" id="Category" >

                    <!--

                   
                        ///           category
                   

                    -->

                    </div>
                    </div>
                    </td>

                    <td width="530px" height="400">
                    <div style="position: relative; overflow: hidden; overflow-y: scroll; height: 400px; width: 100%; padding: 8px;">
                    <div class="row mb-4" id="Product" >

                    

                   

                    
                    

                    

                    </div>
                    </div>
                    </td>
                   
                    
                </tr>
                <tr >
                    <td  ><div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ລວມເງີນ</span>
                            </div>
                            <input type="text" id="total_ticket" class="form-control"  value="0"  style="text-align:right;" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text">ກີບ</span>
                            </div>
                        </div>
                    </td>
                       
                   

                    <td >
                        <button type="button" class="btn btn-primary btn-lg Cash">ຊຳລະເງີນ</button>
                    </td>


                    <td >
                    <div class="input-group mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Barcode</div>
                    </div>
                    <input type="text" class="form-control" name="Barcode" id="Barcode" placeholder="Enter Barcode">
                    </div>

                    

                    </td>
                </tr>
                
                <tbody>
                
           
                
                
                
                
                
                
                
                </tbody>
            </table>
            </div>
            </div>


            <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ລາຍຊື່ລູກຄ້າ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" id="insert_form" autocomplete="off">
                    <table id="table_customer" class="table table-hover" cellspacing="0" width="100%">
                    
                    <thead>
                    <tr>
                        <th>ລະຫັດ</th>
                        <th>ຊື່ລູກຄ້າ</th>
                        <th>ປ້າຍລົດ</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody> 
                    </table>    
                          
                          


                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>

  
  
 

  
<script>
        $(document).ready(function () {
           
            $(document).on('click', '.back', function(){  
                window.location.replace('../../../main.php');
            });

             $(document).on('click', '.customer', function(){  
                $('#add_data_Modal').modal('show');
            });

             var dataTable = $('#table_customer').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                url:"php/select_customer.php",
                type:"POST"
                }

            });

             $(document).on('click', '.select_customer', function(){  
                var data_code = this.getAttribute("data-code");
                var data_Name = this.getAttribute("data-Name");
                
                $('#Customer_id').val(data_code);
                document.getElementById("Customer_name").innerHTML ='ຊື້ລູກຄ້າ : '+data_Name;
               
                $('#add_data_Modal').modal('hide');  
            });

            
            
         

           

           

            var count = 1;
            $(document).on('click', '.Click_Product', function(){  
                
                var data_code = this.getAttribute("data-code");
                var data_Name = this.getAttribute("data-Name");
                var data_price = this.getAttribute("data-Price");

                
                var table = document.getElementById("list_item");
                var rowsdata='No';
                for (var i = 0, row; row = table.rows[i]; i++) {
                
                    var x  = document.getElementById("list_item").rows[i].cells.item(0).innerHTML;
                    if(x == data_code){
                        
                        rowsdata='Yes';
                        var qty = document.getElementById("list_item").rows[i].cells.item(2).innerHTML;
                        var price = document.getElementById("list_item").rows[i].cells.item(3).innerHTML;
                        var total_qty = parseInt(qty, 10);
                        var total_price = parseInt(price, 10);
                        document.getElementById("list_item").rows[i].cells.item(2).innerHTML=total_qty+1;
                        document.getElementById("list_item").rows[i].cells.item(4).innerHTML=(total_qty+1)*total_price;

                        var total_bill = $('#total_ticket').val();
                        var total_price2 = parseInt(total_bill, 10);
                        var price = parseInt(data_price, 10);
                        $('#total_ticket').val(price + total_price2);
                    
                    }
                
                }
                if(rowsdata=='No'){

                        count = count + 1;
                        var html_code = "<tr id='row"+data_code+"'>";
                        html_code += "<td style='display:none;' contenteditable='false' class='item_code'>"+data_code+"</td>";
                        html_code += "<td width='60%' contenteditable='false' class='item_name'>"+data_Name+"</td>";
                        html_code += "<td width='15%' align='center' contenteditable='false' class='item_qty'>1</td>";
                        html_code += "<td style='display:none;' contenteditable='false' class='item_price'>"+data_price+"</td>";
                        html_code += "<td width='15%' align='right' contenteditable='false' class='item_total_price'>"+data_price+"</td>";
                        html_code += "<td> <button type='button' name='remove' data-row='"+data_code+"' class='btn btn-danger remove'><i class='far fa-trash-alt'></i></button></td>";
                        
                        html_code += "</tr>";  
                        $('#list_item').append(html_code);

                        var total_bill = $('#total_ticket').val();
                        var total_price = parseInt(total_bill, 10);
                        var price = parseInt(data_price, 10);
                        $('#total_ticket').val(price + total_price);
                    

                }

                
                            
            });

            $('#Barcode').keypress(function(e){
                var key = e.which;
                if(key == 13)  // the enter key code
                {
                    var id =  $('#Barcode').val();
                    $('#Barcode').val('');
                    var table = document.getElementById("list_item");
                    var rowsdata='No';
                    for (var i = 0, row; row = table.rows[i]; i++) {
                    
                        var x  = document.getElementById("list_item").rows[i].cells.item(0).innerHTML;
                        if(x == id){
                            
                            rowsdata='Yes';
                            var qty = document.getElementById("list_item").rows[i].cells.item(2).innerHTML;
                            var price = document.getElementById("list_item").rows[i].cells.item(3).innerHTML;
                            var total_qty = parseInt(qty, 10);
                            var total_price = parseInt(price, 10);
                            document.getElementById("list_item").rows[i].cells.item(2).innerHTML=total_qty+1;
                            document.getElementById("list_item").rows[i].cells.item(4).innerHTML=(total_qty+1)*total_price;
                            
                            var total_bill = $('#total_ticket').val();
                            var total_price2 = parseInt(total_bill, 10);
                            price = parseInt(price, 10);
                            $('#total_ticket').val(price + total_price2);
                          
                        }
                    
                    }
                   
                    if(rowsdata=='No'){

                        $.ajax({  
                            url:"php/fetch_barcode.php",  
                            method:"POST",  
                            data:{id:id},  
                            dataType:"json",  
                            success:function(data){  
                                
                                var html_code = "<tr id='row"+data.pro_barcode+"'>";
                                html_code += "<td style='display:none;' contenteditable='false' class='item_code'>"+data.pro_barcode+"</td>";
                                html_code += "<td width='60%' contenteditable='false' class='item_name'>"+data.pro_name+"</td>";
                                html_code += "<td width='15%' align='center' contenteditable='false' class='item_qty'>1</td>";
                                html_code += "<td style='display:none;' contenteditable='false' class='item_price'>"+data.sell_price+"</td>";
                                html_code += "<td width='15%' align='right' contenteditable='false' class='item_total_price'>"+data.sell_price+"</td>";
                                html_code += "<td> <button type='button' name='remove' data-row='"+data.pro_barcode+"' class='btn btn-danger remove'><i class='far fa-trash-alt'></i></button></td>";
                                
                                html_code += "</tr>";  
                                $('#list_item').append(html_code);
                                
                                var total_bill = $('#total_ticket').val();
                                var total_price2 = parseInt(total_bill, 10);
                                var price = parseInt(data.sell_price, 10);
                                $('#total_ticket').val(price + total_price2);
                                
                                
                
                            }  
                        });  
                        
                    }
                    
                    
                    return 0;  
                }

            });

            $(document).on('click', '.remove', function(){

            var delete_row = $(this).data("row");
            var table = document.getElementById("list_item");
                
                for (var i = 0, row; row = table.rows[i]; i++) {
                
                    var x  = document.getElementById("list_item").rows[i].cells.item(0).innerHTML;
                    if(x == delete_row){
                        
                        
                        var qty = document.getElementById("list_item").rows[i].cells.item(2).innerHTML;
                        var total_qty = parseInt(qty, 10);
                        if(total_qty > 1){

                            total_bill = $('#total_ticket').val();
                            var data_price = document.getElementById("list_item").rows[i].cells.item(3).innerHTML;
                            var total_ticket = parseInt(total_bill, 10);
                            var price = parseInt(data_price, 10);
                            $('#total_ticket').val(total_ticket-price);

                            var price = document.getElementById("list_item").rows[i].cells.item(3).innerHTML;
                            var total_price = parseInt(price, 10);
                            document.getElementById("list_item").rows[i].cells.item(2).innerHTML=total_qty-1;
                            document.getElementById("list_item").rows[i].cells.item(4).innerHTML=(total_qty-1)*total_price;
                            $('#list_item').append(html_code);
                            
                            
                           
                           
                           
                        }else{

                            total_bill = $('#total_ticket').val();
                            var data_price = document.getElementById("list_item").rows[i].cells.item(3).innerHTML;
                            var total_price = parseInt(total_bill, 10);
                            var price = parseInt(data_price, 10);
                            $('#total_ticket').val(total_price-price);

                            $('#row' + delete_row).remove();

                        }
                        
                    }
                
                }
               
           
            });

            

             $(document).on('click', '.Cash', function(){  
                var x  = document.getElementById("list_item").rows[1].cells.item(0).innerHTML;
                if($('#Customer_id').val() == '')  
                    {  
                        swal({
                            title: "ເລືອກວັນທີແຈ້ງເຕືອນ",
                            text:   ' ວັນທີແຈ້ງເຕືອນການຈ່າຍຄ່າຮຽນ ບໍ່ມີຂໍ້ມູນ',
                            icon: "warning",
                        });  
                }
                
                else if(x != "" )
                {

                 
                        swal({
                        title: "ກະລຸນາຢືນຢັນ ?",
                        text: "ເຈົ້າຕ້ອງການບັນທືກ ແລະ ພິມໃບຮັບເງີນ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            swal("ສຳເລັດ ການດຳເນີນງານ", {
                            icon: "success",
                            });
                                var Customer_id =  $('#Customer_id').val(); 
                                var item_code = [];
                                var item_name = [];
                                var item_qty = [];
                                var item_price = [];
                                var item_total_price = [];
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
                                $('.item_total_price').each(function(){
                                item_total_price.push($(this).text());
                                });

                                $.ajax({
                                    url:"php/insert.php",
                                    method:"POST",
                                    data:{item_code:item_code,item_name:item_name,item_qty:item_qty,item_price:item_price,item_total_price,Customer_id:Customer_id},
                                    datatype:"text",
                                    success:function(data){
                                        
                                        ticket = data;
                                    }
                                });
                            //    window.setTimeout(
                            //         function(){window.open('invoice/invoice.php?id='+ticket, '_blank')
                            //                 window.location.replace('Sell.php')
                            //             }, 800);
                        
  
                        } else {
                                
                                }
                        });
                    
                }
            });

            $.ajax({
                    url:"php/Category_select.php",
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                       
                    $('#Category').html(data);
                    }
                })

            $(document).on('click', '.Click_Category', function(){  
                var id = $(this).attr("id");  
                $.ajax({
                    url:"php/Product_select.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"text",
                    success:function(data){
                    $('#Product').html(data);
                    }
                })
            });
            



            
            
         
          

            
           

            



            
            
            

           


            
        });
</script>








</body>
</html>