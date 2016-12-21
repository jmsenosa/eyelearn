<?php
	// Initialize Page
	require_once('../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }	
	
	// Find user by id
	$user = User::find_by_id($_SESSION['user_id']); 
	
	// Log out	
    $session->logout();
	
	// Log user
	log_action('User log out', "{$user->full_name()} Log out.");
    redirect_to("../index.php");
	
