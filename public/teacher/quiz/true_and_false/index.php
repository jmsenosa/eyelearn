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

        $dbHost = DB_SERVER;
        $dbUsername = DB_USER;
        $dbPassword = DB_PASS;
        $dbName = DB_NAME;

        //connect with the database
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        $insertSQL = "INSERT 
                        INTO 
                            quiz (lesson_id, quiz_category_id, description, quiz_master_id, answer,type,choice1,choice2,choice3,choice4,audio)
                        VALUES (".$data['id'].",".$data['quiz_cat'].",'".$post['title']."',".$quiz_master->id.", '','','','','','','')";
        // print_r($insertSQL); die();
        // // dd(); 
        $conn->query($insertSQL);
        $quiz_id = $conn->insert_id; 
        $uploadOk = 1;

        $base_url =  "/uploads/";

        $target_dir = SITE_ROOT .DS. "uploads/"; 
        $quizImages = [];

        foreach ($_FILES as $key => $value) {  

            if ($key != "background") { 

                $filename = md5(basename($key).date("Y-m-dH:i:s"));
      
                $target_file = $target_dir . md5(basename($key).date("Y-m-dH:i:s"));
                $imageFileType = pathinfo($value['name'],PATHINFO_EXTENSION); 

                $file = $target_file.".".$imageFileType;
                move_uploaded_file($value['tmp_name'], $file);
                $quizImages[$key] = $filename.".".$imageFileType;
            }
        }


        $display_text_true = $post['truth_text'];
        $display_text_false = $post['false_text'];

        foreach ($post["audio_id"] as $key => $value) {
            $quiztrueorfalse = new Quiz_True_Or_False();

            $newfile = array();

            $newfile["name"]     = $_FILES['background']["name"][$key];
            $newfile["type"]     = $_FILES['background']["type"][$key];
            $newfile["tmp_name"] = $_FILES['background']["tmp_name"][$key];
            $newfile["error"]    = $_FILES['background']["error"][$key];
            $newfile["size"]     = $_FILES['background']["size"][$key];
 
            $filename = md5(basename($newfile["name"]).date("Y-m-dH:i:s"));
  
            $target_file = $target_dir . md5(basename($newfile["name"]).date("Y-m-dH:i:s"));
            $imageFileType = pathinfo($newfile["name"],PATHINFO_EXTENSION); 

            $file = $target_file.".".$imageFileType;
            move_uploaded_file($newfile['tmp_name'], $file);


            $quiztrueorfalse->quiz_id = $quiz_id;  
            $quiztrueorfalse->audio_id = $value;
            $quiztrueorfalse->question = " ";
            $quiztrueorfalse->truth_text = $display_text_true;
            $quiztrueorfalse->false_text = $display_text_false;
            $quiztrueorfalse->correct_answer = $post["correct_answer"][$key]; 
            $quiztrueorfalse->background = $filename.".".$imageFileType;

            $quiztrueorfalse->true_image = $quizImages['true_image'];
            $quiztrueorfalse->false_image = $quizImages['false_image']; 
            $quiztrueorfalse->create(); 

        }   


        redirect_to('view.php?master_id='.$quiz_master->id);
        $message = "Quizes created!";
    }


    // $quiz_category = Quiz_Category::find_by_id($quiz_category_id); 
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
                <p><?php //echo $quiz_category->description; ?></p>
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
                <div class="row" id="placethishere">
                    <div class="col-md-6 col-md-offset-3 copythisshheet">
                        <hr>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th colspan="2" class="text-left">Question/Background</th> 
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="file" class="form-control" name="background[]" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-left">Audio</th> 
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select class="form-control" name="audio_id[]" required="required">
                                            <?php $lessonDta = Lesson::find_by_id($lesson_id); ?> 
                                            <?php $audios = Audio::find_by_lesson_name($lessonDta->name) ?>
                                            <option value="">Audios</option>
                                            <?php foreach ($audios as $audio): ?>
                                                <option value="<?php echo $audio->id; ?>"><?php echo $audio->filename; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left">Correct Answer</th>
                                </tr>
                                <tr> 
                                    <td> 
                                        <select required name="correct_answer[]" class="form-control" >
                                            <option></option>
                                            <option value="true">True</option>
                                            <option value="false">False</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="text-right">
                                            <button class="btn btn-warning duplicate-btn">Add</button> 
                                        </div>
                                        <hr>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table> 
                    </div> 
                </div>
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
    // $("div#myId").dropzone({ url: "/file/post" });
    $(document).on("click",".duplicate-btn", function(){
        var parent = $(this).closest(".copythisshheet");
        var clone = parent.clone();
        $(clone).find(":input").val("");
        $(clone).insertAfter(parent);
        $(this).removeClass("btn-warning").addClass("btn-danger");
        $(this).removeClass("duplicate-btn").addClass("remove-btn");
        $(this).html("Remove");
        return false;
    });

    $(document).on("click",".remove-btn", function(){
        $(this).closest(".copythisshheet").remove();
        return false;
    });
</script>
<?php include_layout_template('sub_footer.php'); ?>