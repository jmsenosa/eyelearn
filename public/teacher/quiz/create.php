<?php
    // Initialize Page
    require_once('../../../includes/initialize.php');
    
    // Check if Logged in. If not the page will go to Signin page
    if (!$session->is_logged_in()) { redirect_to("signin.php"); }
    
    //Get all event Audio
    
    
    $obj = 'Quiz';
    
    // Find  User
    $id = $_GET['id'];
    $lessons = Lesson_dtl::find_by_lesson($id);
    $allLessons = Lesson_dtl::find_all();

    if(isset($_POST['submit'])) {

        $quiz_master = new Quiz_Master();
        $quiz_master->lesson_id = $id;
        $quiz_master->created_by = $_SESSION["user_id"];

        $quiz_master->save(); 

        foreach ($_POST['description'] as $key => $value) 
        {

            $quiz = new Quiz();

            $quiz->description = $value;
            $quiz->lesson_id   = $_POST['lesson_id'];
            $quiz->choice1     = $_POST['choice1'][$key];
            $quiz->choice2     = $_POST['choice2'][$key];
            $quiz->choice3     = $_POST['choice3'][$key];
            $quiz->choice4     = $_POST['choice4'][$key];
            $quiz->type        = $_POST['type'];
            $quiz->answer      = $_POST['answer'][$key];
            $quiz->quiz_master_id = $quiz_master->id;
 
            $fileext = pathinfo($_FILES["audio"]["name"][$key], PATHINFO_EXTENSION);
            $new_filename = md5($_FILES["audio"]["name"][$key].rand(1000,9999999).date("Y-m-d H:i:s")).".".$fileext;

            $file_array = array();
            $file_array["name"] = $new_filename;
            $file_array["type"] = $_FILES["audio"]["type"][$key];
            $file_array["tmp_name"] = $_FILES["audio"]["tmp_name"][$key];
            $file_array["error"] = $_FILES["audio"]["error"][$key];
            $file_array["size"] = $_FILES["audio"]["size"][$key];

            $quiz->attach_file($file_array); 
            // dd($quiz->save());
            if($quiz->save()) {
                $message = "quiz successfully saved!";
            } else {
                $message = join("<br />", $quiz->errors);
            }  

        }   
    }    
    
