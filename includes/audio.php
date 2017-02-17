<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Audio extends DatabaseObject {
	
	protected static $table_name="audio";
	protected static $db_fields = array('id', 'folder', 'filename');

	public $id;
	public $folder;
	public $filename;
	
	private $temp_path;
	protected $upload_dir="audio";
	public $errors=array();
  
  	public static function find_by_lesson($lesson_id="") {
		return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE folder='{$lesson_id}'");
  	}

  	public static function find_by_lesson_name($lesson_name)
  	{
	    return static::find_by_sql("SELECT * FROM `".static::$table_name."` WHERE folder='{$lesson_name}'");
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
		if($file['error'] != 0) {
		  // error: report what PHP says went wrong
		  $this->errors[] = $this->upload_errors[$file['error']];
		  return false;
		} else {
			// Set object attributes to the form parameters.
		  $this->temp_path  = $file['tmp_name'];
		  $this->filename   = basename($file['name']);
		  // $this->type       = $file['type'];
		  // $this->size       = $file['size'];
			// Don't worry about saving anything to the database yet.
			return true;

		}
	}
  
	public function save() {

			
			// Determine the target_path
		  $target_path = SITE_ROOT .DS. 'public' .DS. $this->upload_dir .DS. $this->folder .DS. $this->filename;
		  
		  // Make sure a file doesn't already exist in the target location
		  if(file_exists($target_path)) {
		    $this->errors[] = "The file {$this->filename} already exists.";
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
			} else {
				// File was not moved.
		    $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
		    return false;
			}
		}

	
	public function destroy() {
		// First remove the database entry
		if($this->delete()) {
			// then remove the file
		  // Note that even though the database entry is gone, this object 
			// is still around (which lets us use $this->image_path()).
			$target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
			return unlink($target_path) ? true : false;
		} else {
			// database delete failed
			return false;
		}
	}

    // image path
	public function image_path() {
	  return $this->upload_dir.DS.$this->filename;
	}
	// size of image uploading 
	public function size_as_text() {
		if($this->size < 1024) {
			return "{$this->size} bytes";
		} elseif($this->size < 1048576) {
			$size_kb = round($this->size/1024);
			return "{$size_kb} KB";
		} else {
			$size_mb = round($this->size/1048576, 1);
			return "{$size_mb} MB";
		}
	}
	


	
}
