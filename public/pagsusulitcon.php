<?php
require_once('../includes/initialize.php');

$connection2 = mysqli_connect(DB_SERVER, DB_USER, DB_PASS,DB_NAME);

$today = date('Y-m-d H:i:s');

$remarks;

$score = $_POST['score'];

$total_number = $_POST['total_number'];

if(($score/$total_number) <= 0.2){
    $remarks = "Needs Improvement"; 
}
elseif(($score/$total_number) >= 0.21 && $score/$total_number <= 0.4){
    $remarks = "good";
}
elseif(($score/$total_number) >= 0.41 && ($score/$total_number) <= 0.6){
    $remarks = "Very good";
}
elseif(($score/$total_number) >= 0.61 && ($score/$total_number) <= 0.8){
    $remarks = "Fantastic";
}
else{
    $remarks = "Excellent";
}

$fcsql = "
    SELECT 
        * 
    FROM 
        quiz_result 
    where 
        total_number > (current_item-1) and 
        lesson_id='{$_POST['id']}' and 
        user_id = '{$_POST['user_id']} and
        quiz_id = '{$_POST['quiz_id']}'

    LIMIT 1'";

$isContinue = mysqli_query($connection2,$fcsql);
if(mysqli_num_rows($isContinue) > 0) 
{
    while($row = mysqli_fetch_array($isContinue))
    {
        $fcsqlup = "UPDATE 
                        quiz_result 
                            set 
                                current_item = '{$_POST['current_item']}', 
                                score = '{$_POST['score']}',
                                remarks = '{$remarks}' 
                            where  
                                id = '{$row['id']}' ";

        $update = mysqli_query($connection2, $fcsqlup);
    }
} else {

    $sqlInst =  "INSERT INTO 
                        quiz_result(
                            `lesson_id`,
                            `quiz_id`,
                            `user_id`,
                            `score`,
                            `total_number`,
                            `quiz_date`,
                            `current_item`,
                            `remarks`) 
                        values (
                            '{$_POST['id']}',
                            '{$_POST['quiz_id']}',
                            '{$_POST['user_id']}',
                            '{$_POST['score']}',
                            '{$_POST['total_number']}',
                            '{$today}',
                            '{$_POST['current_item']}',
                            '{$remarks}')
                        ";

    $insert = mysqli_query( $connection2,$sqlInst);

    echo mysqli_error($connection2);
}