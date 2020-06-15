<?php session_start();
            if($_SESSION['ses_id']==''){
              echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
            }elseif($_SESSION['ses_id']!=''){
               
            } 
?>