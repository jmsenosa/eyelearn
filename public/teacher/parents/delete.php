<?php 
    require_once("../../../includes/config.php");
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        
        $servername = DB_SERVER;
        $username = DB_USER;
        $password = DB_PASS;

        // Create connection
        $conn = new mysqli($servername, $username, $password, DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sqlWhere = "SELECT * FROM parent JOIN parentstud ON parent.id = parentstud.parent_id WHERE parent.id = ".$_GET['id'];
        $result = $conn->query($sqlWhere);
        // echo "<pre>";
        // print_r($result); die();

        if ($result->num_rows > 0) {
            echo '
                <script type="text/javascript">
                    alert("This parent is connected to a student!");
                    window.location.href = "index.php";
                </script>';
        }else{
            $sql = "DELETE FROM parent WHERE id = ".$_GET['id'];
            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }

            header('Location: index.php');
        }        
    } 
?>




