<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class User_type extends DatabaseObject {
	
	protected static $table_name="user_type";
	protected static $db_fields = array('id', 'name', 'description', 'active', 'last_update');

	public $id;
	public $name;
	public $description;
	public $active;
	public $last_update;
	
		//Find all except ADMIN
	public static function find_all_except_admin() {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE id!=1 ");
	}
}
