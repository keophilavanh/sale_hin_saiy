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
            <li class="nav-item"><a href="#" class="nav-link back"><i class="material-icons"></i><font size="4"> ກັບຄືນ</font></a></li>
            
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
                                <h5  id="supplier_name" >ຊື້ຜູ້ສະໜອງ :  </h5>
                                <button type="button" class="btn btn-success supplier">ເລືອກຜູ້ສະໜອງ</button>
                            </div>

                            <div  class="col-sm-9">
                                
                                <input type="hidden" name="supplier" class="form-control" id="supplier_id"  />
                            </div>
                </div>
                    
                    
                </div>
                <div class="card-body">
                <table id="example" class="table table-bordered" cellspacing="0" width="100%">
                <tr >
                    <td  height="400" colspan="3">

                        <div style="position: relative; overflow: hidden; overflow-y: scroll; height: 350px; width: 100%; ">
                        <table id="list_item" class="table table-bordered " cellspacing="0" width="100%">
                        
                        <thead>
                        <tr>
                            <th>ລະຫັດ</th>
                            <th  width="40%">ລາຍການສິນຄ້າ</th>
                            <th width="8%" style="text-align: center">ຈຳນວນ</th>
                            <th  width="15%" style="text-align: right">ລາຄາ</th>
                            <th  width="15%" style="text-align: right">ລາຄາລວມ</th>
                            <th><button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >+</button></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        </table>
                        </div>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <div class="input-group mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Barcode</div>
                        </div>
                        <input type="text" class="form-control" name="Barcode" id="Barcode" placeholder="Enter Barcode">
                        </div>
                    </td>
                    <td>
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ລວມເງີນ</span>
                            </div>
                            <input type="text" id="total_ticket" class="form-control"  value="0"  style="text-align:right;" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text">ກີບ</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-lg Cash">ບັນທືກ</button>
                    </td>
                </tr> 
                </table>
                 



                <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ລາຍການສິນຄ້າ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" id="insert_form" autocomplete="off">
                               
                    <table id="table_product" class="table table-hover" cellspacing="0" width="100%">
                    
                    <thead>
                    <tr>
                        <th>ລະຫັດ</th>
                        <th>ຊື່ສິນຄ້າ</th>
                        <th>ປະເພດ</th>
                        <th>ຈຳນວນ</th>
                       
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


                <div id="add_data_Modal_supplier" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ລາຍຊື່ຜູ້ສະໜອງ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" id="insert_form" autocomplete="off">

                    <table id="table_supplier" class="table table-hover" cellspacing="0" width="100%">
                    
                    <thead>
                    <tr>
                        <th>ລະຫັດ</th>
                        <th>ຊື່ຜູ້ສະໜອງ</th>
                       
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



                


                
        

                
                
                    
                       
                   
                        
                

                    


                </div>
            </div>
            

            
        
         </div>
    
