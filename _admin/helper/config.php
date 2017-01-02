<?php 

foreach (glob("./config/*.php") as $filename)
{
    include $filename;
}
foreach (glob("./libraries/*.php") as $filename)
{
    include $filename;
}
foreach (glob("./helper/*.php") as $filename)
{    
    if ($filename != "./helper/config.php") {
        include $filename;
        # code...
    }
}
function includeFiles($namespaces, $folder)
{ 
    $loc = strtolower(str_replace("\\", "/", $namespaces[$folder])); 
    $loc = str_replace("admin/","",$loc);
    
    foreach (glob($loc."/*.php") as $filename)
    {
        // echo $filename."<br>";
        include $filename;
    }
}