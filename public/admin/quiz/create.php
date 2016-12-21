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
		
		
			$quiz = new Quiz();
			$quiz->description 	   = $_POST['description'];
            $quiz->lesson_id 	   = $_POST['lesson_id'];
			$quiz->choice1 	   = $_POST['choice1'];
            $quiz->choice2 	   = $_POST['choice2'];
            $quiz->choice3 	   = $_POST['choice3'];
            $quiz->choice4 	   = $_POST['choice4'];
            $quiz->type 	   = $_POST['type'];
            $quiz->answer 	   = $_POST['answer'];
			$quiz->attach_file($_FILES['audio']);
			if($quiz->save()) {
				// Success
				$session->message("The {$_POST['description']} was successfully Added.");
				redirect_to('folder.php?id='.$_POST['lesson_id']);
			} else {
				 $message = join("<br />", $quiz->errors);
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
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>                               </button>
                        <strong><i class="fa fa-warning"></i> Warning!</strong>
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
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Piliin ang Salita</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Piliin ang Naiiba</a></li>
  </ul>
    <br>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
      			<form class="form-horizontal" enctype="multipart/form-data" method="POST">
			<input type='hidden' name='lesson_id' value='<?php echo $id; ?>'/>
               <input type='hidden' name='type' value='salita'/> 
                <div class="form-group">
				<label for="name" class="col-sm-2 control-label">  Description</label>
				<div class="col-sm-4">
				  <input type="text" name="description" class="form-control">
				</div>
				
			  </div>
                
                <div class="form-group">
				
				<label for="file_upload" class="col-sm-2 control-label">Audio</label>
				<div class="col-sm-4">
				 <input type="file" name="audio" accept="audio/*" />
				</div>
			  </div>
                
                <div class="form-group">
                    <label for="choice1" class="col-sm-2 control-label">Choice 1</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="choice1" name="choice1" >
                        <option disabled selected></option>
					  <?php foreach($lessons as $lesson):	?>
					  <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
					 <?php endforeach; ?>
					</select>
                    
                </div>
                    <img src="" width="40" height="40" id="choice1img">
                </div>
                
                <div class="form-group">
                    <label for="choice1" class="col-sm-2 control-label">Choice 2</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="choice2" name="choice2" >
                        <option disabled selected></option>
					  <?php foreach($lessons as $lesson):	?>
					  <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
					 <?php endforeach; ?>
					</select>
                    
                </div>
                    <img src="" width="40" height="40" id="choice2img">
                </div>
                
                <div class="form-group">
                    <label for="choice1" class="col-sm-2 control-label">Choice 3</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="choice3" name="choice3" >
                        <option disabled selected></option>
					  <?php foreach($lessons as $lesson):	?>
					  <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
					 <?php endforeach; ?>
					</select>
                    
                </div>
                    <img src="" width="40" height="40" id="choice3img">
                </div>
                
                <div class="form-group">
                    <label for="choice1" class="col-sm-2 control-label">Choice 4</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="choice4" name="choice4" >
                        <option disabled selected></option>
					  <?php foreach($lessons as $lesson):	?>
					  <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
					 <?php endforeach; ?>
					</select>
                    
                </div>
                    <img src="" width="40" height="40" id="choice4img">
                </div>
                
                <div class="form-group">
                    <label for="answer" class="col-sm-2 control-label">Answer</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="answer" name="answer" >
                        <option value="1">Choice 1</option>
                        <option value="2">Choice 2</option>
                        <option value="3">Choice 3</option>
                        <option value="4">Choice 4</option>
					</select>
                    
                </div>
                </div>

                
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				   <button type="submit" class="btn btn-success" name="submit">Add</button>
				</div>
			  </div>
			</form>
      </div>
      
      
      
      
      
      
      
      
      
      
      
      
    <div role="tabpanel" class="tab-pane" id="profile">
            			<form class="form-horizontal" enctype="multipart/form-data" method="POST">
			<input type='hidden' name='lesson_id' value='<?php echo $id; ?>'/>
               <input type='hidden' name='type' value='naiiba'/> 
                <div class="form-group">
				<label for="name" class="col-sm-2 control-label">  Description</label>
				<div class="col-sm-4">
				  <input type="text" name="description" class="form-control">
				</div>
				
			  </div>
                
                <div class="form-group">
				
				<label for="file_upload" class="col-sm-2 control-label">Audio</label>
				<div class="col-sm-4">
				 <input type="file" name="audio" accept="audio/*" />
				</div>
			  </div>
                
                <div class="form-group">
                    <label for="choice1" class="col-sm-2 control-label">Choice 1</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="choice11" name="choice1" >
                        <option disabled selected></option>
					  <?php foreach($allLessons as $lesson):	?>
					  <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
					 <?php endforeach; ?>
					</select>
                    
                </div>
                    <img src="" width="40" height="40" id="choice11img">
                </div>
                
                <div class="form-group">
                    <label for="choice1" class="col-sm-2 control-label">Choice 2</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="choice22" name="choice2" >
                        <option disabled selected></option>
					  <?php foreach($allLessons as $lesson):	?>
					  <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
					 <?php endforeach; ?>
					</select>
                    
                </div>
                    <img src="" width="40" height="40" id="choice22img">
                </div>
                
                <div class="form-group">
                    <label for="choice1" class="col-sm-2 control-label">Choice 3</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="choice33" name="choice3" >
                        <option disabled selected></option>
					  <?php foreach($allLessons as $lesson):	?>
					  <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
					 <?php endforeach; ?>
					</select>
                    
                </div>
                    <img src="" width="40" height="40" id="choice33img">
                </div>
                
                <div class="form-group">
                    <label for="choice1" class="col-sm-2 control-label">Choice 4</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="choice44" name="choice4" >
                        <option disabled selected></option>
					  <?php foreach($allLessons as $lesson):	?>
					  <option value='<?php echo $lesson->filename; ?>' data-url='<?php echo $lesson->filename ?>'><?php echo $lesson->filename ?>                               </option>
					 <?php endforeach; ?>
					</select>
                    
                </div>
                    <img src="" width="40" height="40" id="choice44img">
                </div>
                
                <div class="form-group">
                    <label for="answer" class="col-sm-2 control-label">Answer</label>
                <div class="col-sm-4">
                
				    <select class="form-control" id="answer" name="answer" >
                        <option value="1">Choice 1</option>
                        <option value="2">Choice 2</option>
                        <option value="3">Choice 3</option>
                        <option value="4">Choice 4</option>
					</select>
                    
                </div>
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
$('#choice1').change(function(){
   var img = $('#choice1 option:selected').data('url');
    $('#choice1img').attr('src', '../../images/'+img);
});
    
    $('#choice2').change(function(){
   var img = $('#choice2 option:selected').data('url');
    $('#choice2img').attr('src', '../../images/'+img);
});
    
    $('#choice3').change(function(){
   var img = $('#choice3 option:selected').data('url');
    $('#choice3img').attr('src', '../../images/'+img);
});
    
    $('#choice4').change(function(){
   var img = $('#choice4 option:selected').data('url');
    $('#choice4img').attr('src', '../../images/'+img);
});
    
    $('#choice11').change(function(){
   var img = $('#choice11 option:selected').data('url');
    $('#choice11img').attr('src', '../../images/'+img);
});
    
    $('#choice22').change(function(){
   var img = $('#choice22 option:selected').data('url');
    $('#choice22img').attr('src', '../../images/'+img);
});
    
    $('#choice33').change(function(){
   var img = $('#choice33 option:selected').data('url');
    $('#choice33img').attr('src', '../../images/'+img);
});
    
    $('#choice44').change(function(){
   var img = $('#choice44 option:selected').data('url');
    $('#choice44img').attr('src', '../../images/'+img);
});
</script>