<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	 if (!$session->is_logged_in()) { redirect_to("login_student.php"); }

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
 ?>
    <!DOCTYPE html>
    <html lang="en" class="school-html-rand">

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
        <section class='school animated zoomIn'>
            <div class='content'>
                <div class="room"> <img src='student_assets/room2.png'> </div>
                <a href="welcome.php">
                    <div style="width:180px;height:230px;position:absolute;top:190px;left:20px"></div>
                </a>
                <div class="blackboard"> <img src='student_assets/blakboard.png' class="blackboardsmall"> <img src='student_assets/blakboard.png' class="blackboardbig"> </div>
                <div class="exit" style="display: none;position:absolute;right:20px;top:20px"> <a class="waves-effect waves-light btn-large red"><i class="fa fa-close fa-5x"></i></a> </div>
                <div class="lessons" style="position:absolute;left:200px; top: 150px;display:none">
                    <?php 
                        $itemCounter = 1;
                        $lessonBG = 1;
                        $marginTop = 130;
                        $countToTwo = 0;
                    ?>
                    
                    <?php
                        if($isSched && $isPresent){
                        foreach($lesson as $lessons): ?>
                        <div class="item<?php echo $itemCounter ?>" style="position:relative; width:400px;height:100px;background:url('student_assets/<?php echo $lessonBG ?>.png');background-size:400px 100px;position:absolute;top:<?php echo $marginTop * $countToTwo?>px;display:none;cursor:pointer" data-id="<?php echo $lessons->id ?>"> 
                            <span class="lessonNumber" style="font-size:48px;color:#fff;left:50px;position: absolute;top:10px">
                                <?php echo $itemCounter ?>        
                            </span> 
                            <span class="lessonTitle" style="font-size:18px;color:#fff;left:150px;position: absolute;padding:10px;top:25px;">
                                <?php echo $lessons->name ?>                                
                            </span> 
                            <?php 
                            $quiz = Quiz::find_by_lesson($lessons->id);

                            if(!empty($quiz)) {
                                $taken = Quiz_Take::find_by_student_id($user->id,$lessons->id);
                                // echo "<pre>"; print_r($taken); echo "</pre>";
                                $attemp = Quiz_Take::find_by_student_id($user->id,$lessons->id);
                                $count = sizeof($attemp) + 1;
                                if(sizeof($taken) < 3){ ?> 
                                    <div class="quiz-img">
                                        <a href="pagsusulit.php?id=<?php echo $lessons->id ?>" style="" class="quiz-anchor item<?php echo $itemCounter ?>" >
                                            <img  src="student_assets/pagsusulit.png" style="heigth:60px;width:60px;">
                                        </a>
                                    </div>       
                                <?php } ?>
                                <div class="smiley item<?php echo $itemCounter ?>">
                                <?php if($count == 1){
                                        
                                    ?>
                                      <img height="50" width="50" src="student_assets/happy.svg">
                                        <img height="50" width="50" src="student_assets/happy.svg">
                                          <img height="50" width="50" src="student_assets/happy.svg">
                                          <?php
                                }
                                ?>
                                
                                <?php if($count == 2){
                                        
                                    ?>
                                      <img height="50" width="50" src="student_assets/happydark.svg">
                                        <img height="50" width="50" src="student_assets/happy.svg">
                                          <img height="50" width="50" src="student_assets/happy.svg">
                                          <?php
                                }
                                ?>
                                
                                <?php if($count == 3){
                                        
                                    ?>
                                      <img height="50" width="50" src="student_assets/happydark.svg">
                                        <img height="50" width="50" src="student_assets/happydark.svg">
                                          <img height="50" width="50" src="student_assets/happy.svg">
                                          <?php
                                }
                                ?>
                                 <?php if($count == 4){
                                        
                                    ?>
                                      <img height="50" width="50" src="student_assets/happydark.svg">
                                        <img height="50" width="50" src="student_assets/happydark.svg">
                                          <img height="50" width="50" src="student_assets/happydark.svg">
                                          <?php
                                }
                                ?> 
                                
                                </div>
                            <?php } ?>
                        </div>   
                        <?php 
                            $itemCounter++;
                            $lessonBG++;
                            if($lessonBG == 7){
                                $lessonBG = 1;
                            }
                            $countToTwo++;
                            if($countToTwo == 3){
                                $countToTwo = 0;
                                    
                            }
                        ?>
                    <?php endforeach;
                        } ?>
                    
                    
                    <?php
                    if($itemCounter > 3) {
                    ?> <a class="waves-effect btn green accent-3 next_lesson" style="position:absolute;left:250px;top:400px">KASUNOD</a>
                                    <?php } ?> <a class="waves-effect btn green accent-3 prev_lesson" style="position:absolute;left:50px;top:400px;display:none">BUMALIK</a> </div>
                <div class="lesson_content" style="position:relative;display:none;width:100%;top:50px;"> <a class="waves-effect btn blue-grey lighten-1 back_lesson" style="position:absolute;left:50px;display:none"><i class="fa fa-arrow-left"></i> BUMALIK SA ARALIN</a>
                    <?php
                        foreach($lesson as $lessons){
                            $lesson_dtl = Lesson_dtl::find_by_lesson($lessons->id);
                            foreach($lesson_dtl as $contents){
                                ?>
                            <div class="content_<?php echo $lessons->id ?> board_<?php echo $contents->board ?>" style="position:absolute;display:none;width:100%;top:170px;left:500px;cursor:pointer" data-id="<?php echo $contents->id ?>" data-seconds="<?php echo $contents->seconds ?>">
                                <img src="<?php echo 'images/' . $contents->filename ?>" style="position:absolute;width:250px;height:250px">
                                <audio src="audio/<?php echo $lessons->name . '/' . Audio::find_by_id($contents->audio_id)->filename ?>" id='audio_<?php echo $contents->id ?>' class="audio">
                            </div>
                            <?php
                            }
                        }
                    ?>
                            <a class="waves-effect btn green accent-3 next_board" style="position:absolute;left:980px;top:550px;display:none">KASUNOD</a>
                            <a class="waves-effect btn green accent-3 prev_board" style="position:absolute;left:80px;top:550px;display:none">BUMALIK</a> </div>
                </div>
        </section>
        <audio src="student_assets/plop.wav" id="sound"></audio>
        <img src="student_assets/room2-overlay.png" alt="" id="hahahidenananatin">
    </body>
    
    </html>
    <script>
        var initBg = "student_assets/room2.png";
        var hoverBG = "student_assets/room2-overlay.png";

        var showBoard = false;
        var lesson = 0;
        var ie = 0;
        $('.blackboardsmall').on('click', function () {

            document.getElementById('sound').play();
            lesson = 0;
            var ie = 0;
            $('.exit').removeClass('bounceOutRight');
            $('.blackboardbig').removeClass('bounceOut');
            $('.blackboard').css({
                'top': '0px'
                , 'left': '6px'
            });
            $('.blackboardbig').show();
            $('.blackboardbig').addClass('animated bounceIn');
            $('.blackboardsmall').css('display', 'none');
            $('.exit').show();
            $('.exit').css('animation-delay', '500ms');
            $('.exit').addClass('animated bounceInRight');
            showBoard = true;
            for (lesson; lesson <= 2; lesson++) {
                ie += 1;
                $('.item' + (lesson + 1)).css('animation-delay', ie / 2 + 's');
                $('.item' + (lesson + 1)).addClass('animated flipInX');
                $('.lessons').show();
                $('.item' + (lesson + 1)).show();
            }
        });

        $('.blackboardsmall').mouseover(function(){
            $('.school .content .room img').attr("src",hoverBG);
        }).mouseout(function(){
            $('.school .content .room img').attr("src",initBg);
        });

        $('.exit').on('click', function () {
            document.getElementById('sound').play();
            $('.lesson_content').hide();
            $('.lesson_content').children('div').hide();
            $(this).css('animation-delay', '500ms');
            $(this).addClass('bounceOutRight');
            $('.blackboardbig').addClass('bounceOut');
            showBoard = false;
            $('.lessons div').each(function (index, element) {
                $(element).css('animation-delay', '0s');
                $(element).addClass('flipOutX');
            });
        });
        $('.exit').on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            if (showBoard == false) {
                $('.blackboardsmall').css('display', 'block');
                $('.blackboardbig').removeClass('animated bounceIn');
                $('.exit').removeClass('animated bounceInRight');
                $('.blackboardbig').hide();
                $('.exit').hide();
                $('.blackboard').css({
                    'top': '125px'
                    , 'left': '269px'
                });
                $('.lessons div').each(function (index, element) {
                    $(element).removeClass('animated flipOutX flipInX');
                    $('.lessons').hide();
                    $(element).hide();
                });
            }
        });
        
        
    </script>
    <script src="paaralan.js"></script>