<?php
	// Initialize Page
	require_once('../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page



	
	// Log out	
    $session->logout();
	

    redirect_to("../login.php");
	
