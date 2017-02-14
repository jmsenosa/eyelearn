<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Quiz_Master extends DatabaseObject {
    
    protected static $table_name="quiz_master";
    protected static $db_fields = [
        "id",
        "lesson_id", 
        "created_by"
    ];


    public $id;
    public $lesson_id;
    public $created_by;
    

} 