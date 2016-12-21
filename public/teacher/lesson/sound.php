<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	
	$obj = 'Lesson';
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	// $id = 1;
	$lesson = Lesson::find_by_id($id); 
	
	$max_file_size = 1048576;   // expressed in bytes
	                            //     10240 =  10 KB
	                            //    102400 = 100 KB
	                            //   1048576 =   1 MB
	                            //  10485760 =  10 MB

	if(isset($_POST['submit'])) {
		//Get user id to be edit	
		// id, lesson_id, name, description, filename, active, last_update
		$lesson_dtl = new Lesson_dtl();
		$lesson_dtl->lesson_id 	   = $_POST['lesson_id'];
		$lesson_dtl->name  		   = $_POST['name'];
		$lesson_dtl->description   = $_POST['description'];
		$lesson_dtl->active 	   = 1;
		$lesson_dtl->attach_file($_FILES['file_upload']);
		if($lesson_dtl->save()) {
			// Success
			$session->message("Design successfully Added.");
			redirect_to('index.php');
		} else {
			 $message = join("<br />", $design->errors);
		}
		
	}
	
	
?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-book "></i> <?php echo ucwords($obj); ?> <small></small></h1>
		<ol class="breadcrumb">
			<li><a href="../index.php"><i class="fa fa-dashboard "></i> Dashboard</a></li>
			<li><a href="index.php"><i class="fa fa-book "></i> <?php echo ucwords($obj); ?> List</a></li>
			<li><a href="index.php"><i class="fa fa-book "></i> <?php echo ucwords($obj); ?> Content List</a></li>
			<li class="active"><i class="fa fa-book "></i> <?php echo ucwords($obj); ?> Content Create</li>
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
			<form class="form-horizontal" action="dtl.php" enctype="multipart/form-data" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
			<input type='hidden' name='lesson_id' value='<?php echo $_GET['id']; ?>'/>
			  <div class="form-group">
				<label for="name" class="col-sm-2 control-label">  Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="name" name="name" value='' />
				</div>
				<label for="description" class="col-sm-1 control-label">  Description</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="description" name="description" value='' />
				</div>
			  </div>
			 <div class="form-group">
				
				<label for="file_upload" class="col-sm-2 control-label"> </label>
				<div class="col-sm-4">
				 <input type="file" name="file_upload" />
				</div>
				<label for="status" class="col-sm-1 control-label">Status</label>
				<div class="col-sm-4">
				   Active <input type="radio" name="active" id="active" value=1  checked  />
				 Inactive <input type="radio" name="active" id="active" value=0   />
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				   <button type="submit" class="btn btn-success" name="submit">Add</button>
				</div>
			  </div>
			</form>
			<hr />
			
		</div>
	</div>
<?php include_layout_template('sub_footer.php'); ?>
		
