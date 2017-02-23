<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Log extends DatabaseObject {
	
	protected static $table_name="logs";
	protected static $db_fields = array('id', 'message', 'action', 'created_at');

	public $id;
	public $message;
	public $action;
	public $created_at;

	public static $export_fields = array('id', 'message', 'action', 'created_at');

	public static function get_by_date($from, $to){

		$from = $from." 00:00:00";
		$to   = $to." 23:59:59";
		
		$sql = "SELECT * FROM `".static::$table_name."` WHERE created_at>='{$from}' AND created_at <= '{$to}' ";


		return static::find_by_sql($sql);
	}


	
}
