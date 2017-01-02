<?php  

require 'route.php'; 
 
use Admin\Classes\Authenticate;
use Admin\Classes\Main;

$admin = new Route("admin"); 

$admin->add('/',function(){
    
}); 

$admin->add('/account','Authenticate'); 
 
$admin->submit();  