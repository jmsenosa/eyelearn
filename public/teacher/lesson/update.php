<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	$grading_periods = Grading_Quarters::find_all(); 
	
	
	$obj = 'Lesson';
	$user = User::find_by_id($_SESSION['user_id']);
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	$lesson = Lesson::find_by_id($id);
	
	if(isset($_POST['submit'])) {
			//Get user id to be edit
		$lesson = Lesson::find_by_id($_POST['id']);
		$lesson->name			= $_POST['name'];
		$lesson->description	= $_POST['description'];
		$lesson->active 		= $_POST['active'];
		$lesson->isDone 		= $_POST['isDone'];
		$lesson->grading_quarter_id = $_POST['grading_quarter_id'];
		if($lesson->update()) {
			// Success
			$session->message("{$_POST['name']} successfully edited.");
			log_action('Update Lesson', "{$user->full_name()} Updated Lesson {$_POST['name']}.");
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
			<input type='hidden' name='id' value='<?php echo $lesson->id; ?>'/>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label"> Grading Quarter</label>
				<div class="col-sm-4">
					<select name="grading_quarter_id" id="" class="form-control">
						<option>Select Quarter </option>
						<?php foreach ($grading_periods as $period): ?>
						<option <?php echo ($lesson->grading_quarter_id == $period->id) ? "selected": ""; ?> value="<?php echo $period->id; ?>"><?php echo $period->name; ?></option>						
						<?php endforeach ?>
					</select>
				</div>
			</div>	 
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label"> <?php echo ucwords($obj); ?> Name</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="name" name="name" value='<?php echo ucwords($lesson->name); ?>' />
				</div>
				<label for="status" class="col-sm-1 control-label">Status</label>
				<div class="col-sm-4">
					Active <input type="radio" name="active" id="active" value=1 <?php echo $lesson->active==1 ? "checked='checked'":"" ?>   />
					Inactive <input type="radio" name="active" id="active" value=0 <?php echo $lesson->active==0 ? "checked='checked'":"" ?>  />
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label"> <?php echo ucwords($obj); ?> Date</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" value="<?php echo $lesson->description ?>" id="description" name="description"  />
				</div>
				<div class="col-sm-5">
					<label for="isDone" class=" control-label"> <?php echo ucwords($obj); ?> done</label>
					<input type="checkbox" name="isDone" id="active" value=1 <?php echo $lesson->isDone==1 ? "checked='checked'":"" ?>   />
					
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