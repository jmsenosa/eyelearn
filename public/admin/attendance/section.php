<?php
require_once('../../../includes/initialize.php');
$connection2 = mysqli_connect(DB_SERVER, DB_USER, DB_PASS,DB_NAME);
$json = array();
$select = mysqli_query($connection2,"select * from section where created_by ='{$_POST['id']}'") or die(mysqli_error($connection2));
while($row = mysqli_fetch_array($select)){
    $section = array(
        'section' => $row['section']
    );
        array_push($json,$section);
}
echo json_encode($json);