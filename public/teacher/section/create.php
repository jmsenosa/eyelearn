<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Section';

	
	if(isset($_POST['submit'])) {
		
			$section = new Section();
			$section->section			= $_POST['name'];
            $section->created_by    = $_SESSION['user_id'];
			if($section->save()) {
				// Success
				$session->message("The {$_POST['name']} was successfully Added.");
                $user = User::find_by_id($_SESSION['user_id']);
                log_action('Add Section', "{$user->full_name()} Added new Section {$_POST['name']}.");
				redirect_to('index.php');
			} else {
				$message = "Duplicate entry or invalid value, Please try again!";
				
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
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span > Please make sure Section Name is <strong>Unique</strong> 
				</div>
			  <?php endif; ?>
			<form class="form-horizontal" enctype="multipart/form-data"  method="POST">
			  <div class="form-group">
				<label for="name" class="col-sm-2 control-label"> <?php echo ucwords($obj); ?> Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo ucwords($obj); ?> Name" />
				</div>
	
			  </div>
			 
			  
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				  <button type="submit" class="btn btn-success" name="submit">Add <?php echo ucwords($obj); ?></button>
				</div>
			  </div>
			</form>
			<hr />
			
		</div>
	</div>

<?php include_layout_template('sub_footer.php'); ?>