<?php
require_once('../../../includes/initialize.php');
$connection2 = mysqli_connect(DB_SERVER, DB_USER, DB_PASS,DB_NAME);
 $today = date('Y-m-d');
$ifexist = mysqli_query($connection2,"select * from attendance where student_id = '{$_POST['id']}' and `date` = '{$today}' ");
if($_POST['type'] == "present"):
   
    if(mysqli_num_rows($ifexist) > 0 ){
        mysqli_query($connection2,"update attendance set `attendance` = 'present' where student_id = '{$_POST['id']}' and `date` = '{$today}'");
    }
    else{
          mysqli_query($connection2,"insert into attendance(`student_id`,`date`,`attendance`) values ('{$_POST['id']}', '{$today}','present')");
      
    }
    
else:
    if(mysqli_num_rows($ifexist) > 0 ){
            mysqli_query($connection2,"update attendance set `attendance` = 'absent' where student_id = '{$_POST['id']}' and `date` = '{$today}'");
        }
    else{
         mysqli_query($connection2,"insert into attendance(`student_id`,`date`,`attendance`) values ('{$_POST['id']}', '{$today}','absent')");
    }
endif;