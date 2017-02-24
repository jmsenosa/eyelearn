<?php

require_once(LIB_PATH.DS.'database.php');

/**
* 
*/
class Quiz_Category extends DatabaseObject
{
    protected static $table_name = "quiz_categories";
    protected static $db_fields  = array(
        "id",
        "name",
        "description",
        "filename",
        "date_added",
        "date_updated"
    );
  
    public $id;
    public $name;
    public $description;
    public $filename;
    public $date_added;
    public $date_updated;

    public function __construct()
    {

    }

    public static function find_by_id($id){
        $sql = "SELECT * FROM `".static::$table_name."` WHERE id='{$id}'";
        $category = static::find_by_sql( $sql );
    
        if (count($category) > 0) {
            return $category[0];
        }

        return false;
    }
}