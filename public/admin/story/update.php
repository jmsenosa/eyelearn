<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	
	$obj = 'Story ';
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	$story = Story::find_by_id($id); 
	
	if(isset($_POST['submit'])) {
		//Get user id to be edit	
		$story = Story::find_by_id($_POST['id']);
		$story->name			= $_POST['name'];
		$story->description	= $_POST['description'];
		$story->active 		= $_POST['active'];
		if($story->update()) {
			// Success
			$session->message("{$_POST['name']} successfully edited.");
			redirect_to('index.php');
		} else {
			$session->message("{$_POST['name']} successfully edited.");
			redirect_to('index.php');
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
			<form class="form-horizontal" action="update.php"  method="POST">
			<input type='hidden' name='id' value='<?php echo $story->id; ?>'/>
			  <div class="form-group">
				<label for="name" class="col-sm-2 control-label">  Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="name" name="name" value='<?php echo ucwords($story->name); ?>' />
				</div>
				<label for="status" class="col-sm-1 control-label">Status</label>
				<div class="col-sm-4">
				   Active <input type="radio" name="active" id="active" value=1 <?php echo $story->active==1 ? "checked='checked'":"" ?>   />
				 Inactive <input type="radio" name="active" id="active" value=0 <?php echo $story->active==0 ? "checked='checked'":"" ?>  />
				</div>
			  </div>
			 <div class="form-group">
				<label for="name" class="col-sm-2 control-label">  Description</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="description" name="description" value='<?php echo ucwords($story->description); ?>'  />
				</div>
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
		
