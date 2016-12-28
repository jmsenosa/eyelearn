<?php 

/**
* 
*/
class Route
{
 
    private $_uri = array();

    public function __construct()
    {
        # code...
    }

    public function add($uri)
    {
        $this->_uri[] = "/".trim( $uri , '/');
    }

    public function submit()
    {
        $uriGetparam = isset($_GET['uri']) ? $_GET['uri'] : '/';

        foreach ($this->_uri as $key => $value) 
        {            
            if ( preg_match("#^$value$#", $uriGetparam) ) {
                
            }
        }
    }
}