?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> <i class="fa fa-book "></i>  <?php echo ucwords($obj); ?> <small></small></h1>
        <ol class="breadcrumb">
            <li><a href="../index.php"> Dashboard</a></li>
            <li><a href="index.php"> List</a></li>
            <li class="active"> Add</li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <?php if($message):?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>                               </button>
            <strong><i class="fa fa-success"></i> Success!</strong>
            <?php echo output_message($message); ?>
        </div>
        <?php else: ?>
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span > fields are required
        </div>
        <?php endif; ?>
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#multiple" aria-controls="home" role="tab" data-toggle="tab">Piliin ang Salita</a></li>
                <li role="presentation"><a href="#finddifference" aria-controls="profile" role="tab" data-toggle="tab">Piliin ang Naiiba</a></li>
            </ul>
            <br>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="multiple">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                        <input type='hidden' name='lesson_id' value='<?php echo $id; ?>'/>
                        <input type='hidden' name='type' value='salita'/>
                        <div class="question_group">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">  Description</label>
                                <div class="col-sm-4">
                                    <input type="text" name="description[]" class="form-control">
                                </div>
                            </div>                            
                            <div class="form-group">
                                
                                <label for="file_upload" class="col-sm-2 control-label">Audio</label>
                                <div class="col-sm-4">
                                    <input type="file" name="audio[]" accept="audio/*" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="choice1" class="col-sm-2 control-label">Choice 1</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control choice_image" id="choice1" name="choice1[]" >
                                        <option disabled selected></option>
                                        <?php foreach($lessons as $lesson): ?>
                                        <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                                <img src="" width="40" height="40" id="choice1img">
                            </div>
                            
                            <div class="form-group">
                                <label for="choice1" class="col-sm-2 control-label">Choice 2</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control choice_image" id="choice2" name="choice2[]" >
                                        <option disabled selected></option>
                                        <?php foreach($lessons as $lesson): ?>
                                        <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                                <img src="" width="40" height="40" id="choice2img">
                            </div>
                            
                            <div class="form-group">
                                <label for="choice1" class="col-sm-2 control-label">Choice 3</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control choice_image" id="choice3" name="choice3[]" >
                                        <option disabled selected></option>
                                        <?php foreach($lessons as $lesson): ?>
                                        <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                                <img src="" width="40" height="40" id="choice3img">
                            </div>
                            
                            <div class="form-group">
                                <label for="choice1" class="col-sm-2 control-label">Choice 4</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control choice_image" id="choice4" name="choice4[]" >
                                        <option disabled selected></option>
                                        <?php foreach($lessons as $lesson): ?>
                                        <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                                <img src="" width="40" height="40" id="choice4img">
                            </div>
                            
                            <div class="form-group">
                                <label for="answer" class="col-sm-2 control-label">Answer</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control" id="answer" name="answer[]" >
                                        <option value="1">Choice 1</option>
                                        <option value="2">Choice 2</option>
                                        <option value="3">Choice 3</option>
                                        <option value="4">Choice 4</option>
                                    </select> 
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-info" id="add_item" style="margin-left: -15px;" name="add">ADD ITEM</button>
                                </div>
                            </div> 
                            <hr>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-success" name="submit">SAVE</button>
                            </div>
                        </div>
                    </form>
                </div> 
                <div role="tabpanel" class="tab-pane" id="finddifference">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                        <input type='hidden' name='lesson_id' value='<?php echo $id; ?>'/>
                        <input type='hidden' name='type' value='naiiba'/>
                        <div class="question_group">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">  Description</label>
                                <div class="col-sm-4">
                                    <input type="text" name="description[]" class="form-control">
                                </div>
                            </div>                            
                            <div class="form-group">
                                
                                <label for="file_upload" class="col-sm-2 control-label">Audio</label>
                                <div class="col-sm-4">
                                    <input type="file" name="audio[]" accept="audio/*" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="choice1" class="col-sm-2 control-label">Choice 1</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control choice_image" id="choice1" name="choice1[]" >
                                        <option disabled selected></option>
                                        <?php foreach($lessons as $lesson): ?>
                                        <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                                <img src="" width="40" height="40" id="choice1img">
                            </div>
                            
                            <div class="form-group">
                                <label for="choice1" class="col-sm-2 control-label">Choice 2</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control choice_image" id="choice2" name="choice2[]" >
                                        <option disabled selected></option>
                                        <?php foreach($lessons as $lesson): ?>
                                        <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                                <img src="" width="40" height="40" id="choice2img">
                            </div>
                            
                            <div class="form-group">
                                <label for="choice1" class="col-sm-2 control-label">Choice 3</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control choice_image" id="choice3" name="choice3[]" >
                                        <option disabled selected></option>
                                        <?php foreach($lessons as $lesson): ?>
                                        <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                                <img src="" width="40" height="40" id="choice3img">
                            </div>
                            
                            <div class="form-group">
                                <label for="choice1" class="col-sm-2 control-label">Choice 4</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control choice_image" id="choice4" name="choice4[]" >
                                        <option disabled selected></option>
                                        <?php foreach($lessons as $lesson): ?>
                                        <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                                <img src="" width="40" height="40" id="choice4img">
                            </div>
                            
                            <div class="form-group">
                                <label for="answer" class="col-sm-2 control-label">Answer</label>
                                <div class="col-sm-4">
                                    
                                    <select class="form-control" id="answer" name="answer[]" >
                                        <option value="1">Choice 1</option>
                                        <option value="2">Choice 2</option>
                                        <option value="3">Choice 3</option>
                                        <option value="4">Choice 4</option>
                                    </select> 
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-info" id="add_item" style="margin-left: -15px;" name="add">ADD ITEM</button>
                                </div>
                            </div> 
                            <hr>
                        </div> 
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" class="btn btn-success" name="submit">Add</button>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php include_layout_template('sub_footer.php'); ?>
<script>
/*$('#choice1').change(function(){
var img = $('#choice1 option:selected').data('url');
$('#choice1img').attr('src', '../../images/'+img);
});
*/

$(document).on("change",".choice_image", function(){
    var img = $(this).find("option:selected").data("url");
    $(this).closest('.form-group').find("img").attr('src', '../../images/'+img);
});

$(document).on("click","#add_item",function(){
    var parent = $(this).closest('.question_group');
    var clone = parent.clone();
    clone.find('img').attr("src","");
    clone.find('select').val("");
    clone.find('input[type="text"]').val("");
    // parent.next(clone);
    $(clone).insertAfter(parent);
    console.log(clone);
    $(this).remove();
});

</script>