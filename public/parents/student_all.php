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

    }
?>