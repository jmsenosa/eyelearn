<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	 if (!$session->is_logged_in()) { redirect_to("login.php"); }
	
	// Find User 
	$user = Student::find_by_id($_SESSION['user_id']);	
	$lesson = Lesson::find_by_date($user->teacher);
  $teacher = User::find_by_id($user->teacher);
  $isSched = false;
  $isPresent = false;
  $isSched = (time() >= strtotime($teacher->fromtime) && time() <= strtotime($teacher->totime)) ? true : false;

  $attendance = Attendance::find_by_today_student($user->id,date('Y-m-d'));

  if($attendance){
      $isPresent = $attendance->attendance == "present" ? true : false;
  }

  if($isSched && $isPresent){
      
  }
  else{
      $session->logout();
      $session->message('Sorry, you can\'t use this system. Please, Login on your assigned schedule.'); // ikaw na bahala mag bago
      redirect_to('login_student.php');
  }
	
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>

  
</head>

<body>
    <section class="intro">
        
        <div class="content">
           <div class="logo">
               <img src="student_assets/logo.png" class="animated flipInX">
           </div>

           <div class="owl">
               <img src="student_assets/owl.gif" class="animated lightSpeedIn">
           </div>

           <div class="button  animated fadeIn" >
                <a href="welcome.php" class="waves-effect waves-light btn-large" style="min-width:200px; font-size:50pt;"><i class="fa fa-play-circle-o fa-5x"></i> PASOK</a></h1><br><br>
               <a href="logout.php" class="waves-effect waves-light btn-large red" style="min-width:200px; font-size:50pt;"><i class="fa fa-sign-out fa-5x"></i> LABAS</a>
            </div>

            <audio src="student_assets/ABAKADA.mp3" id="intro" loop></audio>
            
        </div>

        
    </section>   
    
    
</body>

</html>
<script>

document.getElementById('intro').play();
    
</script>