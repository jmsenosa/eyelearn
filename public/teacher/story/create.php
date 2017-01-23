<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Content';
	
	$max_file_size = 10485760000;   // expressed in bytes
	                            //     10240 =  10 KB
	                            //    102400 = 100 KB
	                            //   1048576 =   1 MB
	                            //  10485760 =  10 MB

	if(isset($_POST['submit'])) {
		
		if($_POST['name']=='' || $_POST['description']==''){
			$session->message("Please input fields ");
			redirect_to('create.php');
		}else{
			$story = new Story();
			$story->user_id 	   = $_SESSION['user_id'];
			$story->name  		   = $_POST['name'];
			$story->description   = $_POST['description'];
			$story->active 	   = $_POST['active'];
			$story->attach_file($_FILES['file_upload']);
			$story->last_update 	= date('Y-m-d H:i:s');
			if($story->save()) {
				// Success
				$session->message("The {$_POST['name']} was successfully Added.");
                $user = User::find_by_id($_SESSION['user_id']);
                log_action('Add Story', "{$user->full_name()} Added {$_POST['name']}.");
				redirect_to('index.php');
			} else {
				 $message = join("<br />", $story->errors);
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
			<form class="form-horizontal" action="create.php" enctype="multipart/form-data" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
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
				   Active <input type="radio" name="active" id="active" value=1    />
				 Inactive <input type="radio" name="active" id="active" value=0  checked />
				</div>
			  </div>
			 
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				   <button type="submit" class="btn btn-success" id="add_btn" name="submit">Add</button>
				</div>
			  </div>
			</form>

			
		</div>
	</div>
<?php include_layout_template('sub_footer.php'); ?>

<script>
$('#add_btn').on('click',function(){
    $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Uploading');
})

</script>
		