</div>

  
  
 

  
<script>
        $(document).ready(function () {

            $(document).on('click', '.back', function(){  
                window.location.replace('Purchase.php');
            });

             $(document).on('click', '.supplier', function(){  
                $('#add_data_Modal_supplier').modal('show');
            });
            
            $('#table_supplier').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                url:"php/select_supplier.php",
                type:"POST"
                }

            });

             $('#table_product').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                url:"php/select_product.php",
                type:"POST"
                }

            });
           

            

            $('#add').click(function () {
               
                $('#add_data_Modal').modal('show');
                $('#insert').val("ເພີ້ມຂໍ້ມູນຫົວໜ່ວຍສິນຄ້າ");
                $('#insert_form')[0].reset();
                $('#status').val('Insert');
                  
            });
            
            $(document).on('click', '.select_pupplier', function(){  
                var data_code = this.getAttribute("data-code");
                var data_Name = this.getAttribute("data-Name");
                
                $('#supplier_id').val(data_code);
                document.getElementById("supplier_name").innerHTML ='ຊື້ຜູ້ສະໜອງ : '+data_Name;
               
                $('#add_data_Modal_supplier').modal('hide');  
            });


            $(document).on('blur', '.item_qty', function(){  

                var table = document.getElementById("list_item");
                var qty =  $(this).text();
                for (var i = 0, row; row = table.rows[i]; i++) {

                    var x  = document.getElementById("list_item").rows[i].cells.item(2).innerHTML;
                        if(x == qty){
                            var price = document.getElementById("list_item").rows[i].cells.item(3).innerHTML;
                            price = parseInt(price, 10);
                            qty = parseInt(qty, 10);
                            document.getElementById("list_item").rows[i].cells.item(4).innerHTML= qty * price;
                        }


                }
                var total_price = parseInt(0, 10);;
                
                for (var i = 0, row; row = table.rows[i]; i++) {
                    
                    if(parseInt(document.getElementById("list_item").rows[i].cells.item(4).innerHTML, 10)){
                        total_price += parseInt(document.getElementById("list_item").rows[i].cells.item(4).innerHTML, 10);
                    }

                    
                }
                $('#total_ticket').val(total_price); 

            });

             $(document).on('blur', '.item_price', function(){  

                var table = document.getElementById("list_item");
                var price =  $(this).text();
                for (var i = 0, row; row = table.rows[i]; i++) {

                    var x  = document.getElementById("list_item").rows[i].cells.item(3).innerHTML;
                        if(x == price){
                            var qty = document.getElementById("list_item").rows[i].cells.item(2).innerHTML;
                            price = parseInt(price, 10);
                            qty = parseInt(qty, 10);
                            document.getElementById("list_item").rows[i].cells.item(4).innerHTML= qty * price;
                        }


                }
                var total_price = parseInt(0, 10);;
                
                for (var i = 0, row; row = table.rows[i]; i++) {
                    
                    if(parseInt(document.getElementById("list_item").rows[i].cells.item(4).innerHTML, 10)){
                        total_price += parseInt(document.getElementById("list_item").rows[i].cells.item(4).innerHTML, 10);
                    }

                    
                }
                $('#total_ticket').val(total_price); 
            });


             $(document).on('click', '.select_product', function(){ 

                var data_code = this.getAttribute("data-code");
                var data_Name = this.getAttribute("data-Name");
                var data_price = this.getAttribute("data-Price");
                $('#add_data_Modal').modal('hide');  

                 var count = 1;
            
                
                

                
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
                        html_code += "<td  contenteditable='false' class='item_code'>"+data_code+"</td>";
                        html_code += "<td  contenteditable='false' class='item_name'>"+data_Name+"</td>";
                        html_code += "<td align='center' contenteditable class='item_qty'>1</td>";
                        html_code += "<td align='right' contenteditable class='item_price'>"+data_price+"</td>";
                        html_code += "<td align='right' contenteditable='false' class='item_total_price'>"+data_price+"</td>";
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
                                html_code += "<td  contenteditable='false' class='item_code'>"+data.pro_barcode+"</td>";
                                html_code += "<td  contenteditable='false' class='item_name'>"+data.pro_name+"</td>";
                                html_code += "<td  align='center' contenteditable class='item_qty'>1</td>";
                                html_code += "<td  align='right' contenteditable class='item_price'>"+data.sell_price+"</td>";
                                html_code += "<td  align='right' contenteditable='false' class='item_total_price'>"+data.sell_price+"</td>";
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


            
            $(document).on('click', '.Cash', function(){  
                var x  = document.getElementById("list_item").rows[1].cells.item(0).innerHTML;
                if($('#supplier_id').val() == '')  
                    {  
                        swal({
                            title: "ເລືອກຜູ້ສະໜອງ",
                            text:   ' ຂໍ້ມູນຜູ້ສະໜອງ ບໍ່ມີຂໍ້ມູນ',
                            icon: "warning",
                        });  
                }
                
                else if(x != "" )
                {

                 
                        swal({
                        title: "ກະລຸນາຢືນຢັນ ?",
                        text: "ເຈົ້າຕ້ອງການບັນທືກ ແລະ ພິມໃບຂໍລາຄາ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            swal("ສຳເລັດ ການດຳເນີນງານ", {
                            icon: "success",
                            });
                                var supplier_id =  $('#supplier_id').val(); 
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
                                    data:{item_code:item_code,item_name:item_name,item_qty:item_qty,item_price:item_price,item_total_price,supplier_id:supplier_id},
                                    datatype:"text",
                                    success:function(data){
                                        
                                        ticket = data;
                                    }
                                });
                               window.setTimeout(
                                    function(){window.open('invoice/invoice.php?id='+ticket, '_blank')
                                            window.location.replace('Purchase.php')
                                        }, 800);
                        
  
                        } else {
                                
                                }
                        });
                    
                }
            });



            
        });
</script>








</body>
</html>