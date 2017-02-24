<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
    error_reporting(E_ALL);
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("../login.php"); }
	$user = User::find_by_id($_SESSION['user_id']);
    
	// must have an ID
	if(empty($_GET['id'])) {
		$session->message("No ID was provided.");
		redirect_to('index.php');
	}
    
	$Section = Section::find_by_id($_GET['id']);
	if($Section && $Section->delete()) {
		$session->message("{$Section->name}  as successfully deleted.");
        log_action('Delete Section', "{$user->full_name()} Deleted Section {$Section->name}.");
		redirect_to("index.php");
	} else {
		$session->message("Unable to delete {$Section->name}.");
		redirect_to('index.php');
	}
    
