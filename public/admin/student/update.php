<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'student';
	
	// Find course
	$courses = Course::find_all();
	
	// Find section
	$sections = Section::find_all();
	
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	$student = Student::find_by_id($id); 
	
	if(isset($_POST['submit'])) {
		//Get user id to be edit	
			// id, section_id, course_id, first_name, last_name, email, phone, active, last_update
		$student = Student::find_by_id($_POST['id']);
		$student->section_id	= $_POST['section_id'];
		$student->course_id		= $_POST['course_id'];
		$student->first_name	= $_POST['first_name'];
		$student->last_name		= $_POST['last_name'];
		$student->email			= $_POST['email'];
		$student->phone			= $_POST['phone'];
		$student->active 		= $_POST['active'];
		if($student->update()) {
			// Success
			$session->message("{$_POST['first_name']} successfully edited.");
			redirect_to('index.php');
		} else {
			$session->message("{$_POST['first_name']} successfully edited.");
			redirect_to('index.php');
		}
	}
	
?>
<?php include_layout_template('sub_header.php'); ?>
	<div class="row">
		<div class="col-lg-12">
			<h3 class="title"><?php echo ucwords($obj); ?> Manager </h3>
				<ol class="breadcrumb">
					<li><a href="../index.php">Home</a> </li>
					<li><a href="index.php"><?php echo ucwords($obj); ?></a> </li>
					<li class="active">Create </li>
				</ol>
		</div>
	</div>
	
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
			<input type='hidden' name='id' value='<?php echo $student->id; ?>'/>
			  <div class="form-group">
				<label for="first_name" class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="first_name" name="first_name" value='<?php echo ucwords($student->first_name); ?>' />
				</div>
				<label for="last_name" class="col-sm-1 control-label">Last Name</label>
				<div class="col-sm-4">
				   <input type="text" class="form-control" id="last_name" name="last_name" value='<?php echo ucwords($student->last_name); ?>'/>
				</div>
			  </div>
			  <div class="form-group">
				<label for="course_id" class="col-sm-2 control-label">Course</label>
				<div class="col-sm-4">
				  <select class="form-control" id="course_id" name="course_id" >
					  <?php foreach($courses as $course):	?>
					  <option value='<?php echo $course->id; ?>' <?php echo  ($course->id == $student->course_id ? 'selected="selected"':''); ?>  ><?php echo ucwords($course->name); ?></option>
					 <?php endforeach; ?>
					</select>
				</div>
				<label for="section_id" class="col-sm-1 control-label">Section</label>
				<div class="col-sm-4">
				   <select class="form-control" id="section_id" name="section_id" >
					  <?php foreach($sections as $section):	?>
					  <option value='<?php echo $section->id; ?>' <?php echo  ($section->id == $student->section_id ? 'selected="selected"':''); ?>  ><?php echo ucwords($section->name); ?></option>
					 <?php endforeach; ?>
					</select>
				</div>
								
			  </div>
			  
			   <div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-4">
				 <input type="text" class="form-control" id="email" name="email" value='<?php echo $student->email; ?>' />
				</div>
				<label for="phone" class="col-sm-1 control-label">Phone</label>
				<div class="col-sm-4">
				   <input type="text" class="form-control" id="phone" name="phone" value='<?php echo $student->phone; ?>' />
				</div>
				</div>
				 <div class="form-group">
				<label for="event_time" class="col-sm-2 control-label"> Active</label>
				<div class="col-sm-4">
				  Active <input type="radio" name="active" id="active" value=1 required='required' <?php echo $student->active==1 ? "checked='checked'":"" ; ?> />
				Inactive <input type="radio" name="active" id="active" value=0 required='required' <?php echo $student->active==0 ? "checked='checked'":"" ; ?> />
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
		
