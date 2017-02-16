<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Grading extends DatabaseObject {

    protected static $table_name = "grading";
    public $parent_query = "";
    protected static $db_fields = array(
        'id', 
        'student_id',
        'grading_quarters_id', 
        'section_id',
        'school_year_start',
        'school_year_end',
        'online_quiz',
        'offline_quiz',
        'quiz_total',
        'quiz_percentage',
        'recitation_percentage',
        'recitation_total',
        'attendance_total',
        'attendance_percentage',
        'periodical_exam_total',
        'periodical_exam_percentage',
        'homework',
        'homework_percentage',
        'final_grade',
        'status',
        'date_created'
    );

    public $id; 
    public $student_id;
    public $grading_quarters_id; 
    public $section_id;
    public $school_year_start;
    public $school_year_end;
    public $online_quiz;
    public $offline_quiz;
    public $quiz_total;
    public $quiz_percentage;
    public $recitation_percentage;
    public $recitation_total;
    public $attendance_total;
    public $attendance_percentage;
    public $periodical_exam_total;
    public $periodical_exam_percentage;
    public $homework;
    public $homework_percentage;
    public $final_grade;
    public $status;
    public $date_created;

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
            $raw_result["date_created"] = $row["date_created"]; 
            $result[] = (object) $raw_result;
        }

        if (count($result) > 0) {
            return $result;
        }

        return false; 
    } 

    public static function select_lesson_quiz_percentage( $params = array() )
    {
        $sql = '
            SELECT 
                grading.*,
                lesson.id as lesson_id,
                lesson.grading_quarter_id as lesson_quarter_id,
                lesson.user_id as lesson_teacher_id,
                capitalize(lesson.name) as lesson_name,
                lesson.description as lesson_date,
                if(lesson.active = 1, "active","inactive") as lesson_status,
                lesson.isDone as lesson_isDone, 
                round(avg(quiz_aggregated.qt_percentage),2) as quiz_final_percentage
            FROM 
                lesson
            JOIN (
                    SELECT 
                        quiz_take.id as id,
                        qt_aggregated.*,
                        round(( qt_aggregated.qt_score / qt_aggregated.qt_number_question * 100 ),2) AS qt_percentage
                    FROM
                        quiz_take
                    JOIN (
                        SELECT 
                            quiz_take.id as qt_id,
                            quiz_take.quiz_master_id as qt_qmaster_id,
                            quiz_take.lesson_id as qt_lesson_id,
                            quiz_take.student_id as qt_student_id,
                            MAX(quiz_take.score) as qt_score,
                            quiz_take.total_questions as qt_number_question
                        FROM 
                            quiz_take
                        GROUP BY qt_qmaster_id
                    ) as qt_aggregated ON quiz_take.id = qt_aggregated.qt_id
                ) as quiz_aggregated ON quiz_aggregated.qt_lesson_id = lesson.id
            JOIN
                student
                    ON student.id = quiz_aggregated.qt_student_id

            LEFT JOIN
                grading
                    ON
                        grading.student_id = student.id
            
        ';

        if ( $params ) {
            $where_sql = "WHERE";
            $count = count($params);
            $counter = 1;
            foreach ($params as $key => $value) {
                
                $where_sql .= $key." = ".$value; 
                if ($counter < $count) {
                    $where_sql .= " AND ";
                }

                $counter = $counter + 1;
            }  

            $sql = $sql. $where_sql;
        }
        
        $sql = $sql. "
            group by lesson_id
        "; 

        $result = [];                 

        global $database;
        $result_set = $database->query($sql);
        while ($row = $database->fetch_array($result_set)) 
        {
            $singleArr = array();

            $singleArr["lesson_id"]                  = $row["lesson_id"];
            $singleArr["lesson_quarter_id"]          = $row["lesson_quarter_id"];
            $singleArr["lesson_teacher_id"]          = $row["lesson_teacher_id"];
            $singleArr["lesson_name"]                = $row["lesson_name"];
            $singleArr["lesson_date"]                = $row["lesson_date"];
            $singleArr["lesson_status"]              = $row["lesson_status"];
            $singleArr["lesson_isDone"]              = $row["lesson_isDone"];
            $singleArr["student_id"]                 = $row["student_id"];
            $singleArr["quiz_final_percentage"]      = $row["quiz_final_percentage"];
            $singleArr["student_id"]                 = $row["student_id"];
            $singleArr["grading_quarters_id"]        = $row["grading_quarters_id"];
            $singleArr["section_id"]                 = $row["section_id"];
            $singleArr["school_year_start"]          = $row["school_year_start"];
            $singleArr["school_year_end"]            = $row["school_year_end"];
            $singleArr["online_quiz"]                = $row["online_quiz"];
            $singleArr["offline_quiz"]               = $row["offline_quiz"];
            $singleArr["quiz_total"]                 = $row["quiz_total"];
            $singleArr["quiz_percentage"]            = $row["quiz_percentage"];
            $singleArr["recitation_percentage"]      = $row["recitation_percentage"];
            $singleArr["recitation_total"]           = $row["recitation_total"];
            $singleArr["attendance_total"]           = $row["attendance_total"];
            $singleArr["attendance_percentage"]      = $row["attendance_percentage"];
            $singleArr["periodical_exam_total"]      = $row["periodical_exam_total"];
            $singleArr["periodical_exam_percentage"] = $row["periodical_exam_percentage"];
            $singleArr["homework"]                   = $row["homework"];
            $singleArr["homework_percentage"]        = $row["homework_percentage"];
            $singleArr["final_grade"]                = $row["final_grade"];
            $singleArr["status"]                     = $row["status"];
            $singleArr["date_created"]               = $row["date_created"];
            $singleArr["id"]                         = $row["id"];
            
            $result[] =  (object) $singleArr;
        }  
        
        if ( count($result) > 0 ) 
        {
            return $result[0];
        } 

        $result = array();

        $result["id"]                         = "";
        $result["lesson_id"]                  = "";
        $result["lesson_quarter_id"]          = "";
        $result["lesson_teacher_id"]          = "";
        $result["lesson_name"]                = "";
        $result["lesson_date"]                = "";
        $result["lesson_status"]              = "";
        $result["lesson_isDone"]              = "";
        $result["student_id"]                 = "";
        $result["quiz_final_percentage"]      = 0; 
        $result["grading_quarters_id"]        =  "";
        $result["section_id"]                 =  "";
        $result["school_year_start"]          =  "";
        $result["school_year_end"]            =  "";
        $result["online_quiz"]                =  "";
        $result["offline_quiz"]               =  "";
        $result["quiz_total"]                 =  "";
        $result["quiz_percentage"]            =  "";
        $result["recitation_percentage"]      =  "";
        $result["recitation_total"]           =  "";
        $result["attendance_total"]           =  "";
        $result["attendance_percentage"]      =  "";
        $result["periodical_exam_total"]      =  "";
        $result["periodical_exam_percentage"] =  "";
        $result["homework"]                   =  "";
        $result["homework_percentage"]        =  "";
        $result["final_grade"]                =  "";
        $result["status"]                     =  "";
        $result["date_created"]               =  "";
        
        return (object) $result;
    }

}

