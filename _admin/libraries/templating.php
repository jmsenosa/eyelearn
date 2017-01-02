<?php  
namespace Admin\Libraries;

use Admin\Config\Layouts;
/**
* 
*/
class Templating 
{  
    private $title     = "";
    private $_content  = "";
    private $_index    = ""; 
    public  $_segments = ["title"];
    
    public function __construct()
    {
        global $layouts;  
        $this->_index = $layouts['content']; 
    }

    public function render()
    {  
        if ($this->title != "") {
            $this->_segments["title"] = $this->title;
        }

        echo $this->_renderPhpToString("./layouts/".$this->_index.".php", $this->_segments);
    } 

    public function page($content, $page = "", $params = []) 
    {
        $this->_segments[$content] = $this->_renderPhpToString('./views/'.$page.".php", $params);  
    }


    private function _renderPhpToString($file, $vars=null)
    {
        if (is_array($vars) && !empty($vars)) {
            extract($vars);
        }

        ob_start();
        
        include $file;
        return ob_get_clean();
    }
}