<?php 
    require_once('../../../../includes/initialize.php'); 
    if (!$session->is_logged_in()) { redirect_to("signin.php"); } 

    $data = $_GET;  
    $quiz_category_id = (isset($data["quiz_cat"])) ? $data["quiz_cat"]: 3;

    if ( isset($data["id"]) && $data["id"] != "") {
        $lesson_id = $data["id"];
    }else{
        redirect_to("../index.php");
    }


    if(isset($_POST['submit'])){
        $post = $_POST;

        $quiz_master = new Quiz_Master();
        $quiz_master->lesson_id = $data["id"];
        $quiz_master->created_by = $_SESSION["user_id"];
        $quiz_master->save();  

        $quiz = new Quiz(); 

        $quiz->lesson_id = $data['id'];
        $quiz->quiz_category_id = $data['quiz_cat'];
        $quiz->description = $post['title'];
        $quiz->quiz_master_id = $quiz_master->id;
        $insert = $quiz->create();        

        $uploadOk = 1;
  
        $base_url =  "/uploads/";

        $target_dir = SITE_ROOT .DS. "uploads/"; 
        $quizImages = [];

        foreach ($_FILES as $key => $value) { 

            $filename = md5(basename($key).date("Y-m-dH:i:s"));
  
            $target_file = $target_dir . md5(basename($key).date("Y-m-dH:i:s"));
            $imageFileType = pathinfo($value['name'],PATHINFO_EXTENSION); 

            $file = $target_file.".".$imageFileType;
            move_uploaded_file($value['tmp_name'], $file);
            $quizImages[$key] = $filename.".".$imageFileType;
        }

        $display_text_true = $post['truth_text'];
        $display_text_false = $post['false_text'];

        foreach ($post['question'] as $key => $value) {
            $quiztrueorfalse = new Quiz_True_Or_False();
            // echo "<pre>"; print_r(json_encode($quiz)); die();
            $quiztrueorfalse->quiz_id = $quiz->id; 
            $quiztrueorfalse->question = $value;
            $quiztrueorfalse->truth_text = $display_text_true;
            $quiztrueorfalse->false_text = $display_text_false;
            $quiztrueorfalse->correct_answer = $post['correct_answer'][$key];
            $quiztrueorfalse->background = $quizImages['background'];
            $quiztrueorfalse->true_image = $quizImages['true_image'];
            $quiztrueorfalse->false_image = $quizImages['false_image'];
            
            $quiztrueorfalse->create(); 
            
        }

        

        /*  */
    }


    $quiz_category = Quiz_Category::find_by_id($quiz_category_id); 
    // echo "<pre>"; var_dump($quiz_category ); die(); 
    $obj = 'True or False Quiz'; 
    // include page header 
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
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Create True or False Quiz
                </div>
            <?php endif; ?> 
        </div>
        <div class="table-responsive">
            <div class="well">
                <p><?php echo $quiz_category->description; ?></p>
            </div>
            <form method="post"  enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
                <table class="table">
                    <tbody>
                        <tr>
                            <th colspan="2" class="text-left">Title</th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="title" value="" required="" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-left">Questions background</th>
                        </tr>
                        <tr>
                            <td><input name="background" type="file" multiple class="form-control" /></td>
                        </tr>
                        <tr>                            
                            <th colspan="2" class="text-left">Truth Selection</th>
                        </tr>
                        <tr>
                            <td>                                
                                <p>Display Text</p>
                                <input type="text" required name="truth_text" class="form-control">
                            </td>
                            <td>
                                <p>Background/Image</p>
                                <input type="file" required name="true_image" accept="image/*" class="form-control">
                            </td>
                        </tr>                        
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-left">False Selection</th>
                        </tr>
                        <tr>
                            <td>                                
                                <p>Display Text</p>
                                <input type="text" required name="false_text" class="form-control">
                            </td>
                            <td>
                                <p>Background/Image</p>
                                <input type="file" required name="false_image" accept="image/*" class="form-control">
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
                <hr>
                <h3>Quiz Content</h3>
                <?php for($ctr = 1; $ctr<=10; $ctr++){?>
                <div class="col-md-6 col-md-offset-3">
                    <hr>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th colspan="2" class="text-left"><h4>Question #<?php echo $ctr; ?></h4></th> 
                            </tr>
                            <tr>
                                <td colspan="2"><textarea class="form-control" required name="question[<?php echo $ctr; ?>]"></textarea></td>
                            </tr>
                            <tr>
                                <th class="text-left">Correct Answer</th>
                            </tr>
                            <tr> 
                                <td> 
                                    <select required name="correct_answer[<?php echo $ctr; ?>]" class="form-control">
                                        <option></option>
                                        <option value="true">True</option>
                                        <option value="false">False</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table> 
                </div>
                <?php } // end this ffor ?>
                <table class="table">
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-center">
                                <input type="submit" name="submit" value="submit" class="btn btn-primary">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
</div> 
<script type="text/javascript">
    $("div#myId").dropzone({ url: "/file/post" });
</script>
<?php include_layout_template('sub_footer.php'); ?>