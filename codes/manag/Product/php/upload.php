
<?php
//insert.php  
include_once('../../../../conn.php'); 
session_start();
if(!empty($_POST))

{
    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target = "../images/".$newfilename;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }


    
   
    $query = "UPDATE tb_product SET image = '$newfilename' WHERE pro_barcode = '".$_POST["id_update"]."'";
    mysqli_query($connect, $query);
   
  
}
?>
