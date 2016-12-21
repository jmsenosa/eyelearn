<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	
	// Find section
	$sections = Section::find_all_active();
	
	
	
	$obj = 'student';
	
	if(isset($_POST['submit'])) {		
		
		$first_name = trim($_POST['first_name']);
		$last_name = trim($_POST['last_name']);
		$check_duplicate = Student::check_duplicate($first_name, $last_name);
	
		if($_POST['first_name']=='' && $_POST['last_name']==''  && $_POST['phone']==''  && $_POST['email']=='' ){
			$session->message("Please input data on required fileds.");
			redirect_to('create.php');
		}elseif($check_duplicate){
			$session->message("Unable to Add Student, Duplicate entry");
			redirect_to('create.php');
		}elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$session->message("Please check Email Format");
			redirect_to('create.php');
		}elseif(!is_numeric($_POST['phone'])){
			$session->message("Invalid Phone number. Please insert numeric value only");
			redirect_to('create.php');
		}elseif(strlen($_POST['phone']) != 11){
			$session->message("Invalid Phone number. Please insert numeric 11 digit only");
			redirect_to('create.php');
		}else{
				// id, section_id, course_id, first_name, last_name, email, phone, active, last_update
			$student = new Student();
			$student->section_id	= $_POST['section_id'];
			$student->first_name	= $_POST['first_name'];
			$student->middle_name	= $_POST['middle_name'];
			$student->last_name		= $_POST['last_name'];
			$student->email			= $_POST['email'];
			$student->phone			= $_POST['phone'];
			$student->active 		= $_POST['active'];
			if($student->save()) {
				// Success
				$session->message("{$obj} Successfully created.");
				redirect_to('index.php');
			} else {
				$session->message("Unable to create {$obj}.");
				redirect_to('index.php');
			}
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
			<form class="form-horizontal" action="create.php"  method="POST">
			  <div class="form-group">
				<label for="first_name" class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo ucwords($obj); ?> First Name" />
				</div>
				<label for="middle_name" class="col-sm-1 control-label"> Middle Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="<?php echo ucwords($obj); ?> Middle Name" />
				</div>
			  </div>
			  <div class="form-group">
				<label for="last_name" class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo ucwords($obj); ?> Last Name" />
				</div>
				<label for="address" class="col-sm-1 control-label"> Address</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="address" name="address" placeholder="<?php echo ucwords($obj); ?> Address" />
				</div>
			  </div>
			 <div class="form-group">
				<label for="type" class="col-sm-2 control-label">Section</label>
				<div class="col-sm-4">
				   <select class="form-control" id="section_id" name="section_id" >
					  <?php foreach($sections as $section):	?>
					  <option value='<?php echo $section->id; ?>'  ><?php echo ucwords($section->name); ?></option>
					 <?php endforeach; ?>
					</select>
				</div>
				<label for="email" class="col-sm-1 control-label">Email</label>
				<div class="col-sm-4">
				 <input type="text" class="form-control" id="email" name="email" value='<?php echo @$_POST['email'] ? $_POST['email'] : ''; ?>' placeholder="<?php echo ucwords($obj); ?> Email" />
				</div>	
			  </div>
			   <div class="form-group">
				<label for="phone" class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-4">
				   <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo ucwords($obj); ?> Phone" />
				</div>
				<label for="event_time" class="col-sm-1 control-label"> Status</label>
				<div class="col-sm-4">
				   Active <input type="radio" name="active" id="active" value=1  checked='checked'  />
				 Inactive <input type="radio" name="active" id="active" value=0  />
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
		
