<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Quiz_True_Or_False extends DatabaseObject {

    protected static $table_name="quiz_true_or_false";

    protected static $db_fields = array(
        'id',
        'quiz_id',
        'question',
        'truth_text',
        'false_text',
        'correct_answer',
        'background',
        'true_image',
        'false_image',
        'audio_id'
    );

    public $id;
    public $quiz_id;
    public $question;
    public $truth_text;
    public $false_text;
    public $correct_answer;
    public $background;
    public $true_image;
    public $false_image;
    public $audio_id;

    public function find_by_lesson($lesson_id=0)
    {
        $sql = "
            SELECT 
                ".static::$table_name.".*, quiz.lesson_id 
            FROM 
                ".static::$table_name." 
            JOIN
                quiz 
                    ON ".static::$table_name.".quiz_id = quiz.id
            WHERE
                lesson_id = '{$lesson_id}'
        ";


        return static::find_by_sql( $sql );
    }

    public function find_by_id_lesson($id = 0, $lesson_id = 0)
    {
        $sql = "
            SELECT 
                ".static::$table_name.".*, quiz.lesson_id 
            FROM 
                ".static::$table_name." 
            JOIN
                quiz 
                    ON ".static::$table_name.".quiz_id = quiz.id
            WHERE
                lesson_id = '{$lesson_id}' AND quiz.id = '{$id}'
        ";


        return static::find_by_sql( $sql );
    }
}