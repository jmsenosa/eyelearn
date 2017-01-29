<?php 
    
    require_once("../../../includes/config.php");
    require_once('../../../includes/initialize.php');

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    $output = fopen('php://output', 'w');

    $servername = DB_SERVER;
    $username = DB_USER;
    $password = DB_PASS;

    // Create connection
    $conn = new mysqli($servername, $username, $password, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "
        SELECT 
            student.lrn as lrn,
            section.section as section,
            student.first_name as first_name,
            student.middle_name as middle_name,
            student.last_name as last_name,
            student.active as status, 
            parent.id as parent_id,
            parent.first_name as Parent_first_name,
            parent.last_name as Parent_last_name,
            parent.phone as phone,
            parent.email as email
        FROM
            student
        LEFT JOIN
            parentstud
            ON
                student.id = parentstud.student_id
        LEFT JOIN
            parent
            ON
                parentstud.parent_id = parent.id
        JOIN
            section
            ON
                student.section_id = section.id
        WHERE 
            teacher = ".$_SESSION['user_id']." 
    "; 

    if ( isset($_POST['submit']) ) {
        $dateStart = $_POST['yearstart'];
        $dateEnd   = $_POST['endstart'];

        if (strtotime($dateStart) <= strtotime($dateEnd)) {
            $sql = $sql . " AND sy >= ".$dateStart." AND sy <= ".$dateEnd;
        }
    }else{
        $sql = $sql . "AND sy = ".date('Y');
    } 

    $sql = $sql." GROUP BY student.id"; 

    $result = $conn->query($sql);
    $column = array_keys(get_object_vars($result->fetch_object())); 
    
    fputcsv($output, $column);

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) { 
        fputcsv($output, $row);
    };

    exit();    
    
?>