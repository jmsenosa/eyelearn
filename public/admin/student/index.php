<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find all the User
    $students = Students::find_all();
    $obj = 'Parents and Student';
	
?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-user "></i> Students and Parents <small></small></h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dashboard</a></li>
				<li class="active"> List</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->

	<!-- Main -->
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<!-- Service Tabs -->
			<ul id="myTab" class="nav nav-tabs nav-justified">
				<li class="active"><a href="#service-one" data-toggle="tab"> Student</a></li>
				<li class=""><a href="#service-two" data-toggle="tab"> Parent</a></li>
			</ul>

			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active in" id="service-one">
					<h3 class="lead" ><?php echo ucwords($obj); ?> Table</h3> 
					<?php if($message):?>
						 <div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
						</div>
					  <?php else: ?>
					   <div class="alert alert-info alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all Your Student.
						</div>
					  <?php endif; ?>
					<div class="table-responsive">
					<table class="table table-striped ">
						<thead>
							<tr>
								<th>LRN</th>
								<th>Full name</th>
								<th>Address</th>
								<th>Parent</th>
								<th class='text-center'>Status</th>
								<th class='text-center'>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($students as $student): ?>

							<tr>
								<td><a href=# rel="tooltip"  title="Show Profile"><?php echo $student->lrn; ?></a></td>
								<td><?php $student->full_name() ?></td>
								<td><?php echo $student->address; ?></td>
								<td><?php echo $student->find_parent($student->id) ?></td>
								<td class='text-center'><?php echo $student->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
								<td class='text-center'><a href="update.php?id=<?php echo $student->id; ?>" rel="tooltip"  title="Edit User"><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $student->id; ?>" onclick="return confirm('Are you sure you want to delete');" rel="tooltip"  title="Delete User"><i class="fa fa-trash text-danger"></i></a></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<a href="create.php" class="btn btn-primary" >  Add</a> 
				</div>

				</div>
			</div>
		</div>



<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
		$("[rel='tooltip']").tooltip();	
	}); 
/*]]>*/
</script>