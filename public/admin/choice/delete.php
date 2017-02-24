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

	$choice = Choice::find_by_id($_GET['id']);
	if($choice && $choice->delete()) {
		$session->message("The <strong>{$choice->name}</strong>  was successfully <strong>Deleted</strong>.");
		redirect_to("index.php?id=".$choice->question_id);
	} else {
		$session->message("Unable to delete {$choice->name}.");
		redirect_to("index.php?id=".$choice->question_id);
	}
  
