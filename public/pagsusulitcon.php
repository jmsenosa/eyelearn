<?php 

require_once('../includes/initialize.php');

$today = date('Y-m-d H:i:s');

$remarks; 
$score = $_POST['score'];
$total_number = $_POST['total_number'];

$current_item = $_POST['current_item'] - 1;

if(($score/$total_number) <= 0.2)
{
    $remarks = "Needs Improvement"; 
}
elseif (($score/$total_number) >= 0.21 && $score/$total_number <= 0.4)
{
    $remarks = "good";
}
elseif(($score/$total_number) >= 0.41 && ($score/$total_number) <= 0.6)
{
    $remarks = "Very good";
}
elseif(($score/$total_number) >= 0.61 && ($score/$total_number) <= 0.8)
{
    $remarks = "Fantastic";
}
else
{
    $remarks = "Excellent";
}

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} 

$sql = "
    SELECT * FROM quiz_result WHERE
        total_number > ".$current_item." AND 
        lesson_id = ".$_POST['id']." AND
        user_id = ".$_POST['user_id']." AND 
        quiz_id = ".$_POST['quiz_id']." LIMIT 1
";


$result = $mysqli->query($sql);
// dd();
if ($result->num_rows > 0) {
    while($row = $mysqli->fetch_array($result)) {
        $fcsqlup = "
            UPDATE 
                quiz_result 
            set 
                current_item = '{$_POST['current_item']}', 
                score = '{$_POST['score']}',
                remarks = '{$remarks}' 
            where  
                id = '{$row['id']}' ";

        $update = $mysqli->query($fcsqlup);

        $quiz = Quiz::find_by_id($_POST['quiz_id'],$_POST['id']);
        if ($score == $quiz[0]->answer) { 
            $quiz[0]->score = 1;
        }else{
            $quiz[0]->score = 0;
        }
        echo json_encode($quiz[0]);
    }
}else{

    $quiz_result = new Quiz_result();

    $quiz_result->lesson_id = $_POST['id'];
    $quiz_result->quiz_id = $_POST['quiz_id'];
    $quiz_result->user_id = $_POST['user_id'];
    $quiz_result->score = $_POST['score'];
    $quiz_result->total_number = $_POST['total_number'];
    $quiz_result->quiz_date = $today;
    $quiz_result->current_item = $_POST['current_item'];
    $quiz_result->remarks = $remarks;
    $quiz_result->save();
    $quiz = Quiz::find_by_id($_POST['quiz_id'],$_POST['id']);
    if ($score == $quiz[0]->answer) { 
        $quiz[0]->score = 1;
    }else{
        $quiz[0]->score = 0;
    }
    echo json_encode($quiz[0]);
}

