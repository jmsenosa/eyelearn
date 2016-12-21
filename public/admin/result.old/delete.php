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

	$result = Quiz_result::find_by_id($_GET['id']);
	if($result && $result->delete()) {
		$session->message("Successfully deleted.");
		redirect_to("index.php");
	} else {
		$session->message("Unable to delete .");
		redirect_to('index.php');
	}
  
