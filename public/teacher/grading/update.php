<?php     
    require_once('../../../includes/initialize.php');
    require_once("../../../includes/config.php");
    
    // Check if Logged in. If not the page will go to Signin page
    if (!$session->is_logged_in()) { redirect_to("signin.php"); }

    if (!isset($_GET["id"])) {
        redirect_to("index.php");  
    }

    $student = Student::find($_GET["id"]);
    if ($student === false) {
        redirect_to("index.php");  
    } 

    $periods = Grading_Quarters::find_all();
    $gradeClass = new Grading();
    $grading = $gradeClass->get_by_student($student->id);  
    // dd();
    $form_fields = $gradeClass->fields;
    
    $dikasali = array(
        "id",
        "student_id",
        "section_id",
        "final_grade",
        "status",
        "grading_quarters_id",
        "date_created"
    );   

    if (isset($_POST['submit'])) {
        $post = $_POST;

        $studeGrading = new Grading(); 
        
        if (isset($post['id']) && $post['id'] != "") {
            $studeGrading->id = $post['id'];
        }

        $studeGrading->student_id = $student->id;
        $studeGrading->grading_quarters_id = $post["grading_quarters_id"]; 
        $studeGrading->section_id = $student->section_id;
        $studeGrading->school_year_start = $post["school_year_start"];
        $studeGrading->school_year_end = $post["school_year_end"];
        $studeGrading->online_quiz = $post["online_quiz"];
        $studeGrading->offline_quiz = $post["quiz_total"];
        $studeGrading->quiz_total = $post["quiz_equivalent"];
        $studeGrading->quiz_percentage = $post["quiz_percentage"];
        $studeGrading->recitation_percentage = $post["recitation_percentage"];
        $studeGrading->recitation_total = $post["recitation_total"];
        $studeGrading->attendance_total = $post["attendance_total"];
        $studeGrading->attendance_percentage = $post["attendance_percentage"];
        $studeGrading->periodical_exam_total = $post["periodical_exam_total"];
        $studeGrading->periodical_exam_percentage = $post["periodical_exam_percentage"];
        $studeGrading->homework = $post["homework"];
        $studeGrading->homework_percentage = $post["homework_percentage"];
        $studeGrading->final_grade = $post["final_grade"];
        $studeGrading->status = "done";
        $studeGrading->date_created = date("Y-m-d H:i:s");
        $studeGrading->save();
        // dd($studeGrading);

        redirect_to("index.php");  
    }

