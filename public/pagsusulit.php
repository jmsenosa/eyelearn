<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("login.php"); }
	error_reporting(E_ALL);
	// Find User 
	$user = Student::find_by_id($_SESSION['user_id']);	
	$quizes = Quiz::find_by_lesson_rand($_GET['id']);
    $lesson = Lesson::find_by_id($_GET['id']);


    $numbers = array(
        "tm" => 0,
        "mc" => 0
    );

    foreach ($quizes as $quiz) {
        if ($quiz->quiz_category_id == 1) {
            $numbers['mc'] = $numbers['mc'] + 1;
        }else{            
            $numbers['tm'] = $numbers['tm'] + 1;
        }
    }

    $new_quizes = [];

    $taken = Quiz_result::find_my_student($user->id,$lesson->id);
    // echo "<pre>"; echo "egg: ".count($taken); echo "</pre>";
    $attemp = Quiz_result::find_my_attemp($lesson->id,$user->id);
    $count = sizeof($attemp) + 1;

    if ($numbers['mc'] > $numbers['tm']) {
        foreach ($quizes as $quiz) {
            if ($quiz->quiz_category_id == 1) {
                $new_quizes[] = $quiz;
            }
        }
    }else{
        foreach ($quizes as $quiz) {
            if ($quiz->quiz_category_id != 1) {
                $new_quizes[] = $quiz;
            }
        }
    }

    $quizes = $new_quizes; 

    $total = count($quizes);
    $isContinue = Quiz_result::find_is_continue($_GET['id'], $_SESSION['user_id']);
    $number = 1;
    $score = 0;
    $attemp = Quiz_result::find_my_attemp($_GET['id'], $_SESSION['user_id']);

    $count = count($attemp) + 1;
    if(count($isContinue) > 0){
        $count -= 1;
        foreach($isContinue as $continue):
            $number = $continue->current_item;
            $score = $continue ->score;
        endforeach;
    }
    if(isset($_POST['submit'])){

        $master = Quiz_Master::find_by_id($_POST["quiz_master_id"]);
        // dd($master);
        $quiz_taken = new Quiz_Take();
 
        $quiz_taken->quiz_master_id = $_POST["quiz_master_id"];
        $quiz_taken->student_id = $_POST["user_id"];
        $quiz_taken->score = $_POST["score"];
        $quiz_taken->total_questions = $_POST["total_number"];
        $quiz_taken->last_update = $_POST["quiz_date"];
        $quiz_taken->lesson_id = $master->lesson_id;
    
        $quiz_taken->save();
        redirect_to('paaralan.php');	
    } 
    
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>   
</head>

