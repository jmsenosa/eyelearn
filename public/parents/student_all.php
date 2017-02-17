<?php  
    require_once('../../includes/initialize.php');
    // Check if User is Logged in to view this page.
    
    if (!$session->is_logged_in()) { redirect_to("login.php"); }
    /**
    *  
    */
    class StudentAll 
    {
        
        public $mysqli = null;

        public function __construct() {

            $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                die();
            }
        }

        public function get_student( $params = array() ) {
            $student = Student::get_all_joined($params);
            return $student;
        }

        public function get_all_attendance($student_id) {
            $attendance = Attendance::find_by_student($student_id);
            $data = array();
            foreach ($attendance as $attendance) {
                $obj = [];
                $obj["title"] = ($attendance->attendance == "present") ? "present": "absent";
                $obj["start"] = $attendance->date;
                $obj["allDay"] = true;
                $obj["color"] = ($attendance->attendance == "present") ? "#27ae60": "#c0392b";
                $obj["textColor"] = "#FFF";     

                $data[] = (object) $obj;           
            }

            return json_encode($data);
            // $attendance = (array) $attendance;
            // $attendance = json_encode( $attendance , true);
        }

        public function quiz_takes($lesson) {
            $query = "SELECT 
                quiz_master_id as id,
                score,
                quiz_take.total_questions as questions
            FROM 
                quiz_master
            LEFT JOIN
                quiz_take ON
                    quiz_take.quiz_master_id = quiz_master.id
            WHERE quiz_master.lesson_id = {$lesson->id}
            ORDER BY quiz_master.id ASC
                ";

            $quizshit = array();

            if ($result = $this->mysqli->query($query)) {
                $data = array();
                while ($obj = $result->fetch_object()) 
                {

                    if (!isset($quizshit[$obj->id])) {
                        $quizshit[$obj->id][] = $obj->score;
                    }
                    else
                    {
                        $quizshit[$obj->id][] = $obj->score;
                    }

                }
            }
            if ($result = $this->mysqli->query($query)) {
                $data = array();
                while ($obj = $result->fetch_object()) 
                { 
                    if (count($quizshit[$obj->id]) < 4) {
                        $quizshit[$obj->id][] = $obj->questions;
                    }
                }
            }

            return $quizshit;
        }

        public function get_charts_result($student_id) {
            $sql = "
                SELECT  
                    quiz_take.id as take_id,
                    concat(lesson.name ,'<br>',DATE_FORMAT(quiz_take.last_update, ".'"%b-%d"'.")) as lesson_title,
                    quiz_master.id as quiz_no, 
                    round(( quiz_take.score / quiz_take.total_questions * 100 ),2) as percentage
                FROM 
                    quiz_take
                JOIN
                    quiz_master
                    ON
                        quiz_master.id = quiz_take.quiz_master_id
                LEFT JOIN
                    quiz
                    ON
                        quiz.quiz_master_id = quiz_master.id
                LEFT JOIN
                    lesson
                        ON
                            lesson.id = quiz_take.lesson_id
                LEFT JOIN
                    student
                        ON 
                            student.id = quiz_take.student_id
                WHERE 
                    student.id = {$student_id}
                GROUP BY 
                    quiz_take.id
                ORDER BY 
                    quiz_no ASC,
                    quiz_take.id ASC
            ";

            $quizshit = array();

            if ($result = $this->mysqli->query($sql)) {
                $data = array();
                while ($obj = $result->fetch_object()) 
                {   
                    $newarr = array();
                    $newarr[] = $obj->lesson_title."<br>Quiz #".$obj->quiz_no."<br>".$obj->take_id; 
                    $newarr[] = floatval($obj->percentage); 

                    $quizshit[] = $newarr;
                }
            }
            return json_encode($quizshit);
        }

    }
?>