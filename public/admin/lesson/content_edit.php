<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Lesson';
	
	//Get all event Audio
	$audios = Audio::find_all();
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	$lesson_dtl = Lesson_dtl::find_by_id($id); 
	
	if(isset($_POST['submit'])) {
		//Get user id to be edit	
		$lesson_dtl = Lesson_dtl::find_by_id($_POST['id']);
		$lesson_dtl->audio_id 	   = $_POST['audio_id'];
		$lesson_dtl->seconds			= $_POST['seconds'];
		$lesson_dtl->last_update 	= date('Y-m-d H:i:s');
		if($lesson_dtl->update()) {
			// Success
			$session->message("{$_POST['name']} was successfully edited.");
            $user = User::find_by_id($_SESSION['user_id']);
                log_action('Update Lesson Content', "{$found_user->full_name()} Updated {$_POST['name']}.");
			redirect_to('content.php?id='.$_POST['lesson_id']);
		} else {
			$session->message("Unable to edit .");
			redirect_to('content.php?id='.$_POST['lesson_id']);
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
			<li class="active"> Edit</li>
		</ol>
	</div>
</div>
<!-- /.row -->
	
	<div class="row">
		<div class="col-md-12">
			  <?php if($message):?>
			  <div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <?php echo output_message($message); ?> 
			  </div>
			  <?php else: ?>
				<div class="alert alert-info" role="alert">
				 <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> All fields are required 
				</div>
			  <?php endif; ?>
			<form class="form-horizontal" action="content_edit.php"  method="POST">
			<input type='hidden' name='id' value='<?php echo $lesson_dtl->id; ?>'/>
            <input type='hidden' name='lesson_id' value='<?php echo $lesson_dtl->lesson_id; ?>'/>
			 <div class="form-group">
				<label for="name" class="col-sm-2 control-label">  Audio</label>
				<div class="col-sm-4">
				  <select class="form-control" id="audio_id" name="audio_id" >
					  <?php foreach($audios as $audio):	?>
					  <option value='<?php echo $audio->id; ?>' <?php echo $lesson_dtl->audio_id == $audio->id ? 'selected':''; ?>  ><?php echo ucwords($audio->filename); ?></option>
					 <?php endforeach; ?>
					</select>
				</div>
				<label for="status" class="col-sm-1 control-label">Display Seconds</label>
				<div class="col-md-4"><input type="number" min="1" max="60" name="seconds" class="form-control" value="<?php echo $lesson_dtl->seconds ?>"></div>
			  </div>
			  
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				   <button type="submit" class="btn btn-success" name="submit" onclick="return confirm('Are you sure you want to save changes?');">Save</button>
				  <button type="button" class="btn btn-danger" onClick='window.location.href = "index.php";' >Cancel </button>
				</div>
			  </div>
			</form>
			<hr />
			
		</div>
	</div>
<?php include_layout_template('sub_footer.php'); ?>
		
