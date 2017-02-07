<?php 
    require_once('../../../includes/initialize.php');
    require_once("../../../includes/config.php");

    if (!$session->is_logged_in()) { redirect_to("signin.php"); }
    
    $db_host = DB_SERVER;
    $db_user = DB_USER;
    $db_password = DB_PASS;
    $db_name = DB_NAME;

    //connect with the database
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    if($conn->connect_errno){
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }


    // Find User 
    $user = User::find_by_id($_SESSION['user_id']);
    $students = Student::find_all();
    $obj = 'Quiz Result';

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=student-data-'.md5(date("Y-m-d H:i:s")).'.csv');
    ob_start();
    $output = fopen('php://output', 'w');

    $query = '
        SELECT 
            quiz_result.id as ID,
            CONCAT(student.first_name, " ",student.last_name) as Student,     
            lesson.name as Lesson_name,
            lesson.lesson_number as Lesson_number,
            quiz_result.score as Quiz_score,
            quiz_result.total_number as Total_number,
            quiz_result.quiz_status as Quiz_status,
            quiz_result.remarks as Quiz_remarks,
            quiz_result.quiz_date as Quiz_date,
            CONCAT(users.first_name, " ",users.last_name) as Teacher 
        FROM 
            quiz_result
        LEFT JOIN 
            lesson ON quiz_result.lesson_id = lesson.id
        LEFT JOIN
            quiz ON quiz_result.quiz_id = quiz.id
        LEFT JOIN
            student ON quiz_result.user_id = student.id
        LEFT JOIN 
            users ON users.id = lesson.user_id
        WHERE 
            users.id = '.$_SESSION['user_id'];  

    $header_fields = array(
        "ID",
        "Student",
        "Lesson_name",
        "Lesson_number",
        "Quiz_score",
        "Total_number",
        "Quiz_status",
        "Quiz_remarks",
        "Quiz_date",
        "Teacher"
    );

    fputcsv($output, $header_fields);

    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) fputcsv($output, $row);
    }
    fclose($output);   
    exit();

?>