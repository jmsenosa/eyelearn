<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }

	//Get all event Audio
	
		
	$obj = 'Content';
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	// $id = 1;
	$lesson = Lesson::find_by_id($id); 
	$audios = Audio::find_by_lesson($lesson->name);

	if(isset($_POST['submit'])) {
		
		
			$lesson_dtl = new Lesson_dtl();
			$lesson_dtl->lesson_id 	   = $_POST['lesson_id'];
			$lesson_dtl->audio_id 	   = $_POST['audio_id'];
			$lesson_dtl->seconds   = $_POST['seconds'];
			$lesson_dtl->attach_file($_FILES['file_upload']);
			$lesson_dtl->last_update 	= date('Y-m-d H:i:s');
			if($lesson_dtl->save()) {
				// Success
				$session->message("The {$_POST['name']} was successfully Added.");
                $user = User::find_by_id($_SESSION['user_id']);
                log_action('Add Lesson Content', "{$user->full_name()} Added {$_POST['name']}.");
				redirect_to('content.php?id='.$_POST['lesson_id']);
			} else {
				 $message = join("<br />", $lesson_dtl->errors);
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
				<li><a href="content.php?id=<?php echo $id; ?>"> Content</a></li>
				<li class="active"> Add</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->
	
	<div class="row">
		<div class="col-md-12">
			<?php if($message):?>
				 <div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong><i class="fa fa-warning"></i> Warning!</strong> <?php echo output_message($message); ?>
				</div>
			  <?php else: ?>
			   <div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span > All fields are required
				</div>
			  <?php endif; ?>
			<form class="form-horizontal" action="content_add.php?id=<?php echo $id; ?>" enctype="multipart/form-data" method="POST">
			<input type='hidden' name='lesson_id' value='<?php echo $id; ?>'/>
			 <div class="form-group">
				<label for="name" class="col-sm-2 control-label">  Audio</label>
				<div class="col-sm-4">
				  <select class="form-control" id="audio_id" name="audio_id" >
					  <?php foreach($audios as $audio):	?>
					  <option value='<?php echo $audio->id; ?>'  ><?php echo ucwords($audio->filename); ?></option>
					 <?php endforeach; ?>
					</select>
				</div>
				<label for="status" class="col-sm-1 control-label">Display Seconds</label>
				<div class="col-md-4"><input type="number" min="1" max="60" name="seconds" class="form-control"></div>
				
			  </div>
			   <div class="form-group">
				
				<label for="file_upload" class="col-sm-2 control-label"> </label>
				<div class="col-sm-4">
				 <input type="file" name="file_upload" accept="image/*" />
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
<?php include_layout_template('sub_footer.php'); ?>
		
