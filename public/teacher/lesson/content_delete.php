<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');

	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("../login.php"); }
	
	// must have an ID
	if(empty($_GET['id'])) {
		$session->message("No ID was provided.");
		redirect_to('index.php');
	}

	$dtl = Lesson_dtl::find_by_id($_GET['id']);
	$lesson = Lesson::find_by_id($dtl->lesson_id);
	if($dtl && $dtl->destroy()) {
		$session->message("{$dtl->name}  as successfully deleted.");
        $user = User::find_by_id($_SESSION['user_id']);
        log_action('Delete Lesson Content', "{$user->full_name()} Deleted {$dtl->name} .");
		redirect_to("content.php?id=".$lesson->id);
	} else {
		$session->message("Unable to delete {$dtl->name}.");
		redirect_to("content.php?id=".$lesson->id);
	}
  
