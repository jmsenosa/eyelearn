<?php 
namespace Admin\Libraries;
/**
* 
*/
class Router 
{
    private $_root = "";
    public $_object = "";
    public $_method = "index";
    public $_params = [];
    
    function __construct($root = "")
    {
        $this->_root = ($root != "") ? $root : "/";
    
        $this->render_uri();
    }


    private function render_uri() 
    {
        $parameter = explode("/",$_SERVER['REQUEST_URI']);
        $counterkey = array_search($this->_root, $parameter);      
        /*$key = $key + 1; 
        $this->_object = $parameter[$key];
        $key = $key + 1; 
        $this->_method = ( isset($parameter[$key+2]) ) ? $parameter[$key+2] : "index";   */     
        $counter = 0;
        $paramCounter = 1;
        for ($i=$counterkey+1; $i < count($parameter); $i++) { 
            
            if ($counter == 0) 
            {
                $this->_object = $parameter[$i];
            }
            elseif ($counter == 1) 
            {
                $this->_method = $parameter[$i];
            }else{
                $name = "param".$paramCounter;
                // echo $name."<br>";
                $this->_params[$name] = $parameter[$i];
                $paramCounter = $paramCounter + 1;
            }


            $counter = $counter + 1;
        }
    } 

} 