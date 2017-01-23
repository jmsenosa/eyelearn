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

	$section = Section::find_by_id($_GET['id']);
	if($section && $section->delete()) {
		$session->message("{$section->name}  as successfully deleted.");
		redirect_to("index.php");
	} else {
		$session->message("Unable to delete {$section->name}.");
		redirect_to('index.php');
	}
  
