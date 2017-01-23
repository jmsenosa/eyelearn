<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
		
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
	$obj = 'Quiz';
	
	// Find all the Quiz
	$quizes = Quiz::find_all();
	
	if(isset($_POST['submit'])) {
		
		$name = trim($_POST['name']);
		$check = Quiz::check_name($name);
	
		if($_POST['name']=='' && $_POST['description']=='' ){
			$session->message("Please input data on <span class='text-danger' >&#42;</span> required fields .");
			redirect_to('create.php');
		}elseif($check){
			$session->message("Unable to add new Quiz. The <strong>{$name}</strong> is already exist. Please input another name.");
			redirect_to('create.php');
		}else{
			$quiz = new Quiz();
			$quiz->name			= $_POST['name'];
			$quiz->user_id		= $_SESSION['user_id'];
			$quiz->description	= $_POST['description'];
			$quiz->active 		= $_POST['active'];
			if($quiz->save()) {
				// Success
				$session->message("The <strong>{$_POST['name']}</strong> was successfully <strong>Added</strong>.");
				redirect_to('index.php');
			} else {
				$session->message("Unable to add <strong>{$_POST['name']}</strong>.");
				redirect_to('index.php');
			}
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
				<li><a href="index.php">List</a></li>
				<li class="active">Add</li>
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
				<form action="create.php"  method="POST">
				  <div class="form-group">
					<label for="name"><span class='text-danger' >&#42;</span> Name</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo ucwords($obj); ?>  name">
				  </div>
				    <div class="form-group">
					<label for="description"><span class='text-danger' >&#42;</span> Description</label>
					<input type="text" class="form-control" name="description" id="description" placeholder="<?php echo ucwords($obj); ?>  Description">
				  </div>
				  <div class="checkbox">
					  <input type="radio" name="active" id="active" value=1  checked='checked'  /> Active
					 <input type="radio" name="active" id="active" value=0  /> In Active
				  </div>
				 
				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				  <button type="button" class="btn btn-danger" onClick='window.location.href = "index.php";' >Cancel </button>
				  <div class="checkbox"><br /><br />
					 <p class="help-block">  <span class='text-danger' >&#42;</span> Required Fields</p>
				  </div>	
				</form>
			</div>
			
		</div>
	</div>


<?php include_layout_template('sub_footer.php'); ?>
		
