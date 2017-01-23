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

	$quiz = Quiz::find_by_id($_GET['id']);
	if($quiz && $quiz->delete()) {
		$session->message("The <strong>{$quiz->name}</strong>  was successfully <strong>Deleted</strong>.");
		redirect_to("index.php");
	} else {
		$session->message("Unable to delete {$quiz->name}.");
		redirect_to('index.php');
	}
  
