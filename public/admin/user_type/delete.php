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

	$user_type = User_type::find_by_id($_GET['id']);
	if($user_type && $user_type->delete()) {
		$session->message("{$user_type->name}  as successfully deleted.");
		redirect_to("index.php");
	} else {
		$session->message("Unable to delete {$user_type->name}.");
		redirect_to('index.php');
	}
  
