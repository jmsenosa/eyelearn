<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
		
		print_r($_POST);
		
		
		
		$score = 0;
		$ctr = 0;
		foreach($_POST as $key=>$value)
		{
		   $score+= $value;
			$test = ($ctr + 0);
			
		 $ctr++;
		}
		echo ' Your Scrore is'.$score.' Out of '.$test;
		
		$passing_grade = ($test/2);
		$quiz_status = ($score >= $passing_grade? 1:0);
		
		
		$result = new Quiz_result();
		$result->user_id		= $_SESSION['user_id'];
		$result->quiz_id		= $_GET['id'];
		$result->score			= $score;
		$result->total_number	= $test;
		$result->quiz_date		= date('Y-m-d H:i:s');
		$result->quiz_date		= date('Y-m-d H:i:s');
		$result->quiz_status 	= $quiz_status;
		$result->active 		= $_POST['active'];
		if($result->save()) {
		$id =  $database->insert_id();
			
			$session->message("The <strong></strong> was successfully <strong>Added</strong>.");
			redirect_to('quiz_success.php?id='.$id);
		} else {
			$session->message("Unable to add <strong></strong>.");
			redirect_to('quiz_success.php?id='.$id);
		}
		
	
		
	
