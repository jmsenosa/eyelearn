<?php
	// Initialize 
	require_once('../../includes/initialize.php');
	// Check if User is Logged in to view this page.
	
	if (!$session->is_logged_in()) { redirect_to("login.php"); }
	//!$session->is_logged_in() ? redirect_to("../login.php") : redirect_to("index.php"); 
	if(!isset($_GET['student_id'])){
           
        }
        else{
            $lesson = Lesson::find_all_by_date();
            $attendance = Attendance::find_by_student($_GET['student_id']);
        }
$lessonCount = 1;
	// find user info
	$user = Magulang::find_by_id($_SESSION['user_id']);
    $myStudents = Student::find_my_parent($user->last_name,$user->first_name);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Eye Learn</title>
    <!-- Bootstrap Core CSS -->
    <link href="../materialize.min.css" rel="stylesheet">
    <link href="../animate.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../materialize.min.js"></script>
</head>

    <style>
        .side-nav a:hover{
            background-color: #039be5   !important;
        }
    
    </style>
    
<body <?php echo (isset($_GET['student_id']) ? 'style="margin-left:150px;"' : ''); ?>>
    <div class="navbar-fixed ">
        <nav class="light-blue darken-2">
            <div class="nav-wrapper container">
                <ul class="left">Hello! Mr/Mrs. <?php echo $user->last_name ?></ul>
                <ul class="right">
                   <li><a href="index.php">Home</a></li>
   
                    <li><a href="profile.php">Profile</a></li>
                    <!--<li><a href="#" data-activates="slide-out" class="button-collapse show-on-large">Lesson Progress</a></li>-->
                    <li><a href="logout.php">Logout</a></li>
                    
                </ul>
            </div>
        </nav>
    </div>
    
    
    
    <?php if(isset($_GET['student_id'])):  ?>
    <div class="container"><br><br>
        <div class="card-panel">
            <b>
            <span class="orange-text">Orange </span>
            <span class="blue-text text-darken-2">is for upcoming lesson,
            <span class="green-text"> Green</span> is for ongoing lesson and 
            <span class="red-text">Red</span> is for finished lesson.</b></span>
        </div>
        <div class="card-panel">
            <span class="blue-text text-darken-2">Hover the mouse on the attemp score to see remarks.</span>
        </div>
        <?php elseif(count($myStudents) == 0): ?>
        <div class="container">
            <br><br>
            <div class="card-panel">
              <span class="blue-text text-darken-2">Add student first to see records.</span>
            </div>
        </div>
        <?php else: ?>
        <div class="container"><br><br>        
            <div class="card-panel">
                <span class="blue-text text-darken-2">Please Select your Student to see his/her Attendance, Results and Lesson Progress.</span>
            </div>
        </div>
        <?php endif; ?>
        <div class="container"><br><br>    
            <?php if(!isset($_GET['student_id'])): ?>
                <div class="row">
                    <?php foreach($myStudents as $mystudent): ?>
                        <?php $student = Student::find_by_id($mystudent->id); ?>
                        <div class="col s12 m6">
                            <div class="card horizontal">
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <p>Name: <?php echo $student->full_name(); ?></p>
                                        <p>Section: <?php echo $student->section; ?></p>
                                        <p>Teacher: <?php echo  User::find_by_id($student->teacher)->full_name(); ?></p>
                                    </div>
                                    <div class="card-action">
                                        <a href="?student_id=<?php echo $student->id ?>">Please click this to see reports</a>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    <?php endforeach; ?>
                </div>
            <?php else: ?> 
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s6"><a href="#progress" class="active">Progress</a></li>
                            <li class="tab col s6"><a href="#attendance">Attendance</a></li>
                        </ul>
                    </div>
                </div>
                <div id="progress">
                    <h3>Lesson Progress</h3>
                    <table class="centered">
                        <tr>
                            <th>Lesson Name</th>
                            <th>Date</th>
                            <th>Total Items</th>
                            <th>Attempt 1</th>
                            <th>Attempt 2</th>
                            <th>Attempt 3</th>                            
                        </tr>
                        <?php $check = Quiz_result::find_my_student_group_lesson($_GET['student_id']); ?>
                        <?php foreach($check as $checks) { ?>
                        <tr>
                            <?php $lesson_result = Quiz_result::find_my_student($_GET['student_id'],$checks->lesson_id); ?>
                            <td style='text-align: left !important'><?php echo Lesson::find_by_id($checks->lesson_id)->name; ?></td>
                            <td style='text-align: left !important'><?php echo $checks->quiz_date; ?></td>
                            <td><?php echo $checks->total_number; ?></td>
                            <td style='text-align: left !important'><?php echo $checks->quiz_date; ?></td>
                            <?php for($i = 0;$i < 3;$i++) { ?>
                                <td class='tooltipped' style='cursor:pointer' data-position='top' data-tooltip='<?php echo $lesson_result[$i]->remarks; ?>'><?php echo ($lesson_result[$i]->score == "" ? "N/a" : $lesson_result[$i]->score); ?></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div id="attendance">
                    <h3>Attendance</h3>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Attendance</th>
                        </tr>
                        <?php foreach ($attendance as $a): ?>
                        <tr>
                            <td><?php echo $a->date; ?></td>
                            <td><?php echo $a->attendance; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div> 
            <?php endif; ?>
        </div>   
    </div> 
</body>
</html>

<script>
$(".button-collapse").sideNav();
    
</script>