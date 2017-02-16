<?php  
    require_once('../../includes/initialize.php');
    // Check if User is Logged in to view this page.
    
    if (!$session->is_logged_in()) { redirect_to("login.php"); }
    /**
    *  
    */
    class StudentAll 
    {
        
        public $mysqli = null;

        public function __construct() {

            $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                die();
            }
        }

        public function get_student( $params = array() ) {
            $student = Student::get_all_joined($params);
            return $student;
        }

        
    }
?>