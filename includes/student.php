<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Student extends DatabaseObject {
	
	protected static $table_name="student";
	protected static $db_fields = array('id', 'lrn', 'first_name', 'middle_name','parent_first_name','parent_last_name', 'last_name','active', 'last_update','address','sy','section_id','section','teacher');

	public $id;
	public $lrn;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $active;
	public $last_update;
    public $address;
    public $section;
    public $section_id;
    public $teacher;
    public $parent_last_name;
    public $parent_first_name;
    public $sy;


	
	public function full_name() {

    	if(isset($this->first_name) && isset($this->last_name)) {
    		return $this->first_name . " " . $this->last_name;
    	} else {
    		return "";
	    }
	}
  
    public static function find_by_year($sy){
		
		
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE sy='{$sy}'";
		return self::find_by_sql($sql);
	}	
    
    public static function find_my_parent($lastname,$firstname){
		
		
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE parent_last_name='{$lastname}' and parent_first_name='{$firstname}'";
		return self::find_by_sql($sql);
	}	
  
	public static function find_by_section($id=0){
		
		global $database;
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE section=" .$database->escape_value($id);
		return self::find_by_sql($sql);
	}	
	

    public static function check_username($username="") {

        $sql  = "SELECT * FROM student ";
        $sql .= "WHERE lrn = '{$username}' ";
        $sql .= "LIMIT 1";
        $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
    
    public static function find_ifexist($first_name,$last_name,$lrn) {

    $sql  = "SELECT * FROM student ";
    $sql .= "WHERE lrn = '{$lrn}' and first_name = '{$first_name}' and last_name =  '{$last_name}' ";
    $sql .= "LIMIT 1";
    $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
    public static function find_by_lrn($lrn) {

        $sql  = "SELECT * FROM student ";
        $sql .= "WHERE lrn = '{$lrn}'";
        $sql .= "LIMIT 1";
        $result_array = static::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }
	
}
