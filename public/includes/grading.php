<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Grading extends DatabaseObject {

    protected static $table_name = "grading_quarters";
    public $parent_query = "";
    protected static $db_fields = array(
        'id', 
        'student_id',
        'grading_quarters_id', 
        'section_id',
        'online_quiz',
        'quiz_total',
        'quiz_percentage',
        'recitation_percentage',
        'attendance_total',
        'attendance_percentage',
        'periodical_exam_total',
        'periodical_exam_percentage',
        'homework',
        'homework_percentage',
        'final_grade',
        'status'
    );

    public $id; 
    public $student_id;
    public $grading_quarters_id; 
    public $section_id;
    public $online_quiz;
    public $quiz_total;
    public $quiz_percentage;
    public $recitation_percentage;
    public $attendance_total;
    public $attendance_percentage;
    public $periodical_exam_total;
    public $periodical_exam_percentage;
    public $homework;
    public $homework_percentage;
    public $final_grade;
    public $status;

    public $fields = [];


    public function __construct()
    {
        $this->parent_query = "
            SELECT 
                student.lrn as lrn,
                CONCAT(student.first_name,' ',student.last_name) as full_name,
                student.sy as school_year,
                section.section as section_name,
                grading.*,
                parent.email as email,
                parent.phone as phone,
                student.address as address,
                grading.grading_quarters_id as quarter_id,    
                grading_quarters.name as grading_period  
            FROM 
                grading 
            JOIN
                student
                    ON
                        student.id = grading.student_id
            LEFT JOIN
                parentstud 
                    ON 
                        parentstud.student_id = student.id
            LEFT JOIN
                parent
                    ON
                        parent.id = parentstud.parent_id
            LEFT JOIN
                grading_quarters
                    ON
                        grading_quarters.id = grading.grading_quarters_id
                
            LEFT JOIN
                section 
                    ON 
                        section.id = student.section_id
        "; 

        $this->fields = self::$db_fields;
    }

    /*
        $gradeClass = new Grading();
        $grading = $gradeClass::get_by_student($student->id);
     */
    public function get_by_student($student_id = 0)
    {
        $sql = $this->parent_query;
        $sql .= " WHERE student.id = {$student_id}";

        $result = [];                 
        // print_r($sql); die();
        global $database;
        $result_set = $database->query($sql);

        while ($row = $database->fetch_array($result_set)) 
        {
            $raw_result = [];
            $raw_result["lrn"] = $row['lrn'];
            $raw_result["id"] = $row["id"]; 
            $raw_result["student_id"] = $row["student_id"];
            $raw_result["lrn"] = $row["lrn"];
            $raw_result["full_name"] = $row["full_name"];
            $raw_result["school_year"] = $row["school_year"];
            $raw_result["section_name"] = $row["section_name"];
            $raw_result["email"] = $row["email"];
            $raw_result["phone"] = $row["phone"];
            $raw_result["address"] = $row["address"];
            $raw_result["quarter_id"] = $row["quarter_id"];
            $raw_result["grading_period"] = $row["grading_period"];     
            $raw_result["grading_quarters_id"] = $row["grading_quarters_id"]; 
            $raw_result["section_id"] = $row["section_id"];
            $raw_result["online_quiz"] = $row["online_quiz"];
            $raw_result["quiz_total"] = $row["quiz_total"];
            $raw_result["quiz_percentage"] = $row["quiz_percentage"];
            $raw_result["recitation_percentage"] = $row["recitation_percentage"];
            $raw_result["attendance_total"] = $row["attendance_total"];
            $raw_result["attendance_percentage"] = $row["attendance_percentage"];
            $raw_result["periodical_exam_total"] = $row["periodical_exam_total"];
            $raw_result["periodical_exam_percentage"] = $row["periodical_exam_percentage"];
            $raw_result["homework"] = $row["homework"];
            $raw_result["homework_percentage"] = $row["homework_percentage"];
            $raw_result["final_grade"] = $row["final_grade"];
            $raw_result["status"] = $row["status"]; 
            $result[] = (object) $raw_result;
        }

        if (count($result) > 0) {
            return $result;
        }

        return false; 
    } 

}

