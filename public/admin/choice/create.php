<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
		
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
	$obj = 'Choice';
	
	$id = ($_GET['id'] ? $_GET['id']:0);
	
	
	if(isset($_POST['submit'])) {
		
		// $name = trim($_POST['name']);
		// $check = Choice::check_name($name);
	
		// if($_POST['name']=='' && $_POST['description']=='' ){
			// $session->message("Please input data on <span class='text-danger' >&#42;</span> required fields .");
			// redirect_to('create.php');
		// }elseif($check){
			// $session->message("Unable to add new Quiz. The <strong>{$name}</strong> is already exist. Please input another name.");
			// redirect_to('create.php');
		// }else{
			$choice = new Choice();
			$choice->question_id	= $_POST['question_id'];
			$choice->name			= $_POST['name'];
			$choice->is_correct		= $_POST['is_correct'];
			$choice->active 		= $_POST['active'];
			if($choice->save()) {
				// Success
				$session->message("The <strong>{$_POST['name']}</strong> was successfully <strong>Added</strong>.");
				redirect_to('index.php?id='.$_POST['question_id']);
			} else {
				$session->message("Unable to add <strong>{$_POST['name']}</strong>.");
				redirect_to('index.php?id='.$_POST['question_id']);
			}
		// }
		
	}
	
?>
<?php include_layout_template('sub_header.php'); ?>
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-pencil "></i> <?php echo ucwords($obj); ?> Manager <small class='pull-right' style='font-size: 14px;'  >Welcome to <strong><?php $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?></strong> <a href='#'><?php echo ucwords($user->full_name()); ?></a>! </small> </h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dashoard</a></li>
				<li><a href="index.php?id=<?php echo $id; ?>">List</a></li>
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
				  <input type='hidden' name='question_id' value='<?php echo $id; ?>' >
				  <div class="form-group">
					<label for="name"><span class='text-danger' >&#42;</span> Name</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo ucwords($obj); ?>  name">
				  </div>
				   <div class="form-group">
					<label for="is_correct"> Correct Answer</label><br />
					 <input type="radio" name="is_correct" id="is_correct" value=1   /> Yes
					 <input type="radio" name="is_correct" id="is_correct" value=0  checked='checked' /> No
				  </div>
				   <div class="form-group">
					<label for="active"> Status</label><br />
					 <input type="radio" name="active" id="active" value=1  checked='checked'  /> Yes
					 <input type="radio" name="active" id="active" value=0  /> No
				  </div>
				
				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				  <button type="button" class="btn btn-danger" onClick='window.location.href = "index.php?id=<?php echo $id; ?>";' >Cancel </button>
				  <div class="checkbox"><br /><br />
					 <p class="help-block">  <span class='text-danger' >&#42;</span> Required Fields</p>
				  </div>	
				</form>
			</div>
			
		</div>
	</div>


<?php include_layout_template('sub_footer.php'); ?>
		
