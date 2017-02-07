<?php 
    require_once('../includes/initialize.php');

    if ($_GET['lesson_id'] != "" && $_GET['quiz_id'] != "" ) {
        
        $quiz = Quiz::find_by_id($_GET['quiz_id'], $_GET['lesson_id']);
        if (count($quiz) == 0) {           
            // redirect_to('paaralan.php');
        }
        $quiz = $quiz[0];

        $tm_quizes = Quiz_True_Or_False::find_by_id_lesson($_GET['quiz_id'], $_GET['lesson_id']);
        if (count($tm_quizes) == 0) {
            // redirect_to('paaralan.php');
        }

        if ( isset($_POST['submit'])  ) {
            $post = $_POST;
            unset($post['submit']);

            $score = 0;
            $total_number = count($tm_quizes);

            foreach ($tm_quizes as $tmquiz) {

                foreach ($post['answer'] as $key => $value) {
                    
                    if ($tmquiz->id == $key) {
                        

                        if ($tmquiz->correct_answer == $value) {
                            $score = $score + 1;
                            break;
                        }
                    }
                }
            }
            $quiz_result = new Quiz_result;
            $quiz_result->quiz_id = $_GET['quiz_id'];
            $quiz_result->user_id = $_SESSION['user_id'];
            $quiz_result->lesson_id = $_GET['lesson_id'];
            $quiz_result->score   =  $score;
            $quiz_result->total_number   =  count($tm_quizes);
            $quiz_result->quiz_date = date("Y-m-d H:i:s");
            $quiz_result->last_update = date("Y-m-d H:i:s");

            if(($score/$total_number) <= 0.2){
                $quiz_result->remarks = "Needs Improvement"; 
            }
            elseif(($score/$total_number) >= 0.21 && $score/$total_number <= 0.4){
                $quiz_result->remarks = "good";
            }
            elseif(($score/$total_number) >= 0.41 && ($score/$total_number) <= 0.6){
                $quiz_result->remarks = "Very good";
            }
            elseif(($score/$total_number) >= 0.61 && ($score/$total_number) <= 0.8){
                $quiz_result->remarks = "Fantastic";
            }
            else{
                $quiz_result->remarks = "Excellent";
            }

            $quiz_result->current_item = 10;

            $quiz_result->save(); 
            redirect_to('paaralan.php');

        }  
 
    }else{
        redirect_to('paaralan.php');
    }

    function url(){ 

        $public_path = explode("/", $_SERVER['PHP_SELF']);
        foreach ($public_path as $key => $value) {
            if ($value == "public") {
                $public_path = "public";
                break;
            }
        }
 

        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            "/"
        );
    } 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>   
</head>

<body>
    <form method="post" id="tm-form">
        <section class="pagsusulit animated fadeIn" id="tama-mali-section">         
            <?php $counter = 0; ?>
            <?php foreach ($tm_quizes as $tmquiz): ?>
                <div class="tm_question_container <?php echo ($counter == 0) ? "tm-shown":"tm-hidden" ; ?>" id="tm-quiz-<?php echo $tmquiz->id; ?>" data-id="<?php echo $tmquiz->id; ?>" data-counter="<?php echo $counter; ?>">
                    <h5 class="header text-center"><?php echo $quiz->description; ?></h5>
                    <div class="tm-question" style=" background: url('<?php echo url()."uploads/".$tmquiz->background?>') no-repeat center center; ">
                        <div class="question-wrapp">
                            <div class="table-type full-width">
                                <div class="table-row-type"> 
                                    <div class="table-cell-type valign-middle text-center">
                                        <p class="tmquiz-question"><?php echo $tmquiz->question; ?></p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm-selection">
                        <div class="float-left text-center width50percent tm-choice">
                            <a href="#" data-selection="true">
                                <img src="<?php echo url()."uploads/".$tmquiz->true_image?>">
                                <?php echo $tmquiz->truth_text ?>
                            </a>
                        </div>
                        <div class="float-right text-center width50percent tm-choice">
                            <a href="#" data-selection="false">
                                <img src="<?php echo url()."uploads/".$tmquiz->false_image?>">
                                <?php echo $tmquiz->false_text ?>
                            </a>
                        </div>
                        <div class="clear_fix"></div>
                    </div>
                    <input type="hidden" name="answer[<?php echo $tmquiz->id; ?>]" value="">
                </div>
                <?php $counter = $counter + 1; ?>
            <?php endforeach ?>
            <div class="tm_question_container tm-hidden" id="submitter">
                <h4 class="text-center">MGA SAGOT</h4>
                <div class="questions-ansswers">
                    
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" class="tm-submit" value="IPASA">
                </div>
            </div>
        </section>   
    </form>
</body>

</html>


<script type="text/javascript">

    var tmform = $("tm-form");

    var answeringQuestion = function(callback){
        $(".tm_question_container").each(function(){
            var question = $(this).find('.tmquiz-question').html();
            var value = $(this).find('input[type="hidden"]').val();

            if (typeof value != 'undefined' && typeof question != 'undefined') {

                var questionWrap = $("<div/>",{
                    id : $(this).data("id"),
                    class : "float-left answered-item"
                }).append('<div>'+question+'</div>'+'<div>'+value+'</div>');

                $(".questions-ansswers").append(questionWrap); 
            };
        });

        $(".questions-ansswers").append('<div class="clear_fix"></div>'); 
    };

    var toggleContainer = function (selectedDiv, callback){
        var counter = selectedDiv.data('counter');
        var width = selectedDiv.outerWidth();
        var left = 0 - ( selectedDiv.offset().left + width );

        if (counter > 0) {
            left = left * counter;
        }

        // console.log(counter, left, counter * left);
        selectedDiv.css({left:selectedDiv.offset().left}).animate({"left":left}, 200);
        counter = counter + 1;
        callback(counter);
    };

    $(document).ready( function() {
        $(document).on("click",".tm-choice a", function(){
            var answer = $(this).data("selection");
            var parent = $(this).closest('.tm_question_container');

            // console.log();
            parent.find("input[type='hidden']").val(answer);

            if ( parent.next( ".tm_question_container" ).length > 0 ) {
                
                toggleContainer( parent, function( counter ){
                    
                    parent.next( ".tm_question_container" ).show(500);
                });
                

                if (parent.next().attr("id") == "submitter") {
                    
                    answeringQuestion(function(){
                        $("#submitter").find('input[type="submit"]').click(function(){
                            return true;
                        });
                    });
                }

            }

            return false;
        });
    });
</script>