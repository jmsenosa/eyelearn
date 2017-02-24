<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Parentstud extends DatabaseObject {
	
	protected static $table_name="parentstud";
	protected static $db_fields = array('id', 'student_id', 'parent_id');

	public $id;
	public $parent_id;
	public $student_id;


    public static function find_by_student($parent_id="",$student_id) {

    $sql  = "SELECT * FROM parentstud ";
    $sql .= "WHERE parent_id = '{$parent_id}' and student_id = '{$student_id}'";
    $sql .= "LIMIT 1";
    $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
    
    public static function find_by_student_id($student_id) {

    $sql  = "SELECT * FROM parentstud ";
    $sql .= "WHERE student_id = '{$student_id}'";
    $sql .= "LIMIT 1";
    $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
    
     public static function find_by_parent($parent_id="") {

    $sql  = "SELECT * FROM parentstud ";
    $sql .= "WHERE parent_id = '{$parent_id}'";
     return $result_array = static::find_by_sql($sql);
	}
	
}
