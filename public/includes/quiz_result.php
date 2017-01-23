<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Quiz_result extends DatabaseObject {
	
	protected static $table_name="quiz_result";
	protected static $db_fields = array('id', 'user_id', 'score', 'total_number', 'quiz_date','lesson_id','remarks','current_item');

	public $id;
	public $user_id;
    public $lesson_id;
	public $score;
	public $total_number;
	public $quiz_date;
	public $remarks;
    public $current_item;
    
    public static function find_is_continue($lesson_id,$user_id){
        return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE user_id={$user_id} and lesson_id={$lesson_id} and total_number > (current_item-1) LIMIT 1");
    }
    
	public static function find_my_student($user_id=0,$lesson_id=0) {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE user_id={$user_id} and lesson_id={$lesson_id}" );
	}
    
    public static function find_my_student_group_lesson($user_id=0) {
		return static::find_by_sql("SELECT score,total_number,lesson_id,quiz_date FROM `".static::$table_name."` WHERE user_id={$user_id}  group by lesson_id");
	}
    

	public static function find_my_quiz($user_id=0) {
		global $database;
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE user_id= " .$database->escape_value($user_id);
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
    
    public static function find_my_attemp($lesson_id,$user_id){
        return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE user_id={$user_id} and lesson_id={$lesson_id}");
    }
    


	
}
