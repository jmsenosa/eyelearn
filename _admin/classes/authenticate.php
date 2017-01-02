<?php
namespace Admin\Classes;

use Admin\Libraries\Templating;
use Admin\Libraries\Session;
use Admin\Libraries\MySQLDatabase;

use Admin\helper\Helpers;

Class Authenticate extends Templating
{
    private $router = null;
    private $templates = null; 

    public function __construct(){

        global $redirect;  
        parent::__construct();
    } 

    public function login() {
        $session = new Session();
        $database = new MySQLDatabase();

        if ($session->is_logged_in() === true) {
            redirect("index");
        }

        if (isset($_POST["login-submit"])) {
            $username = $database->escape_value($_POST["username"]);
            $password = $database->escape_value($_POST["password"]);
            $data = $database->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND type_id = 1");
            
            if ($data->num_rows > 0) {
                print_r($data); die();
            }
        }

        $this->page("login", "admin/accounts/login",[]);
        echo $this->_segments["login"];
    }

    public function index() {
        $this->title = "title"; 

        $this->page("content", "admin/accounts/index", ["key"=>"this is sparta"]);
        // echo "<pre>"; print_r($this->_segments);
        $this->render(); 
    }
}