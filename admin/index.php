<?php  

include 'route.php';

use Admin\Classes\Authenticate;

$route = new Route();

$route->add('/'); 
$route->add('/login'); 


$route->submit(); 

echo "<pre>";
print_r($route); die();