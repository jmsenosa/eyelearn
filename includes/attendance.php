<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Attendance extends DatabaseObject {
	protected static $table_name="attendance";
	protected static $db_fields = array('id', 'student_id', 'date','attendance');

	public $id;
	public $student_id;
	public $date;
    public $attendance;
	
    public static function find_by_today($student_id,$today) {
    return $result_array = static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE student_id='{$student_id}' and `date` = '{$today}'");

  }
    
    public static function find_by_today_student($student_id,$today) {
    
        $result_array = static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE student_id='{$student_id}' and `date` = '{$today}'");
        return !empty($result_array) ? array_shift($result_array) : false;
  }
    
    public static function review_today($today) {
    return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE student_id='{$student_id}' and `date` = '{$today}'");
  }

    public static function find_by_student($student_id) {
        return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE student_id='{$student_id}'");
    }
}