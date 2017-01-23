<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Magulang extends DatabaseObject {
	
	protected static $table_name="parent";
	protected static $db_fields = array('id', 'username', 'first_name', 'last_name','password');

	public $id;
	public $username;
	public $first_name;
	public $password;
	public $last_name;
	


	
	public function full_name() {
	if(isset($this->first_name) && isset($this->last_name)) {
		return $this->first_name . " " . $this->last_name;
	} else {
		return "";
	}
	}
    
    public static function authenticate_parent($username="", $password="") {


    $sql  = "SELECT * FROM parent ";
    $sql .= "WHERE username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";
    $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
  



    public static function check_username($username="") {

    $sql  = "SELECT * FROM parent ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "LIMIT 1";
    $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	
}