<body>
    <section class="pagsusulit animated fadeIn">        
        <div class="site_title animated bounceInDown">
            <?php for($x = 1;$x<=$count;$x++){ ?>
                <img height="50" width="50" src="student_assets/happy.svg">
            <?php } ?>
        </div>      
        <?php
            $item = 0;
            $quiz_id = 0;
            foreach($quizes as $quiz){ 
                if($quiz->type == "salita"){
                    $quiz_id = $quiz->id;
                    $quiz_maser_id = $quiz->quiz_master_id;
                    $item += 1;
                ?>
                    <div class="Quiz<?php echo $item ?> QuizDiv" data-quiztype="salita" data-quiz_id="<?php echo $quiz->id ?>">
                        <div class="description" ><span style="font-size:32px;"><?php echo $item ?></span></div>
                        <audio style="position:absolute;left: 450px;top:80px" id="audio<?php echo $item ?>">
                          <source src="<?php echo 'audio/' . $quiz->audio ?>">
                        </audio>
                        <img style="position:absolute;left: 560px;top:50px" height="80" width="80" data-id="audio<?php echo $item ?>" src="student_assets/ear.png" class="ear">
                        <img class="sagot" <?php echo 'data-answer=',($quiz->answer == 1 ? "yes" : "no") ?> src="<?php echo 'images/' . $quiz->choice1 ?>" style="position:absolute;width:250px;height:250px;left:25px;top:160px">
                        <img class="sagot" <?php echo 'data-answer=',($quiz->answer == 2 ? "yes" : "no") ?> src="<?php echo 'images/' . $quiz->choice2 ?>" style="position:absolute;width:250px;height:250px;left:325px;top:160px">
                        <img class="sagot" <?php echo 'data-answer=',($quiz->answer == 3 ? "yes" : "no") ?> src="<?php echo 'images/' . $quiz->choice3 ?>" style="position:absolute;width:250px;height:250px;left:625px;top:160px">
                        <img class="sagot" <?php echo 'data-answer=',($quiz->answer == 4 ? "yes" : "no") ?> src="<?php echo 'images/' . $quiz->choice4 ?>" style="position:absolute;width:250px;height:250px;left:925px;top:160px">
                        
                    </div>
                                            
        <?php
                }
                
                if($quiz->type == "naiiba"){
                $quiz_id = $quiz->id;
                $quiz_maser_id = $quiz->quiz_master_id;
                $item += 1;
                ?>
                    <div class="Quiz<?php echo $item ?> QuizDiv" data-quiztype="naiiba">
                       <div class="description" ><span style="font-size:32px;"><?php echo $item ?></span></div>
                        <audio style="position:absolute;left: 450px;top:80px" id="audio<?php echo $item ?>">
                          <source src="<?php echo 'audio/' . $quiz->audio ?>">
                        </audio>
                        <img style="position:absolute;left: 570px;top:50px" height="80" width="80" data-id="audio<?php echo $item ?>" src="student_assets/ear.png" class="ear">
                        
                        
                        <img class="sagot" <?php echo 'data-answer=',($quiz->answer == 1 ? "yes" : "no") ?> src="<?php echo 'images/' . $quiz->choice1 ?>" style="position:absolute;width:250px;height:250px;left:25px;top:160px">
                        <?php
                        $lesson_dtl = Lesson_dtl::find_by_filename($quiz->choice1);
                        foreach($lesson_dtl as $dtl){
                            $audio = Audio::find_by_id($dtl->audio_id);
                               ?>
                        <audio src="audio/<?php echo $audio->folder . '/' . $audio->filename ?>" id='audio<?php echo $item?>-1'></audio>
                        <a class="btn-floating btn-large waves-effect waves-light red" data-audioid='audio<?php echo $item?>-1' style="position:absolute;left:125px;top:390px"><i class="fa fa-play"></i></a>
                        <?php
                            
                        }
                        
                        ?>
                        
                        
                        
                        <img class="sagot" <?php echo 'data-answer=',($quiz->answer == 2 ? "yes" : "no") ?> src="<?php echo 'images/' . $quiz->choice2 ?>" style="position:absolute;width:250px;height:250px;left:325px;top:160px">
                        <?php
                        $lesson_dtl = Lesson_dtl::find_by_filename($quiz->choice2);
                        foreach($lesson_dtl as $dtl){
                            $audio = Audio::find_by_id($dtl->audio_id);
                               ?>
                        <audio src="audio/<?php echo $audio->folder . '/' . $audio->filename ?>" id='audio<?php echo $item?>-2'></audio>
                        <a class="btn-floating btn-large waves-effect waves-light red" data-audioid='audio<?php echo $item?>-2' style="position:absolute;left:425px;top:390px"><i class="fa fa-play"></i></a>
                        <?php
                            
                        }
                        
                        ?>
                        
                        
                        
                        <img class="sagot" <?php echo 'data-answer=',($quiz->answer == 3 ? "yes" : "no") ?> src="<?php echo 'images/' . $quiz->choice3 ?>" style="position:absolute;width:250px;height:250px;left:625px;top:160px">
                        <?php
                        $lesson_dtl = Lesson_dtl::find_by_filename($quiz->choice3);
                        foreach($lesson_dtl as $dtl){
                            $audio = Audio::find_by_id($dtl->audio_id);
                               ?>
                        <audio src="audio/<?php echo $audio->folder . '/' . $audio->filename ?>" id='audio<?php echo $item?>-3'></audio>
                        <a class="btn-floating btn-large waves-effect waves-light red" data-audioid='audio<?php echo $item?>-3' style="position:absolute;left:725px;top:390px"><i class="fa fa-play"></i></a>
                        <?php
                            
                        }
                        
                        ?>
                        
                        
                        <img  class="sagot" <?php echo 'data-answer=',($quiz->answer == 4 ? "yes" : "no") ?> src="<?php echo 'images/' . $quiz->choice4 ?>" style="position:absolute;width:250px;height:250px;left:925px;top:160px">
                        <?php
                        $lesson_dtl = Lesson_dtl::find_by_filename($quiz->choice4);
                        foreach($lesson_dtl as $dtl){
                            $audio = Audio::find_by_id($dtl->audio_id);
                               ?>
                        <audio src="audio/<?php echo $audio->folder . '/' . $audio->filename ?>" id='audio<?php echo $item?>-4'></audio>
                        <a class="btn-floating btn-large waves-effect waves-light red" data-audioid='audio<?php echo $item?>-4' style="position:absolute;left:1025px;top:390px"><i class="fa fa-play"></i></a>
                        <?php
                            
                        }
                        
                        ?>
                        
                        
                    </div>
                                            
        <?php
                }

                if ($quiz->type == "") {
                    if ($quiz->quiz_category_id == 3) {
                        redirect_to('pagsusulit_tama_mali.php?lesson_id='.$quiz->lesson_id."&quiz_id=".$quiz->id);
                    }
                }
            }
        ?>
        
            <!--  Score Text      -->
        <div class="score" style="display:none;position:absolute;top:200px;left:200px;color:white;font-size:32px;width:800px;text-align:center;margin:0 auto">
            
           
            <a class="waves-effect waves-light btn go_back">Bumalik</a>
             <br> 
        </div>
        
        <form method="POST">
            <input type="hidden" name="quiz_master_id" id="quiz_id" value="<?php echo $quiz_maser_id; ?>">
            <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
            <input type="hidden" name="score" value="0" id="form_score">
            <input type="hidden" name="total_number" value="<?php echo $total ?>" id="form_total">
            <input type="hidden" name="quiz_date" value="<?php echo date("Y-m-d H:i:s")?>">
            <input type="submit" name="submit" value="submit" id="form_submit" style="display:none">
        </form>
        
    </section>   
    
    
