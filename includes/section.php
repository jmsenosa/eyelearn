<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Section extends DatabaseObject {
	
	protected static $table_name="section";
	protected static $db_fields = array('id', 'section','created_by');

	public $id;
	public $section;
    public $created_by;
	
	


	
}
