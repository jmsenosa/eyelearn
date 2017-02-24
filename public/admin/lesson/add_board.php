<?php
require_once('../../../includes/initialize.php');
$connection2 = mysqli_connect(DB_SERVER, DB_USER, DB_PASS,DB_NAME);

$count = mysqli_query($connection2, "select * from lesson_dtl where board='{$_POST['board']}' and lesson_id='{$_POST['lesson']}'");
$row = mysqli_num_rows($count);
if($row >=6){
    $update = mysqli_query($connection2,"update lesson_dtl set board = '' where id='{$_POST['id']}' ");
    echo "fail";
     
}
else{
   $update = mysqli_query($connection2,"update lesson_dtl set board = '{$_POST['board']}' where id='{$_POST['id']}' ");
    if($update){
        echo "success";
        
    }
    else{
        echo mysqli_error($connection2);
    } 
}
mysqli_close($connection2);

    ?>