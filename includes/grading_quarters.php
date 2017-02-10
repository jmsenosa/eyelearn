<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Grading_Quarters extends DatabaseObject {

    protected static $table_name = "grading_quarters";
    protected static $db_fields = array('id', 'name', 'status');

    public $id;
    public $name;
    public $status;

}