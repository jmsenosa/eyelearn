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

	$quiz_question = Quiz_question::find_by_id($_GET['id']);
	if($quiz_question && $quiz_question->destroy()) {
		$session->message("The <strong>{$quiz_question->question}</strong>  was successfully <strong>Deleted</strong>.");
		redirect_to('content.php?id='.$quiz_question->quiz_id);
	} else {
		$session->message("Unable to delete {$quiz_question->question}.");
		redirect_to('content.php?id='.$quiz_question->quiz_id);
	}
  
