<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Quiz extends DatabaseObject {
	
	protected static $table_name="quiz";
	protected static $db_fields = array(
		'id', 
		'quiz_category_id',
		'lesson_id', 
		'description', 
		'audio', 
		'choice1', 
		'choice2', 
		'choice3', 
		'choice4', 
		'answer',
		'type',
		'quiz_master_id'
	);

	public $id;
	public $lesson_id;
	public $quiz_category_id;
	public $description;
	public $audio;
	public $choice1;
	public $choice2;
    public $choice3;
    public $choice4;
    public $answer;
    public $type;
    public $quiz_master_id;

	public static function find_by_lesson($lesson_id=0) {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE lesson_id='{$lesson_id}'");
	}

	public static function find_by_id($id =0, $lesson_id = 0) {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE id='{$id}' AND lesson_id = '".$lesson_id."'");	
	}

    public static function find_by_lesson_rand($lesson_id=0) {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE lesson_id='{$lesson_id}' ORDER BY RAND()");
	}

  	protected $upload_errors = array(
		// http://www.php.net/manual/en/features.file-upload.errors.php
		UPLOAD_ERR_OK 				=> "No errors.",
		UPLOAD_ERR_INI_SIZE  		=> "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE 		=> "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL 			=> "Partial upload.",
		UPLOAD_ERR_NO_FILE 			=> "No file.",
		UPLOAD_ERR_NO_TMP_DIR 		=> "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE		=> "Can't write to disk.",
		UPLOAD_ERR_EXTENSION 		=> "File upload stopped by extension."
	);

	// Pass in $_FILE(['uploaded_file']) as an argument
  	public function attach_file($file) {
		// Perform error checking on the form parameters
        $allowed =  array('mp3','
		wav');
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

		if(!$file || empty($file) || !is_array($file)) 
		{

		  	// error: nothing uploaded or wrong argument usage
			$this->errors[] = "No file was uploaded.";
			return false;
		} 
		elseif(!in_array($ext,$allowed) ) 
		{

            $this->errors[] = "invalid file format.";
		  	return false;
        } 
        elseif($file['error'] != 0) 
        {
			// error: report what PHP says went wrong
			$this->errors[] = $this->upload_errors[$file['error']];
			return false;
		} 
		else 
		{
			// Set object attributes to the form parameters.
			$this->temp_path  = $file['tmp_name'];
			$this->audio   = basename($file['name']);
			// $this->type       = $file['type'];
			// $this->size       = $file['size'];
			// Don't worry about saving anything to the database yet.
			return true;
		}
	}
  
	public function save() {
		// A new record won't have an id yet.
		if(isset($this->id)) {
			// Really just to update the caption
			$this->update();
		} 
		else {
			// Make sure there are no errors
			
			// Can't save if there are pre-existing errors
		  	if(!empty($this->errors)) { return false; }
		  
			// Make sure the caption is not too long for the DB
		  	if(strlen($this->description) > 255) {
				$this->errors[] = "The caption can only be 255 characters long.";
				return false;
			}
		
			// Can't save without filename and temp location
			if(empty($this->audio) || empty($this->temp_path)) {
				$this->errors[] = "The file location was not available.";
				return false;
			}
			
			// Determine the target_path
		  	$target_path = SITE_ROOT .DS. 'public' .DS. 'audio' .DS. $this->audio;
		  
			// Make sure a file doesn't already exist in the target location
			if(file_exists($target_path)) {
				$this->errors[] = "The file {$this->audio} already exists.";
				return false;
			}
		
			// Attempt to move the file 
			if(move_uploaded_file($this->temp_path, $target_path)) {
		  	// Success
				// Save a corresponding entry to the database
				if($this->create()) {
					// We are done with temp_path, the file isn't there anymore
					unset($this->temp_path);
					return true;
				}
			} 
			else {
				// File was not moved.
		    $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
		    return false;
			}
		}
	}
	
	public function destroy() {

		if($this->delete()) {
            return true;
		} 
		else {
			// database delete failed
			return false;
		}
	}
	
}