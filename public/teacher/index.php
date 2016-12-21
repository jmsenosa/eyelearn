<?php
	// Initialize 
	require_once('../../includes/initialize.php');
	// Check if User is Logged in to view this page.
	
	
	// !$session->is_logged_in() ? redirect_to("../login.php"): redirect_to("index.php"); 
	
	// Check if user is admin
	$user = User::find_by_id($_SESSION['user_id']);
		
	
	
?>
 <?php include_layout_template('admin_header.php'); ?>
 
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-dashboard "></i> Dashboard  </h1>
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->

	<!-- Service Panels -->
	<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h5><i class="fa fa-info-circle "></i> How to Create a Lesson:</h5>
		<ul> 
			<li>Go to <strong>Audio Manager</strong> and Add/upload a audio file.</li>
			<li>Go to <strong>Lesson Manager</strong> and Add a Lesson.</li>
			<li>After you add a Lesson, You can Add a content in Lesson Manager</li>
		</ul>
		<h5><i class="fa fa-info-circle "></i> How to Create a Quiz:</h5>
		<ul> 
			<li>Go to <strong>Quiz Manager</strong> and Add a Quiz.</li>
			<li>Go to <strong>Quiz Manager</strong> and view. Then Add Quiz Question</li>
			<li>After you add a  Add Quiz Question, Go to Choice Manager and Add Choices from question</li>
		</ul>
	</div>
	
	<div class="row">
        
        <div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-user fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					 <h4> <a href="student/index.php" >Students</a></h4>
					<p>Your Students information</p>
				</div>
			</div>
		</div>
		 <div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-certificate fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					 <h4> <a href="section/index.php" >Section Manager</a></h4>
					<p>Student Section</p>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					 <h4> <a href="attendance/index.php" >Attendance Manager</a></h4>
					<p>Student Daily Attendance</p>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-calendar-check-o fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					 <h4> <a href="attendancereview/index.php" >Attendance Review</a></h4>
					<p>Review Student Daily Attendance</p>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-calendar-check-o fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					 <h4> <a href="list/index.php" >Student List By School Year</a></h4>
					<p>Review Student List</p>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-volume-up fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					 <h4> <a href="audio/index.php" >Audio Manager</a></h4>
					<p>Manage Audio</p>
				</div>
			</div>
		</div>
		 <div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-book fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					<h4> <a href="lesson/index.php" >Lesson Manager</a></h4>
					<p>Manage Lesson</p>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					 <h4> <a href="quiz/index.php" >Quiz Manager</a></h4>
					<p>Manage Quiz</p>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-star fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					<h4> <a href="result/index.php" >Quiz Result</a></h4>
					<p>Quiz Result</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-file-movie-o fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					<h4> <a href="story/index.php" >Story Telling</a></h4>
					<p>Story Telling</p>
				</div>
			</div>
		</div>

        
        <div class="col-md-3">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<span class="fa-stack fa-5x">
						  <i class="fa fa-circle fa-stack-2x text-primary"></i>
						  <i class="fa fa-list fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="panel-body">
					<h4> <a href="profile/index.php" >Profile</a></h4>
					<p>Profile</p>
				</div>
			</div>
		</div>
	</div>

<?php include_layout_template('admin_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
	  // alert('Testing alert');
	}); 
/*]]>*/
</script>

