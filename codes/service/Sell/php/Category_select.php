<?php  
 //fetch.php 
 include_once '../../../../conn.php';
  
  
    $query = "SELECT * FROM tb_category Where active=1";  
    $result = mysqli_query($connect, $query);  
    $output='';
    while( $row =  mysqli_fetch_array($result)) {
    
        $output.='  <div class="Click_Category" style="padding: 7px;" id= "'.$row["cat_id"].'">
                    <div class="d-flex border" style="width: 150px; height: 80px;" >
                
                        <div class="flex-grow-1 bg-white p-4 manag" >
                            <center>
                            
                            <font size="4" >'.$row["cat_name"].'</font>
                            </center>
                        </div>
                    </div>
                    </div>
        ';
        
       
    
    } 
    $img =' <div class="edit_data2" style="padding: 7px;" id= "1">
            <div class="d-flex border" style="width: 150px; height: 100px;" >
                    <div class="row mb-4" >
                    <center>
                    <div style="padding-left: 15px">
                    <img src="Setting.png" width="148" height="60" />
                    </div>
                    <div style="padding-top: 5px">
                    <font style="font-size: 11px;font-size:1vw;" >ເຂົ້າໜົມປາທາໂລ</font>
                    </div>
                    </center>
                    </div>
                
            </div>
            </div>';
    echo $output;  
 
 ?>