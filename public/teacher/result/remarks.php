<?php
require_once('../../../includes/initialize.php');
$connection2 = mysqli_connect(DB_SERVER, DB_USER, DB_PASS,DB_NAME);


   $update = mysqli_query($connection2,"update quiz_result set remarks = '{$_POST['remarks']}' where id='{$_POST['id']}' ");
    if($update){
        echo "success";
        
    }
    else{
        echo mysqli_error($connection2);
    } 

mysqli_close($connection2);

    ?>