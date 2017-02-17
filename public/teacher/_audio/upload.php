<?php
require_once("../../../includes/config.php");


if(!empty($_FILES)){
    

    //database configuration
    $dbHost = DB_SERVER;
    $dbUsername = DB_USER;
    $dbPassword = DB_PASS;
    $dbName = DB_NAME;

    //connect with the database
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if($conn->connect_errno){
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    $targetDir = "../../audio/" . $_POST['folder'] . "/";
    $fileName = $_FILES['file']['name'];
    $targetFile = $targetDir.$fileName;
    
    if (!file_exists("../../audio/" . $_POST['folder'])) {
        mkdir("../../audio/" . $_POST['folder'], 0777, true);
    }

    if(file_exists($targetFile)){
    
        echo "FIlE ALREADY EXIST!";
        http_response_code(403);
    }
    
    elseif(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
        //insert file information into db table
        $conn->query("INSERT INTO audio (filename, folder) VALUES('".$fileName."','".$_POST['folder']."')");
    }
    
}
?>