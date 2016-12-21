<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
		
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
	// Find Quiz 
	$id = ($_GET['id'] ? $_GET['id']:0);
	$quiz = Quiz::find_by_id($id);	
	
	$obj = 'Question';
	
	// Find all the Quiz
	$quizes = Quiz::find_all();
	
	if(isset($_POST['submit'])) {
	
		$quiz_question = new Quiz_question();
		$quiz_question->quiz_id			= $_POST['quiz_id'];
		$quiz_question->question		= $_POST['question'];
		$quiz_question->active			= $_POST['active'];
		$quiz_question->attach_file($_FILES['file_upload']);
		if($quiz_question->save()) {
			// Success
			$session->message("The <strong>{$_POST['question']}</strong> was successfully <strong>Added</strong>.");
			redirect_to('content.php?id='.$_POST['quiz_id']);
		} else {
			 $message = join("<br />", $quiz_question->errors);
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
				<li><a href="content.php?id=<?php echo $quiz->id; ?>"><?php echo ucwords($obj); ?></a></li>
				<li class="active">Add</li>
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
				<form  action="content_add.php?id=<?php echo $id; ?>" enctype="multipart/form-data" method="POST">
				  <input type="hidden" name="quiz_id" value='<?php echo @$quiz->id; ?>' >
				  <div class="form-group">
					<label for="question"><span class='text-danger' >&#42;</span> Question</label>
					<input type="text" class="form-control" name="question" id="question" placeholder="<?php echo ucwords($obj); ?>  name">
				  </div>
				  <div class="checkbox">
					  <input type="radio" name="active" id="active" value=1  checked='checked'  /> Active
					 <input type="radio" name="active" id="active" value=0  /> In Active
				  </div>
				  <div class="form-group">
					<label for="exampleInputFile">File input</label>
					<input type="file" name="file_upload" />
				  </div>
				 
				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				  <div class="checkbox"><br /><br />
					 <p class="help-block">  <span class='text-danger' >&#42;</span> Required Fields</p>
				  </div>	
				</form>
			</div>
			
		</div>
	</div>


<?php include_layout_template('sub_footer.php'); ?>
		
