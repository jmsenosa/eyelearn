<?php 
    // Initialize Page
    require_once('../includes/initialize.php');
    
    // Check if Logged in. If not the page will go to Signin page
     if (!$session->is_logged_in()) { redirect_to("login_student.php"); }

    // Find User 
    $user = Student::find_by_id($_SESSION['user_id']);  
    $lesson = Lesson::find_by_date($user->teacher);
    // dd($lesson);
 
    $teacher = User::find_by_id($user->teacher);
    $isSched = false;
    $isPresent = false;
    
    $isSched = (time() >= strtotime($teacher->fromtime) && time() <= strtotime($teacher->totime)) ? true : false;
    $attendance = Attendance::find_by_today_student($user->id,date('Y-m-d'));

    if($attendance){
        $isPresent = $attendance->attendance == "present" ? true : false;
    }
 ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include('header.php'); ?>
        <style>
            .quiz-img {
                position:relative;
                display: block !important;
            }
            
            .quiz-anchor
            {
                    position: absolute;
                    right: -120px;
                    top: 13px;
            }
        </style>
    </head>
    <body>
        <section class='pagsusulit animated bounceInDown'>
            <div class='content'>
                <!-- <div class="room"> <img src='student_assets/blakboard.png'> </div> -->
                <a href="welcome.php">
                    <div style="width:180px;height:230px;position:absolute;top:190px;left:20px"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="pagsusulit.php?id=<?php echo $lessons->id ?>?=piliinangtamangsagot" class="uri">
                                PILIIN ANG TAMANG SAGOT
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo pagsusulit.php?id=<?php echo $lessons->id ?>; ?>" class="uri">
                                PILIIN ANG TAMANG SAGOT
                            </a>
                        </div>
                    </div>
                </a> 
            </div>
        </section>
    </body>
                