<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find all the User
	$users = User::find_student();

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
			<?php if($message):?>
			 <div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
			</div>
		  <?php else: ?>
		   <div class="alert alert-info alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There are total of <strong><?php echo count($users); ?></strong> users in the database.
			</div>
		  <?php endif; ?>
			
			<div class="table-responsive">
				<table class="table table-striped ">
					<thead>
						<tr>
							<th>Username</th>
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
						<?php foreach($users as $user): ?>
						<?php 
							 $user_type = User_type::find_by_id($user->type_id); 
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
							<td><a href=# rel="tooltip"  title="Show Profile"><?php echo $user->username; ?></a></td>
							<td><?php echo ucwords($user->first_name.' '.$user->last_name); ?></td>
							<td><?php echo $user->email; ?></td>
							<td><?php echo ucwords($user->phone); ?></td>
							<td><?php echo ucwords($user->address); ?></td>
							<td class='text-center'><?php  echo $type; ?></td>
							<td class='text-center'><?php echo $user->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
							<td class='text-center'><a href="add_parents.php?id=<?php echo $user->id; ?>" rel="tooltip"  title="Add Parents"><i class="fa fa-user text-primary"></i></a> &nbsp; <a href="update.php?id=<?php echo $user->id; ?>" rel="tooltip"  title="Edit User"><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $user->id; ?>" onclick="return confirm('Are you sure you want to delete');" rel="tooltip"  title="Delete User"><i class="fa fa-trash text-danger"></i></a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<!--<span class='label label-info pull-right' >Total User <?php echo count($users); ?></span>-->
			<a href="create.php" class="btn btn-primary" > <i class="fa fa-plus "></i> Add User</a> 
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