<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');

	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("../login.php"); }
	$user = User::find_by_id($_SESSION['user_id']);
    
	// must have an ID
	if(empty($_GET['id'])) {
		$session->message("No ID was provided.");
		redirect_to('index.php');
	}

	$lesson = Lesson::find_by_id($_GET['id']);
	if($lesson && $lesson->delete()) {
        $dir = "../../audio/" . $lesson->name. "";
        foreach (glob($dir."/*.*") as $filename) {
            if (is_file($filename)) {
                unlink($filename);
            }
        }
        rmdir($dir); 
		$session->message("{$lesson->name}  as successfully deleted.");
        log_action('Delete Lesson', "{$user->full_name()} Deleted Lesson {$lesson->name}.");
		redirect_to("index.php");
	} else {
		$session->message("Unable to delete {$lesson->name}.");
		redirect_to('index.php');
	}
  
