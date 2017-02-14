<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Quiz_Take extends DatabaseObject {
    
    protected static $table_name="quiz_take";
    protected static $db_fields = [
        "id",
        "quiz_master_id",
        "student_id",
        "score",
        "total_questions",
        "lesson_id",
        "last_update"
    ];

    public $id;
    public $quiz_master_id;
    public $student_id;
    public $score;
    public $audio;
    public $total_questions;
    public $last_update; 
    public $lesson_id;

    public static function find_by_student_id($id =0, $lesson_id = 0) {
        return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE student_id='{$id}' AND lesson_id = '".$lesson_id."'");    
    }

} 