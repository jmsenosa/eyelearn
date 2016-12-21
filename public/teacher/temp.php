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
			<h1 class="page-header"> <i class="fa fa-dashboard "></i> Dashboard <small></small></h1>
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->

	<!-- Main -->
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			
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

