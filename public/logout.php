<?php
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	error_reporting(E_ALL);
	
	// Find user by id
	
	// Log out	
    $session->logout();

    redirect_to("login_student.php");
	
