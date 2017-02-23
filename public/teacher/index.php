<?php
	// Initialize 
	require_once('../../includes/initialize.php');
	// Check if User is Logged in to view this page.
	
	
	// !$session->is_logged_in() ? redirect_to("../login.php"): redirect_to("index.php"); 
	
	// Check if user is admin
	$user = User::find_by_id($_SESSION['user_id']);
		
	
	
?>
 <?php include_layout_template('admin_header.php'); ?>
 	<div class="col-md-3">
        <?php include_layout_template('teacher-sidebar.php'); ?>
    </div>
    <div class="col-md-9">
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

		<div class="row">
			<div class="col-lg-12">
				<div class="well">
					Hi <strong><?php echo ucwords($user->first_name." ".$user->last_name); ?></strong>!
					<br>
					Your time starts at <strong> <?php  echo date_format(date_create(date("Y-m-d")." ".$user->fromtime), "h:i A"); ?></strong> 
					and ends at <strong><?php echo date_format( date_create(date("Y-m-d")." ".$user->totime), "h:i A"); ?> </strong>
				</div>
			</div>
		</div>

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
		
		<!-- deleted -->

<?php include_layout_template('admin_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
	  // alert('Testing alert');
	}); 
/*]]>*/
</script>

