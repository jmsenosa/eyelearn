<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Magulang extends DatabaseObject {
    
    protected static $table_name="parent";
    protected static $db_fields = array('id', 'username', 'first_name', 'last_name','password','email','phone');

    public $id;
    public $username;
    public $first_name;
    public $password;
    public $last_name;
    public $email;
    public $phone;

    
    public static function get_one($id=0) {
        $parent = static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE id='{$id}'");
        return $parent[0];
    }

    public static function get_by_class() {

        $sql = "";

        return static::find_by_sql("SELECT * FROM `".static::$table_name."` ");
    }


    public static function get_all() {
        return static::find_by_sql("SELECT * FROM `".static::$table_name."` ");
    }

    
    public function full_name() {
        if(isset($this->first_name) && isset($this->last_name)) {
            return $this->first_name . " " . $this->last_name;
        } else {
            return "";
        }
    }
    
    public static function authenticate_parent($username="", $password="") {
        $sql  = "SELECT * FROM parent ";
        $sql .= "WHERE username = '{$username}' ";
            $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = static::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    } 

    public static function check_username($username="") {

        $sql  = "SELECT * FROM parent ";
        $sql .= "WHERE username = '{$username}' ";
        $sql .= "LIMIT 1";
        $result_array = static::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function get_with_student_teacher($teacher_id = 0, $section_id = 0)
    { 

        $sql = "
            SELECT 
                parent.id as parent_id,
                users.id as teacher_id,
                CONCAT(users.first_name,' ',users.last_name) as teacher_name,
                CONCAT(parent.first_name,' ',parent.last_name) as parent_name, 
                parent.email as email,
                parent.phone as phone,
                student.address as address,
                student.lrn as LRN,
                CONCAT(student.first_name,' ',student.last_name) as student,
                section.section as section
                
                
            FROM 
                parent
            LEFT JOIN
                parentstud
                    ON
                        parentstud.parent_id = parent.id
            LEFT JOIN
                student
                    ON 
                        student.id = parentstud.student_id
            
            LEFT JOIN
                section
                    ON
                        section.id = student.section_id 
            
            LEFT JOIN
                users
                    ON
                        section.created_by = users.id 
        ";  

        if ( $teacher_id != 0 && $section_id != 0 ) 
        {
            $sql = $sql." WHERE users.id = {$teacher_id} AND section.id = {$section_id}";
        }
        elseif( $teacher_id != 0 && $section_id == 0 ) 
        {
            $sql = $sql." WHERE users.id = {$teacher_id}";
        }
        elseif( $teacher_id == 0 && $section_id != 0 ) 
        {
            $sql = $sql." WHERE section.id = {$section_id}"; 
        }

        $sql = $sql . " GROUP BY parent.id 
                        ORDER BY parent.last_name ASC";

        $result = [];                 

        global $database;
        $result_set = $database->query($sql);

        while ($row = $database->fetch_array($result_set)) 
        {
            $raw_result = [];

            $raw_result["parent_id"] = $row["parent_id"];
            $raw_result["teacher_id"] = $row["teacher_id"];
            $raw_result["teacher_name"] = $row["teacher_name"];
            $raw_result["parent_name"] = $row["parent_name"]; 
            $raw_result["email"] = $row["email"];
            $raw_result["phone"] = $row["phone"];
            $raw_result["address"] = $row["address"];
            $raw_result["LRN"] = $row["LRN"];
            $raw_result["student"] = $row["student"];
            $raw_result["section"] = $row["section"];

            $result[] = (object) $raw_result;
        }
    
        return $result;
    }
    
}


 
 
 
 
 
 
 
 
 
 