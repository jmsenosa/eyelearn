<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Lesson extends DatabaseObject {
    
    protected static $table_name="lesson";
    protected static $db_fields = array('id', 'name','isDone', 'user_id', 'description', 'active', 'audio', 'last_update','grading_quarter_id');

    public $id;
    public $name;
    public $user_id;
    public $description;
    public $active;
    public $audio;
    public $isDone;
    public $grading_quarter_id;
    public $last_update;
    
    //Find by user 
    public static function find_by_user($id=0) {
        return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE user_id={$id}");
    }
    //Find by user 
    public static function find_by_date($id=0) {
        $date = date('Y-m-d');
        return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE user_id={$id} and description='{$date}'");
    }
    
    public static function find_all_by_date() {
        $date = date('Y-m-d');
        return static::find_by_sql("SELECT * FROM `".static::$table_name."` ORDER BY description ASC");
    }
    

    public static function find_all ()
    {
        return static::find_by_sql("SELECT * FROM `".static::$table_name."` ORDER BY description ASC");
    }
    
}
