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

	$story = Story::find_by_id($_GET['id']);
	if($story && $story->destroy()) {
		$session->message("The <strong>{$story->name}</strong>  was successfully <strong>Deleted</strong>.");
		redirect_to("index.php");
	} else {
		$session->message("Unable to delete {$story->name}.");
		redirect_to("index.php");
	}
  
