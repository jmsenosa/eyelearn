<?php 
    require_once('../../../../includes/initialize.php'); 
    if (!$session->is_logged_in()) { redirect_to("signin.php"); } 

    $data = $_GET;  
    $quiz_category_id = (isset($data["quiz_cat"])) ? $data["quiz_cat"]: 3;

    if ( isset($data["master_id"]) && $data["master_id"] != "") {
        $master_id = $data["master_id"];
        $master = Quiz_Master::find_by_id($master_id);
 

        $dbHost = DB_SERVER;
        $dbUsername = DB_USER;
        $dbPassword = DB_PASS;
        $dbName = DB_NAME;

        //connect with the database
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        $sql = "SELECT 
                    * 
                FROM 
                    quiz_master
                LEFT JOIN
                    quiz
                        ON 
                            quiz.quiz_master_id = quiz_master.id
                LEFT JOIN
                    quiz_true_or_false
                        ON
                            quiz_true_or_false.quiz_id = quiz.id 
                LEFT JOIN
                    audio
                        ON
                            audio.id = quiz_true_or_false.audio_id

            
                WHERE 
                    quiz_master.id = {$master_id} 
            ";

            // echo $sql; die();
        $result = $conn->query($sql);

    }else{
        redirect_to("../index.php");
    }
    // $quiz_category = Quiz_Category::find_by_id($quiz_category_id); 
    // echo "<pre>"; var_dump($quiz_category ); die(); 
    $obj = 'True or False Quiz'; 
    include_layout_template('sub_header_q.php'); 
?>
<!-- bread crumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="fa fa-object-group" aria-hidden="true"></i> True or False Quiz
        </h1>
        <ol class="breadcrumb">
            <li><a href="../index.php">Dashboard</a></li>
            <li class="active"> List</li>
        </ol>        
    </div>
</div>

<!-- main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="tab-pane fade active in" id="service-one">
            <h3 class="lead" ><?php echo ucwords($obj); ?> Table</h3> 
            <?php if($message):?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> True or False Quiz
                </div>
            <?php endif; ?> 
        </div> 
        <div class="row" id="placethishere">
            <?php while ($obj = $result->fetch_object()) { ?>
                <div class="col-md-6 col-md-offset-3 copythisshheet">
                    <hr>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th colspan="2" class="text-left">Question/Background</th> 
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <img src="../../../../uploads/<?php echo $obj->background; ?>" class="img-responsive">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-left">Audio</th> 
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <audio controls> 
                                        <source src="../../../audio/<?php echo $obj->folder; ?>/<?php echo $obj->filename; ?>" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio> 
                                </td>
                            </tr>
                            <tr>
                                <th class="text-left">Correct Answer</th>
                            </tr>
                            <tr> 
                                <td>
                                    <strong><?php echo ucwords($obj->correct_answer) ?></strong>
                                        
                                </td>
                            </tr> 
                            
                        </tbody>
                    </table> 
                </div> 
            <?php } ?>
        </div>
    </div>
</div>
<?php include_layout_template('sub_footer.php'); ?>