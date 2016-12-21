<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'choice';
	
	// Security
	if(empty($_GET['id'])) {
	  $session->message("No <strong> {$obj} ID</strong> was provided.");
	  redirect_to('index.php');
	}
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
	// Find  Choice
	$id = ($_GET['id'] ? $_GET['id']:0);
	$choice = Choice::find_by_id($id); 
	
	// Verification
	if(!$choice) {
		$session->message("The User could not be located. Please try to select other <strong>User</strong>");
		redirect_to('index.php');
	}
	
	if(isset($_POST['submit'])) {
		//Get user id to be edit	
		$choice = Choice::find_by_id($_POST['id']);
		$choice->name 			= $_POST['name'];
		$choice->is_correct 	= $_POST['is_correct'];
		$choice->active 		= $_POST['active'];
		$choice->last_update	= date('Y-m-d h:i:s');
		if($choice->save()){
			// Success
			log_action('User Edit Quiz', "{$user->full_name()} Edit Quiz [{$_POST['name']}].");
			$session->message("The <strong>{$_POST['name']}</strong> was successfully <strong>Edited</strong>.");
			redirect_to('index.php?id='.$_POST['question_id']);
		} else {
			$session->message("Unable to Edit <strong>{$_POST['username']}</strong>.");
			redirect_to('index.php');
		}
	}

?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-pencil "></i> <?php echo ucwords($obj); ?> Manager <small class='pull-right' style='font-size: 14px;'  >Welcome to <strong><?php $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?></strong> <a href='#'><?php echo ucwords($user->full_name()); ?></a>! </small> </h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dashoard</a></li>
				<li><a href="index.php?id=<?php echo $choice->question_id; ?>">List</a></li>
				<li class="active">Edit</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->
	
	<!-- Main -->
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<p class="lead" ><?php echo ucwords($obj); ?> Form</p> 
			<?php if($message):?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong><i class="fa fa-warning"></i> Warning!</strong> <?php echo output_message($message); ?>
			</div>
			<?php else: ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  Please make sure <strong><?php echo ucwords($obj); ?> name</strong> is <strong>Unique</strong> 
			</div>
			<?php endif; ?>
			  
			<div class='col-md-6 col-md-offset-3'> 
				<form action="update.php?id=<?php echo @$choice->id; ?>"  method="POST">
				  <input type="hidden" name="id" value='<?php echo @$choice->id; ?>' >
				  <input type="hidden" name="question_id" value='<?php echo @$choice->question_id; ?>' >
				  <div class="form-group">
					<label for="name"><span class='text-danger' >&#42;</span> Name</label>
					<input type="text" class="form-control" name="name" id="name" value='<?php echo @$choice->name; ?>' >
				  </div>
				    <div class="form-group">
					<label for="is_correct">Correct</label>
					 <input type="radio" name="is_correct" id="is_correct" value=1  <?php echo $choice->is_correct==1 ? "checked='checked'":"" ?>   /> Yes
					 <input type="radio" name="is_correct" id="is_correct" value=0  <?php echo $choice->is_correct==0 ? "checked='checked'":"" ?> /> No
				  </div>
				   <div class="form-group">
					<label for="description"> Status</label>
					 <input type="radio" name="active" id="active" value=1  <?php echo $choice->active==1 ? "checked='checked'":"" ?>   /> Active
					 <input type="radio" name="active" id="active" value=0  <?php echo $choice->active==0 ? "checked='checked'":"" ?> /> In Active
				  </div>
				   <button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Are you sure you want to save changes?');">Save</button>
				   <button type="button" class="btn btn-danger" onClick='window.location.href = "index.php?id=<?php echo $choice->question_id; ?>";' >Cancel </button>
				  <div class="checkbox"><br /><br />
					 <p class="help-block">  <span class='text-danger' >&#42;</span> Required Fields</p>
				  </div>	
				</form>
			</div>
			
		</div>
	</div>
<?php include_layout_template('sub_footer.php'); ?>
		
