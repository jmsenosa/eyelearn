<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');

	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find user by id
	$session_user = User::find_by_id($_SESSION['user_id']); 
	
	// Authentication
	if(empty($_GET['id'])) {
		$session->message("No <strong>ID</strong> was provided. Please select valid ID.");
		redirect_to('index.php');
	}
	
	// Find by ID
	$user = User::find_by_id($_GET['id']);
	
	// Verification and Authentication
	if(!$user) {
		$session->message("The User could not be located. Please try to select other <strong>User</strong>");
		redirect_to('index.php');
	}elseif($user && $user->delete()) {
		log_action('User Delete User', "{$session_user->full_name()} Delete User [{$user->username}].");
		$session->message("{$user->full_name()}  as successfully deleted.");
		redirect_to("index.php");
	} else {
		$session->message("Unable to delete");
		redirect_to('index.php');
	}
  
