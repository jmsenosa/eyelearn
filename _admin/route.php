<?php 

include './helper/config.php';

use Admin\Libraries\Router;

/**
* 
*/
class Route
{
 
    private $_uri = array();
    private $_method = array();
    private $_namespaces = array(); 
    
    public  $_folder = null;

    public function __construct($folder)
    { 
        global $namespaces;
        global $includeFiles;

        $this->_folder = $folder;
        $this->_namespaces = $namespaces;  

        includeFiles($this->_namespaces, $this->_folder);


        $this->router = new Router( $folder ); 
    } 

    public function add($uri, $method = null)
    {
        $this->_uri[] = "/".trim( $uri , '/');

        if ($method != null) {
            $this->_method[] = $method;
        }
    }

    public function submit()
    { 

        $uriGetparam = isset($_GET['uri']) ? "/".$_GET['uri'] : '/'; 
 
        $url_get_params = explode("/", $uriGetparam);

        $pattern = '(\/([\w\d]{0,}))';

        if (preg_match($pattern, $uriGetparam, $match) ) {
            $uriGetparam = $match[0]; 
        }else{
            $uriGetparam = "/";
        } 

        foreach ($this->_uri as $key => $value) 
        {            
            
            if ( preg_match("#^$value$#", $uriGetparam) ) 
            { 
                if ( is_string( $this->_method[$key] )) 
                {
                    $useMethod = "\\".$this->_namespaces[$this->_folder]."\\".$this->_method[$key];       
                    $obj = new $useMethod();
                    $method = $this->router->_method;
                    
                    if (count($this->router->_params) > 0) 
                    {                        
                        call_user_func_array(array($obj, $method), $this->router->_params);
                    }
                    else
                    {
                        $obj->$method();
                    }
                }
                else 
                {
                    call_user_func($this->_method[$key]);
                } 
            }
        }
    }
}