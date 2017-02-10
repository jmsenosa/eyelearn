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
                                    <?php $name = str_replace(" ","-",ucwords($period->name));  ?>  
                                    <div role="tabpanel" class="tab-pane <?php echo ($counter == 0) ? 'active': '';?>" id="<?php echo $name; ?>">
                                        <div class="container-fluid">
                                            <br>
                                            <h4><?php echo $name." Period"; ?></h4>
                                            <hr>

                                            <form method="post">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Online Quiz</th>
                                                            <td></td>
                                                        </tr>
                                                        <tr>                                                            
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm " readonly="readonly" min="0" name="online_quiz" value="">
                                                            </td> 
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Quiz Total</th>
                                                            <th>Quiz Percentage</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" min="0" name="quiz_total" max="100" maxlength="3" value="">
                                                            </td> 
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" readonly="readonly" step="0.01" min="0" name="quiz_percentage" value="">
                                                            </td>
                                                        </tr> 
                                                        <tr>
                                                            <th colspan="2">Recitation Percentage</th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="1">
                                                                <input type="number" required="required" class="form-control input-sm" step="0.01" min="0" name="recitation_percentage" value="">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Attendance Total</th>
                                                            <th>Attendance Percentage</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" min="0" name="attendance_total" max="100" maxlength="3" value="">
                                                            </td>
                                                            <td>
                                                                <input type="number" readonly="readonly" required="required" class="form-control input-sm" step="0.01" min="0" name="attendance_percentage" value="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Periodical Exam Total</th>
                                                            <th>Periodical Exam Percentage</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" min="0" name="periodical_exam_total" max="100" maxlength="3" value="">
                                                            </td>
                                                            <td>
                                                                <input type="number" readonly="readonly" required="required" class="form-control input-sm" step="0.01" min="0" name="periodical_exam_percentage" value="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Homework</th>
                                                            <th>Homework Percentage</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="number" required="required" class="form-control input-sm" min="0" name="homework" value="">
                                                            </td>
                                                            <td>
                                                                <input type="number" readonly="readonly" required="required" class="form-control input-sm" step="0.01" min="0" name="homework_percentage" value="">
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
                                                                        <input type="number" readonly="readonly" required="required" class="form-control input-sm" step="0.01" min="0" name="final_percentage" value="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Final Grade</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="number" readonly="readonly" required="required" class="form-control input-sm" step="0.01" min="0" name="final_grade" value="">
                                                                    </td>
                                                                </tr> 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-sm-12 text-right">
                                                        <input type="submit" name="Submit" class="btn btn-primary" style="margin-right: 10px;">
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
<?php include_layout_template('sub_footer.php'); ?>

