<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	 if (!$session->is_logged_in()) { redirect_to("login_student.php"); }
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
 ?>
<html>
<head>
    <?php include('header.php'); ?>

  
</head>
    
    <body>
        <div class="fadeIn animated horizontal-align" style="font-size:100px;margin-top:100px;text-align:center">KAMUSTA!</div>
        <div class="fadeIn animated horizontal-align" style="font-size:100px;margin-top:20px;text-align:center;animation-delay:1s"><?php echo $user->first_name ?></php></div>
    </body>

</html>
<script>

setTimeout(function () {
            location.href= 'welcome.php';
        }, 5000);
</script>