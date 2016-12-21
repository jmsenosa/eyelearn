<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class User extends DatabaseObject {
	
	protected static $table_name="users";
	protected static $db_fields = array('id', 'type_id', 'username', 'password', 'first_name', 'middle_name', 'last_name', 'email', 'phone', 'address', 'active', 'last_update','fromtime','totime');
	
	public $id;
	public $type_id;
	public $username;
	public $password;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $email;
	public $phone;
	public $address;
	public $active;
	public $last_update;

     public $fromtime;
     public $totime;
	

	
	//Find all except ADMIN
	public static function find_all_sudent() {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE type_id=4 ");
	}
	
	//Find all except ADMIN
	public static function find_admin() {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE type_id=1 ");
	}
	//Find all except ADMIN
	public static function find_teacher() {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE type_id=2 ");
	}//Find all except ADMIN
	public static function find_parents() {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE type_id=3 ");
	}//Find all except ADMIN
	public static function find_student() {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE type_id=4 ");
	}
	
	//Find all except ADMIN
	public static function find_all_except_admin() {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE type_id!=1 ");
	}
	
  public function full_name() {
    if(isset($this->first_name) && isset($this->last_name)) {
      return $this->first_name . " " . $this->last_name;
    } else {
      return "";
    }
  }
  
	// public function get_type() {
    // if(isset($this->type)) {
      // return $this->type;
    // } else {
      // return "";
    // }
  // }

	public static function authenticate($username="", $password="") {


    $sql  = "SELECT * FROM users ";
    $sql .= "WHERE username = '{$username}' ";
    if($password != "Student"){
        $sql .= "AND password = '{$password}' ";
    }
    $sql .= "LIMIT 1";
    $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
    
    public static function authenticate_parent($token="") {
    global $database;
    $username = $database->escape_value($token);

    $sql  = "SELECT * FROM users WHERE parent_token = '{$username}'";
    $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function check_username($username="") {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);

    $sql  = "SELECT * FROM users ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "LIMIT 1";
    $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	
}

?>