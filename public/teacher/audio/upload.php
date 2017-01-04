<?php
if(!empty($_FILES)){
    
    include("../../includes/config.php");
    //database configuration
/*    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'eyelearn_db';
*/
    //connect with the database
    //
 

    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


    if($conn->connect_errno){
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    $targetDir = "../../audio/" . $_POST['folder'] . "/";
    $fileName = $_FILES['file']['name'];
    $targetFile = $targetDir.$fileName;
    
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