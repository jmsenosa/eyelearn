<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Security
	// if(empty($_GET['id'])) {
	  // $session->message("No <strong> User ID</strong> was provided.");
	  // redirect_to('index.php');
	// }
	
	// Find user by id
	$session_user = User::find_by_id($_SESSION['user_id']); 
	
	// Find all user type
	$parents = User::find_parents();
	
	// Find  User
	$user_id = ($_GET['id'] ? $_GET['id']:0);
	$user = User::find_by_id($user_id); 
	
	// Verification
	// if(!$user) {
		// $session->message("The User could not be located. Please try to select other <strong>User</strong>");
		// redirect_to('index.php');
	// }
	
	
	
	if(isset($_POST['submit'])) {
		//Get user id to be edit	
		$user = User::find_by_id($_POST['id']);
		$user->parent_id 		= $_POST['parent_id'];
		$user->last_update		= date('Y-m-d h:i:s');
		if($user->save()){
			// Success
			log_action('User Update User', "{$session_user->full_name()} Update User [{$_POST['username']}].");
			$session->message("The parent was successfully added.");
			redirect_to('index.php');
		} else {
			$session->message("Unable to update <strong>{$_POST['username']}</strong>.");
			redirect_to('index.php');
		}
	}

?>

<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-user "></i> User <small></small></h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dashboard</a></li>
				<li class="active"> Edit</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->
	<!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
			  <?php if($message):?>
			  <div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <?php echo output_message($message); ?> 
			  </div>
			  <?php else: ?>
				<div class="alert alert-info" role="alert">
				 <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please input right date format.
				</div>
			  <?php endif; ?>
			<form class="form-horizontal" action="add_parents.php"   method="POST">
			   <input type='hidden' name='id' value='<?php echo $user->id; ?>'/>
			  <div class="form-group">
				<label for="parent_id" class="col-sm-1 control-label">Parents</label>
				<div class="col-sm-4">
				   <select class="form-control" id="parent_id" name="parent_id" >
					  <?php foreach($parents as $parent):	?>
					  <option value='<?php echo $parent->id; ?>'  <?php echo  ($parent->id == $user->parent_id ? 'selected="selected"':''); ?> ><?php echo ucwords($parent->full_name()); ?></option>
					 <?php endforeach; ?>
					</select>
				</div>
			  </div>
			  <hr />
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
        <!-- /.row -->
  

<?php include_layout_template('sub_footer.php'); ?>
		
