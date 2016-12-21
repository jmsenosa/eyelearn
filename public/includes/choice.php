<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Choice extends DatabaseObject {
	
	protected static $table_name="choice";
	protected static $db_fields = array('id', 'question_id', 'name', 'is_correct', 'active', 'last_update');

	public $id;
	public $question_id;
	public $name;
	public $is_correct;
	public $active;
	public $last_update;
	
	public static function find_by_question($question_id=0) {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE question_id={$question_id}");
	}


	
}