?>
<?php include_layout_template('sub_header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-user "></i> Student Grading System <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="../index.php">Dashboard</a></li>
                <li class="active"> List</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 form-horizontal">
            <div class="row">
                <div class="col-xs-12 col-md-7">
                    <h3 style="margin-top: 0px;"><?php echo $student->full_name; ?> <span style="font-size: 14px">(<strong>LRN: </strong><?php echo $student->lrn ?>)</span></h3>
                    <p style="font-size: 12px;"><strong>Status: </strong> <?php echo ($student->active == 1) ? '<span class="label label-primary">active</span>' : '<span class="label label-danger">inactive</span>'; ?></p>
                </div>
                <div class="col-xs-12 col-md-3">
                    <p style="font-size: 14px;"><strong>Section: </strong> <?php echo ucfirst($student->section_name); ?></p>
                    <p style="font-size: 14px;"><strong>Teacher: </strong> <?php echo ucwords($student->teacher_name); ?></p>
                </div>
                <div class="col-xs-12 col-md-2 text-right">

                    <p style="font-size: 14px;"><strong>Parent: </strong> <?php echo ($student->parent_name != "") ? ucwords($student->parent_name) : "N/A" ; ?></p>
                </div>
            </div>
            <hr>
            <div class="grading_periods">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">

                        <?php $counter = 0; ?>
                        <?php foreach ($periods as $period): ?>
                            <li role="presentation" class="<?php echo ($counter == 0) ? 'active': '';?>">
                                <?php $name = str_replace(" ","-",ucwords($period->name));  ?>  
                                <a href="#<?php echo $name; ?>" aria-controls="<?php echo $name; ?>" role="tab" data-toggle="tab">
                                    <?php echo $period->name; ?>
                                </a>
                            </li>
                            <?php $counter = $counter + 1; ?>
                        <?php endforeach ?> 
                    </ul>
                    <!-- Tab panes -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="tab-content">
                                <?php $counter = 0; ?>
                                <?php foreach ($periods as $period): ?>                                   
                                    <?php $params = [" lesson.grading_quarter_id "=>$period->id, "student.id" => $student->id]; ?>
                                    <?php $grading = Grading::select_lesson_quiz_percentage($params); ?>
                                    <?php #dd($grading); ?>
                                    <?php $name = str_replace(" ","-",ucwords($period->name));  ?>  
                                    <div role="tabpanel" class="tab-pane <?php echo ($counter == 0) ? 'active': '';?>" id="<?php echo $name; ?>">
                                        <div class="container-fluid">
                                            <br>
                                            <h4><?php echo $name." Period"; ?></h4>
                                            <hr>

                                            <form method="post">
                                                <input type="hidden" name="grading_quarters_id" value="<?php echo $period->id; ?>">
                                                <input type="hidden" name="id" value="<?php echo ($grading->id != null) ? $grading->id: ""; ?>">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>School Year</th>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <style type="text/css">.short-sy { width:60px; text-align: center; }</style>
                                                                <div class="form-group">
                                                                    <div class="container-fluid">
                                                                        <input type="year" name="school_year_start" class="form-control input-sm short-sy pull-left" value="<?php echo ($grading->school_year_start != null) ? $grading->school_year_start: $student->sy; ?>" readonly />
                                                                        <span class="pull-left">&nbsp; <strong style="position: relative;top: -5px;font-size: 31px;">-</strong> &nbsp;</span>
                                                                        <input type="year" name="school_year_end" class="form-control input-sm short-sy pull-left" value="<?php echo ($grading->school_year_end != null) ? $grading->school_year_end: $student->sy + 1; ?>" readonly />
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Online Quiz</th>
                                                            <th>Written Quiz Percentage</th>
                                                        </tr>
                                                        <tr>                                                            
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm " readonly="readonly" min="0" max="99" name="online_quiz" value="<?php echo ($grading->online_quiz != null) ? $grading->online_quiz : $grading->quiz_final_percentage; ?>">
                                                            </td>  
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" min="0" name="quiz_total" max="99" maxlength="5" value="<?php echo ($grading->offline_quiz != null) ? $grading->offline_quiz : 0; ?>" data-equivalent="25">
                                                            </td> 
                                                        </tr>
                                                        <tr> 
                                                            <th>Total Quiz Percentage</th>
                                                            <th>Quiz Equivalent</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" readonly="readonly" step="0.01" min="0" name="quiz_percentage" value="<?php echo ($grading->quiz_percentage != null) ? $grading->quiz_percentage : 0; ?>">
                                                            </td>
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" readonly="readonly" step="0.01" min="0" name="quiz_equivalent" value="<?php echo ($grading->quiz_total != null) ? $grading->quiz_total : 0; ?>">
                                                            </td>
                                                        </tr> 
                                                        <tr>
                                                            <th colspan="1">Recitation Percentage</th>
                                                            <th>Recitation Equivalent</th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="1">
                                                                <input type="number" name="recitation_percentage" required="required" class="form-control input-sm" step="0.01" min="0" value="<?php echo ($grading->recitation_percentage != null) ? $grading->recitation_percentage : 0; ?>" data-equivalent="15">
                                                            </td>                                                            
                                                            <td>
                                                                <input type="number" required="required" readonly="readonly" class="form-control input-sm" step="0.01" min="0" name="recitation_total" max="99" maxlength="5" value="<?php echo ($grading->recitation_total != null) ? $grading->recitation_total : 0; ?>">
                                                            </td>
                                                        </tr> 
                                                        <tr>
                                                            <th>Homework Percentage</th>
                                                            <th>Homework Equivalent</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" step="0.01" min="0"  max="99" maxlength="5" name="homework_percentage" value="<?php echo ($grading->homework_percentage != null) ? $grading->homework_percentage : 0; ?>" data-equivalent="20">
                                                            </td>                                                            
                                                            <td>
                                                                <input type="number" required="required" readonly="readonly" class="form-control input-sm" min="0" max="99" maxlength="5" name="homework" value="<?php echo ($grading->homework != null) ? $grading->homework : 0; ?>">
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                            <th>Attendance Percentage</th>
                                                            <th>Attendance Equivalent</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" step="0.01" min="0"  max="99" maxlength="5" name="attendance_percentage" data-equivalent="15" value="<?php echo ($grading->attendance_percentage != null) ? $grading->attendance_percentage : 0; ?>">
                                                            </td>
                                                            <td>
                                                                <input type="number" required="required" readonly="readonly" class="form-control input-sm" min="0" name="attendance_total" max="99" maxlength="5" value="<?php echo ($grading->attendance_total != null) ? $grading->attendance_total : 0; ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Periodical Exam Percentage</th>
                                                            <th>Periodical Exam Equivalent</th>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <input type="number" required="required" class="form-control input-sm" step="0.01" min="0" max="99" maxlength="5" name="periodical_exam_percentage" value="<?php echo ($grading->periodical_exam_percentage != null) ? $grading->periodical_exam_percentage : 0; ?>" data-equivalent="25">
                                                            </td>
                                                             <td>
                                                                <input type="number" required="required" readonly="readonly" class="form-control input-sm" min="0" name="periodical_exam_total" max="99" maxlength="5" value="<?php echo ($grading->periodical_exam_total != null) ? $grading->periodical_exam_total : 0; ?>">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="row">
                                                    <div class="col-sm-3 pull-left">
                                                        <table class="table">                                                    
                                                            <tbody>
                                                                <tr>
                                                                    <th>Final Percentage</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="number" readonly="readonly" required="required" class="form-control input-sm" step="0.01" min="0" name="final_percentage" value="<?php echo ($grading->final_grade != null) ? $grading->final_grade : 0; ?>">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Final Grade</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="number" readonly="readonly" required="required" class="form-control input-sm" step="0.01" min="0" name="final_grade" value="<?php echo ($grading->final_grade != null) ? $grading->final_grade : 0; ?>">
                                                                    </td>
                                                                </tr> 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-sm-12 text-right">
                                                        <input type="submit" name="submit" class="btn btn-primary" style="margin-right: 10px;">
                                                    </div>
                                                </div> 
                                            </form>
                                        </div>
                                    </div>
                                    <?php $counter = $counter + 1; ?>
                                <?php endforeach ?>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var keyEvents = "change, keypress, keyup, focusout, mouseout, mouseleave";
        $('input[name="quiz_total"]').on(keyEvents,function(){
            var offline = parseFloat($(this).val());
            var online  = parseFloat($('input[name="online_quiz"]').val());
        
            var final = (offline + online) / 2;
            $('input[name="quiz_percentage"]').val(final);

            var quizEq = $('input[name="quiz_total"]').data("equivalent");

            var finalEq = quizEq * (final / 100);            
            $('input[name="quiz_equivalent"]').val( (finalEq).toFixed(2) );

            // quiz_equivalent
        });

        
        $('input[name="recitation_percentage"]').on(keyEvents,function(){
            var final = parseFloat($(this).val());
            var quizEq = parseFloat($(this).data("equivalent"));

            var finalEq = quizEq * (final / 100);     
            $('input[name="recitation_total"]').val( (finalEq).toFixed(2) );
        });

        $('input[name="homework_percentage"]').on(keyEvents,function(){
            var final = parseFloat($(this).val());
            var quizEq = parseFloat($(this).data("equivalent"));

            var finalEq = quizEq * (final / 100);     
            $('input[name="homework"]').val( (finalEq).toFixed(2) );
        });

        $('input[name="attendance_percentage"]').on(keyEvents,function(){
            var final = parseFloat($(this).val());
            var quizEq = parseFloat($(this).data("equivalent"));

            var finalEq = quizEq * (final / 100);     
            $('input[name="attendance_total"]').val( (finalEq).toFixed(2) );
        });

        $('input[name="periodical_exam_percentage"]').on(keyEvents,function(){
            var final = parseFloat($(this).val());
            var quizEq = parseFloat($(this).data("equivalent"));

            var finalEq = quizEq * (final / 100);     
            $('input[name="periodical_exam_total"]').val( (finalEq).toFixed(2) );
        });


        $('input[name="quiz_total"], input[name="recitation_percentage"], input[name="homework_percentage"], input[name="attendance_percentage"], input[name="periodical_exam_percentage"]').on(keyEvents, function(){
            var quiz_equivalent = parseFloat($('input[name="quiz_equivalent"]').val());
            var recitation_total = parseFloat($('input[name="recitation_total"]').val());
            var homework = parseFloat($('input[name="homework"]').val());
            var attendance_total = parseFloat($('input[name="attendance_total"]').val());
            var periodical_exam_total = parseFloat($('input[name="periodical_exam_total"]').val());

            var total = quiz_equivalent+recitation_total+homework+attendance_total+periodical_exam_total;

            $('input[name="final_percentage"]').val((total).toFixed(3));
        
            $("input[name='final_grade']").val( (total).toFixed(2) );
        });


    });
</script>
<?php include_layout_template('sub_footer.php'); ?>

