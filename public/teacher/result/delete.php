<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
error_reporting(E_ALL);
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("../login.php"); }
	$user = User::find_by_id($_SESSION['user_id']);
    
	// must have an ID
	if(empty($_GET['lesson_id'])) {
		$session->message("No ID was provided.");
		redirect_to('index.php');
	}

	$lesson = Quiz_result::find_my_student($_GET['student_id'],$_GET['lesson_id']);
    foreach($lesson as $lessons){
        if(Quiz_result::find_by_id($lessons->id)->delete()){
            $session->message("record was successfully deleted.");
        }
        redirect_to('index.php');
        
    }
  
	
  
