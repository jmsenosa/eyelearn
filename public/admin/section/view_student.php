<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'section';
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	// Find all the User
	$section = Section::find_by_id($id);
	$students = Student::find_by_section($id);

?>
<?php include_layout_template('sub_header.php'); ?>
	<div class="row">
		<div class="col-lg-12">
			<h3 class="title">  <?php echo ucwords($obj); ?> Manager</h3>
			 <ol class="breadcrumb">
				<li><a href="../index.php">Home</a> </li>
				<li><a href="index.php">Section List</a> </li>
				<li class="active">  <?php echo ucwords($obj); ?></li>
			</ol>
		</div>
	</div>


 <?php if($message):?>
  <div class="alert alert-success" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	<span class="sr-only">Success</span>
	<?php echo output_message($message); ?>
  </div>
  <?php else: ?>
	<div class="alert alert-info" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	<span class="sr-only">Note:</span>
	List of student on  <strong><?php echo ucwords($obj); ?> <?php echo $section->name; ?></strong>.
  </div>
  <?php endif; ?>
  <div class="table-responsive">  
<table class="table">
  <tr>
    <th>Name</th>
    <th>Course</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Active</th>
  </tr>
<?php foreach($students as $student): ?>
  <tr>
    <td><?php echo ucwords($student->first_name.' '.$student->last_name); ?></td>
    <td><?php $course = Course::find_by_id($student->course_id);  echo strtoupper($course->name); ?></td>
    <td><?php echo $student->email; ?></td>
    <td><?php echo ucwords($student->phone); ?></td>
    <td><?php echo $student->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
  </tr>
<?php endforeach; ?>
</table>
</div>
<a href="index.php" class="btn btn-danger" >Back</a>
<?php include_layout_template('sub_footer.php'); ?>
