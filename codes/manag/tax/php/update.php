
<?php
include_once('../../../../conn.php');
if(!empty($_POST))
{
  
        $query="UPDATE `tb_tax` SET `total`='".$_POST["tax"]."'

        WHERE id = 1";  
        if(mysqli_query($connect, $query)){
                $output = array(
                        'status' => 'ok',
                        'msg' =>  'Insert ສຳເລັດ...'
        
                        );
                    echo json_encode($output);  
        }else{

                $output = array(
                        'status' => 'error',
                        'msg' =>  mysqli_error($connect),
                        );
                    echo json_encode($output);  
                   
        }
        
            
  
    
}
?>
