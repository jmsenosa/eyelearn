<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Student extends DatabaseObject {
	
	protected static $table_name="student";
	protected static $db_fields = array('id', 'lrn', 'first_name', 'middle_name','parent_first_name','parent_last_name', 'last_name','active', 'last_update','address','sy','section_id','section','teacher');

	public $id;
	public $lrn;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $active;
	public $last_update;
    public $address;
    public $section;
    public $section_id;
    public $teacher;
    public $parent_last_name;
    public $parent_first_name;
    public $sy;


	
	public function full_name() {

    	if(isset($this->first_name) && isset($this->last_name)) {
    		return $this->first_name . " " . $this->last_name;
    	} else {
    		return "";
	    }
	}

    public static function find($id = 0){
        if ($id != 0) {
            $sql = "
            
            SELECT 
                student.id as id,
                student.*,
                CONCAT(student.first_name,' ',student.last_name) as full_name,
                parent.id as parent_id,
                CONCAT(parent.first_name,' ',parent.last_name) as parent_name,
                section.id as section_id,
                section.section as section_name,
                users.id as teacher_id,
                CONCAT(users.first_name,' ',users.last_name) as teacher_name
            FROM 
                student 
            LEFT JOIN
                parentstud 
                    ON 
                        parentstud.student_id = student.id
            LEFT JOIN
                parent
                    ON
                        parent.id = parentstud.parent_id
            LEFT JOIN
                section
                    ON
                        section.id = student.section_id
            LEFT JOIN
                users
                    ON
                        users.id = section.created_by
            ";
            $sql .= "WHERE student.id = {$id} ";
            $sql .= "LIMIT 1";

            $result = [];                 

            global $database;
            $result_set = $database->query($sql);

            while ($row = $database->fetch_array($result_set)) 
            {
     
                $raw_result = [];
                $raw_result["id"] = $row['id'];
                $raw_result["lrn"] = $row['lrn'];
                $raw_result["first_name"] = $row['first_name'];
                $raw_result["middle_name"] = $row['middle_name'];
                $raw_result["full_name"] = $row['full_name'];
                $raw_result["last_name"] = $row['last_name'];
                $raw_result["active"] = $row['active'];
                $raw_result["last_update"] = $row['last_update'];
                $raw_result["teacher"] = $row['teacher'];
                $raw_result["section"] = $row['section'];
                $raw_result["section_id"] = $row['section_id'];
                $raw_result["address"] = $row['address'];
                $raw_result["sy"] = $row['sy'];
                $raw_result["parent_last_name"] = $row['parent_last_name'];
                $raw_result["parent_first_name"] = $row['parent_first_name'];
                $raw_result["parent_id"] = $row['parent_id'];
                $raw_result["parent_name"] = $row['parent_name'];
                $raw_result["section_name"] = $row['section_name'];
                $raw_result["teacher_id"] = $row['teacher_id'];
                $raw_result["teacher_name"] = $row['teacher_name'];
                $result[] = (object) $raw_result;
            } 

            return (count($result) > 0) ? $result[0] : false;
        }

        return false;
    }
  
    public static function find_by_year($sy){
		
		
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE sy='{$sy}'";
		return self::find_by_sql($sql);
	}	
    
    public static function find_by_teacher($id){
		
		
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE teacher='{$id}'";
		return self::find_by_sql($sql);
	}
    
    public static function find_my_parent($lastname,$firstname){
		
		
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE parent_last_name='{$lastname}' and parent_first_name='{$firstname}'";
		return self::find_by_sql($sql);
	}	
  
	public static function find_by_section($id=0){
		
		global $database;
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE section=" .$database->escape_value($id);
		return self::find_by_sql($sql);
	}	
	

    public static function check_username($username="") {

        $sql  = "SELECT * FROM student ";
        $sql .= "WHERE lrn = '{$username}' ";
        $sql .= "LIMIT 1";
        $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
    
    public static function find_ifexist($first_name,$last_name,$lrn) {

    $sql  = "SELECT * FROM student ";
    $sql .= "WHERE lrn = '{$lrn}' and first_name = '{$first_name}' and last_name =  '{$last_name}' ";
    $sql .= "LIMIT 1";
    $result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
    public static function find_by_lrn($lrn) {

        $sql  = "SELECT * FROM student ";
        $sql .= "WHERE lrn = '{$lrn}'";
        $sql .= "LIMIT 1";
        $result_array = static::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function get_all_with_parents($where = array())
    {
        $sql = "
            SELECT 
            student.*,
            CONCAT(student.first_name,' ',student.last_name) as full_name,
            parent.id as parent_id,
            CONCAT(parent.first_name,' ',parent.last_name) as parent_name,
            section.id as section_id,
            section.section as section_name,
            users.id as teacher_id,
            CONCAT(users.first_name,' ',users.last_name) as teacher_name
        FROM 
            student 
        JOIN
            parentstud 
                ON 
                    parentstud.student_id = student.id
        JOIN
            parent
                ON
                    parent.id = parentstud.parent_id
        JOIN
            section
                ON
                    section.id = student.section_id
        JOIN
            users
                ON
                    users.id = section.created_by
        ";

        if (count($where) > 0) {
            $sql_where = "WHERE";
            $count = count($where);
            $counter = 1;
            // echo $count. " " . $counter; die();
            foreach ($where as $key => $value) {

                $value = (is_numeric($value)) ? $value : "'".$value."' ";

                $sql_where .= " ".$key." = ".$value; 
                if ($counter < $count) {
                    $sql_where .= " AND";
                }
                $counter = $counter + 1;
            }

            $sql = $sql.$sql_where; 
        }

        $sql = $sql." GROUP BY student.id ORDER BY student.id ASC"; 

        $result = [];                 

        global $database;
        $result_set = $database->query($sql);

        while ($row = $database->fetch_array($result_set)) 
        {
 
            $raw_result = [];
            $raw_result["lrn"] = $row['lrn'];
            $raw_result["first_name"] = $row['first_name'];
            $raw_result["middle_name"] = $row['middle_name'];
            $raw_result["full_name"] = $row['full_name'];
            $raw_result["last_name"] = $row['last_name'];
            $raw_result["active"] = $row['active'];
            $raw_result["last_update"] = $row['last_update'];
            $raw_result["teacher"] = $row['teacher'];
            $raw_result["section"] = $row['section'];
            $raw_result["section_id"] = $row['section_id'];
            $raw_result["address"] = $row['address'];
            $raw_result["sy"] = $row['sy'];
            $raw_result["parent_last_name"] = $row['parent_last_name'];
            $raw_result["parent_first_name"] = $row['parent_first_name'];
            $raw_result["parent_id"] = $row['parent_id'];
            $raw_result["parent_name"] = $row['parent_name'];
            $raw_result["section_name"] = $row['section_name'];
            $raw_result["teacher_id"] = $row['teacher_id'];
            $raw_result["teacher_name"] = $row['teacher_name'];
            $result[] = (object) $raw_result;
        } 



        return $result;
    }

    public static function get_all_joined($params = array()) {
        $sql = '
            SELECT 
                student.id as id,
                student.lrn as lrn,
                capitalize(concat(student.first_name, " ",student.last_name)) as full_name,
                student.sy as school_year,
                parent.id as parent_id,
                capitalize(concat(parent.first_name, " ",parent.last_name)) as parent_name,
                section.id as section_id,
                capitalize(section.section) as section_name,
                users.id as teacher_id,
                capitalize(concat(users.first_name, " ",users.last_name)) as teacher_name,
                IF(student.active = 1,"active", "inactive") as status
            FROM 
                student 
            LEFT JOIN
                parentstud ON
                    parentstud.student_id = student.id
            LEFT JOIN 
                parent ON
                    parent.id = parentstud.parent_id
            LEFT JOIN
                section ON
                    section.id = student.section_id
            LEFT JOIN
                users ON
                    users.id = section.created_by 
        ';

        if ( $params ) {
            $where_sql = " WHERE ";
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
            GROUP BY student.id
            ORDER BY student.id
        ";  
        
        $result = [];      
        global $database;

        $result_set = $database->query($sql);
        while ($row = $database->fetch_array($result_set)) 
        {
            $singleArr = array();
                        
            $singleArr["id"] = $row["id"];                      
            $singleArr["lrn"] = $row["lrn"];                   
            $singleArr["full_name"] = $row["full_name"];      
            $singleArr["school_year"] = $row["school_year"];   
            $singleArr["parent_id"] = $row["parent_id"];      
            $singleArr["parent_name"] = $row["parent_name"];   
            $singleArr["section_id"] = $row["section_id"];      
            $singleArr["section_name"] = $row["section_name"];
            $singleArr["teacher_id"] = $row["teacher_id"];    
            $singleArr["teacher_name"] = $row["teacher_name"];
            $singleArr["status"] = $row["status"];            

            $result[] =  (object) $singleArr;
        }

        return $result;
    } 
	
}
