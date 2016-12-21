<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');

	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("../login.php"); }
	
	// must have an ID
	if(empty($_GET['id'])) {
		$session->message("No ID was provided.");
		redirect_to("folder.php?id=" . $_GET['folder']);
	}

	$lesson = Quiz::find_by_id($_GET['id']);
	if($lesson && $lesson->destroy()) {
		$session->message("{$lesson->id}  as successfully deleted.");
        $user = User::find_by_id($_SESSION['user_id']);
            log_action('Add Quiz', "{$user->full_name()} Deleted {$lesson->id}.");
		redirect_to("folder.php?id=" . $_GET['folder']);
	} else {
		$session->message("Unable to delete {$lesson->name}.");
		redirect_to("folder.php?id=" . $_GET['folder']);
	}