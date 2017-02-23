<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
		
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
	// Find Quiz 
	$id = ($_GET['id'] ? $_GET['id']:0);
	$quiz_question = Quiz_question::find_by_id($id);	
	
	$obj = 'Question';
	
	// Find all the Quiz
	$quizes = Quiz::find_all();
	
	if(isset($_POST['submit'])) {
	
		$quiz_question = Quiz_question::find_by_id($_POST['id']);
		$quiz_question->quiz_id			= $_POST['quiz_id'];
		$quiz_question->question		= $_POST['question'];
		$quiz_question->active			= $_POST['active'];
		$quiz_question->last_update		= date('Y-m-d h:i:s');
		if($quiz_question->update()) {
			// Success
			log_action('User Edit Quiz Question', "{$user->full_name()} Edit Quiz Question [{$_POST['question']}].");
			$session->message("The <strong>{$_POST['question']}</strong> was successfully <strong>Edited</strong>.");
			redirect_to('content.php?id='.$_POST['quiz_id']);
		} else {
			$session->message("Unable to add <strong>{$_POST['quiz_id']}</strong>.");
			redirect_to('content.php?id='.$_POST['quiz_id']);
		}
		
		
	}
	
?>
<?php include_layout_template('sub_header.php'); ?>
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-pencil "></i> <?php echo ucwords($obj); ?> Manager <small class='pull-right' style='font-size: 14px;'  >Welcome to <strong><?php $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?></strong> <a href='#'><?php echo ucwords($user->full_name()); ?></a>! </small> </h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dasboard</a></li>
				<li><a href="index.php">List</a></li>
				<li><a href="content.php?id=<?php echo @$quiz_question->quiz_id; ?>"><?php echo ucwords($obj); ?></a></li>
				<li class="active">Edit</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->
	
	<!-- Main -->
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
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
			<p class="lead" ><?php echo ucwords($obj); ?> Form</p> 
				<form  action="content_edit.php?id=<?php echo $id; ?>"  method="POST">
				  <input type="hidden" name="id" value='<?php echo $quiz_question->id; ?>' >
				  <input type="hidden" name="quiz_id" value='<?php echo $quiz_question->quiz_id; ?>' >
				  <div class="form-group">
					<label for="question"><span class='text-danger' >&#42;</span> Question</label>
					<input type="text" class="form-control" name="question" id="question" value='<?php echo @$quiz_question->question; ?>'>
				  </div>
				  <div class="checkbox">
					  <input type="radio" name="active" id="active" value=1  <?php echo $quiz_question->active==1 ? "checked='checked'":"" ?>  /> Active
					 <input type="radio" name="active" id="active" value=0  <?php echo $quiz_question->active==0 ? "checked='checked'":"" ?> /> In Active
				  </div>
				 
				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				  <button type="button" class="btn btn-danger" onClick='window.location.href = "content.php?id=<?php echo $quiz_question->quiz_id?>";' >Cancel </button>
				  <div class="checkbox"><br /><br />
					 <p class="help-block">  <span class='text-danger' >&#42;</span> Required Fields</p>
				  </div>	
				</form>
			</div>
			
		</div>
	</div>


<?php include_layout_template('sub_footer.php'); ?>
		
