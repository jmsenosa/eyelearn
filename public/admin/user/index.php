<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find all the User
	$users = User::find_all();
	$admins = User::find_admin();
	$teachers = User::find_teacher();
	$parentss = User::find_parents();
	$students = User::find_student();
	$obj = 'User';
	
?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-user "></i> User <small></small></h1>
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
				<li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-admin"></i> Admin</a></li>
				<li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-teacher"></i> Teacher</a></li>
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
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all Admin.
						</div>
					  <?php endif; ?>
					<div class="table-responsive">
					<table class="table table-striped ">
						<thead>
							<tr>
								<th>Username</th>
								<th>Password</th>
								<th>Full name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Address</th>
								<th class='text-center'>Type</th>
								<th class='text-center'>Status</th>
								<th class='text-center'>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($admins as $admin): ?>
							<?php 
								 $user_type = User_type::find_by_id($admin->type_id); 
								if($user_type->id==1){
									$type = '<span class="label label-danger" >'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==2){
									$type = '<span class="label label-success">'.ucwords($user_type->name).'</span>';
								}
							?>
							<tr>
								<td><a href=# rel="tooltip"  title="Show Profile"><?php echo $admin->username; ?></a></td>
								<td><?php echo str_repeat("*", strlen($admin->password));  ?></td>
								<td><?php echo ucwords($admin->first_name.' '.$admin->last_name); ?></td>
								<td><?php echo $admin->email; ?></td>
								<td><?php echo ucwords($admin->phone); ?></td>
								<td><?php echo ucwords($admin->address); ?></td>
								<td class='text-center'><?php  echo $type; ?></td>
								<td class='text-center'><?php echo $admin->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
								<td class='text-center'><a href="update.php?id=<?php echo $admin->id; ?>" rel="tooltip"  title="Edit User"><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $admin->id; ?>" onclick="return confirm('Are you sure you want to delete');" rel="tooltip"  title="Delete User"><i class="fa fa-trash text-danger"></i></a></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!--<span class='label label-info pull-right' >Total User <?php echo count($users); ?></span>-->
				<a href="create.php" class="btn btn-primary" >  Add</a> 
				</div>
				<div class="tab-pane fade" id="service-two">
					<h3 class="lead" ><?php echo ucwords($obj); ?> Table</h3> 
					<?php if($message):?>
						 <div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
						</div>
					  <?php else: ?>
					   <div class="alert alert-info alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all Teachers.
						</div>
					  <?php endif; ?>
					<div class="table-responsive">
					<table class="table table-striped ">
						<thead>
							<tr>
								<th>Username</th>
								<th>Password</th>
								<th>Full name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Address</th>
								<th class='text-center'>Type</th>
								<th class='text-center'>Status</th>
								<th class='text-center'>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($teachers as $teacher): ?>
							<?php 
								 $user_type = User_type::find_by_id($teacher->type_id); 
								if($user_type->id==1){
									$type = '<span class="label label-danger" >'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==2){
									$type = '<span class="label label-success">'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==3){
									$type = '<span class="label label-warning">'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==4){
									$type = '<span class="label label-primary">'.ucwords($user_type->name).'</span>';
								}
							?>
							<tr>
								<td><a href=# rel="tooltip"  title="Show Profile"><?php echo $teacher->username; ?></a></td>
								<td><?php echo str_repeat("*", strlen($teacher->password)); ?></td>
								<td><?php echo ucwords($teacher->first_name.' '.$teacher->last_name); ?></td>
								<td><?php echo $teacher->email; ?></td>
								<td><?php echo ucwords($teacher->phone); ?></td>
								<td><?php echo ucwords($teacher->address); ?></td>
								<td class='text-center'><?php  echo $type; ?></td>
								<td class='text-center'><?php echo $teacher->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
								<td class='text-center'><a href="update_teacher.php?id=<?php echo $teacher->id; ?>" rel="tooltip"  title="Edit User"><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $teacher->id; ?>" onclick="return confirm('Are you sure you want to delete');" rel="tooltip"  title="Delete User"><i class="fa fa-trash text-danger"></i></a></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!--<span class='label label-info pull-right' >Total User <?php echo count($users); ?></span>-->
				<a href="create_teacher.php" class="btn btn-primary" >  Add</a> 
                <a href='viewpdf.php' target='blank' class="btn btn-danger" >View in PDF Files</a>
				</div>
				<div class="tab-pane fade" id="service-three">
					<h3 class="lead" ><?php echo ucwords($obj); ?> Table</h3> 
					<?php if($message):?>
						 <div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
						</div>
					  <?php else: ?>
					   <div class="alert alert-info alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all Parents
						</div>
					  <?php endif; ?>
					<div class="table-responsive">
					<table class="table table-striped ">
						<thead>
							<tr>
								<th>Username</th>
								<th>Password</th>
								<th>Full name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Address</th>
								<th class='text-center'>Type</th>
								<th class='text-center'>Status</th>
								<th class='text-center'>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($parentss as $parents): ?>
							<?php 
								 $user_type = User_type::find_by_id($parents->type_id); 
								if($user_type->id==1){
									$type = '<span class="label label-danger" >'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==2){
									$type = '<span class="label label-success">'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==3){
									$type = '<span class="label label-warning">'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==4){
									$type = '<span class="label label-primary">'.ucwords($user_type->name).'</span>';
								}
							?>
							<tr>
								<td><a href=# rel="tooltip"  title="Show Profile"><?php echo $parents->username; ?></a></td>
								<td><?php echo $parents->password; ?></td>
								<td><?php echo ucwords($parents->first_name.' '.$parents->last_name); ?></td>
								<td><?php echo $parents->email; ?></td>
								<td><?php echo ucwords($parents->phone); ?></td>
								<td><?php echo ucwords($parents->address); ?></td>
								<td class='text-center'><?php  echo $type; ?></td>
								<td class='text-center'><?php echo $parents->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
								<td class='text-center'><a href="update.php?id=<?php echo $parents->id; ?>" rel="tooltip"  title="Edit User"><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $parents->id; ?>" onclick="return confirm('Are you sure you want to delete');" rel="tooltip"  title="Delete User"><i class="fa fa-trash text-danger"></i></a></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!--<span class='label label-info pull-right' >Total User <?php echo count($users); ?></span>-->
				<a href="create.php" class="btn btn-primary" >  Add</a> 
				</div>
				<div class="tab-pane fade" id="service-four">
					<h3 class="lead" ><?php echo ucwords($obj); ?> Table</h3> 
					<?php if($message):?>
						 <div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
						</div>
					  <?php else: ?>
					   <div class="alert alert-info alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all Student.
						</div>
					  <?php endif; ?>
					<div class="table-responsive">
					<table class="table table-striped ">
						<thead>
							<tr>
								<th>Username</th>
								<th>Password</th>
								<th>Full name</th>
								<th>Teacher</th>
								<th>Address</th>
								<th class='text-center'>Type</th>
								<th class='text-center'>Status</th>
                                <th class='text-center'>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($students as $student): ?>
							<?php 
								 $user_type = User_type::find_by_id($student->type_id); 
								if($user_type->id==1){
									$type = '<span class="label label-danger" >'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==2){
									$type = '<span class="label label-success">'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==3){
									$type = '<span class="label label-warning">'.ucwords($user_type->name).'</span>';
								}elseif($user_type->id==4){
									$type = '<span class="label label-primary">'.ucwords($user_type->name).'</span>';
								}
							?>
							<tr>
								<td><a href=# rel="tooltip"  title="Show Profile"><?php echo $student->username; ?></a></td>
								<td><?php echo $student->password; ?></td>
								<td><?php echo ucwords($student->first_name.' '.$student->last_name); ?></td>
								<td><?php $myParents = User::find_by_id($student->created_by); echo ucwords( $myParents->first_name.' '.$myParents->last_name); ?></td>
								<td><?php echo ucwords($student->address); ?></td>
								<td class='text-center'><?php  echo $type; ?></td>
								<td class='text-center'><?php echo $student->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
                                <td class='text-center'><a href="delete.php?id=<?php echo $student->id; ?>" onclick="return confirm('Are you sure you want to delete');" rel="tooltip"  title="Delete User"><i class="fa fa-trash text-danger"></i></a></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!--<span class='label label-info pull-right' >Total User <?php echo count($users); ?></span>-->
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