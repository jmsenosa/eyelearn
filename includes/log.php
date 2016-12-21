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

	
	


	
}