</body>

</html>
<script>
    $(document).ready(function(){
        var item = <?php echo $number ?>;
        var total_number = <?php echo $total ?>;
        var correctAns = <?php echo $score ?>; 
        $('.Quiz' + item).css('animation-duration','2s');
        $('.Quiz' + item).addClass('animated fadeInRight');
        $('.Quiz' + item).show();
        setTimeout(function(){
            document.getElementById('audio' + item).play();    
        },2000);

        $('.ear').on('click',function(){
            var id = $(this).data('id');
            document.getElementById(id).play();
        })
        
        $('.sagot').on('click',function(){
            if($(this).data('answer') == "yes"){
                correctAns += 1;
            }
            var previtem = item;
            item = item + 1;

            var totoong_quiz_id = $(this).closest(".QuizDiv").data("quiz_id");

            $.post('pagsusulitcon.php', {
                id:'<?php echo $_GET['id'] ?>',
                current_item:item,
                score:correctAns,
                total_number:total_number,
                quiz_id:totoong_quiz_id,
                user_id:'<?php echo $_SESSION['user_id'] ?>'
            }, function(data){
                data = $.parseJSON(data);
                var form_score = $("#form_score").val();
                form_score = parseInt(form_score) + parseInt( data["score"] );
                $("#form_score").val(form_score);
            });

           
            $('.Quiz' + previtem).addClass('fadeOutLeft');       
                setTimeout(function(){
                $('.Quiz' + item).css('animation-duration','2s');
                $('.Quiz' + item).addClass('animated fadeInRight');
                $('.Quiz' + item).show();
                    setTimeout(function(){
                        document.getElementById('audio' + item).play();    
                    },1000);

            },1000);
            
            if(item == <?php echo $item+1 ?>){
                
                $('.score').addClass('animated fadeIn');
                $('.score').show();
                 
              
                for(var x = 0;x < correctAns;x++){
                    $('<img src="student_assets/star.svg" width="80" height="80">').appendTo(".score");
                }
            }
        });
        
        $('.go_back').click(function(){
            $( "#form_submit" ).trigger( "click" );
        });
        
        $('.btn-floating').on('click',function(){
            var id = $(this).data('audioid');
            document.getElementById(id).play();
        });
    });
</script>