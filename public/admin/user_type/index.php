<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'User Type';
	
	// Find all the User
	$user_types = User_type::find_all();

?>
<?php include_layout_template('sub_header.php'); ?>
	<div class="row">
		<div class="col-lg-12">
			<h3 class="title">  <?php echo ucwords($obj); ?> Manager</h3>
			 <ol class="breadcrumb">
				<li><a href="../index.php">Home</a> </li>
				<li class="active">  <?php echo ucwords($obj); ?></li>
			</ol>
		</div>
	</div>


 <?php if($message):?>
	 <div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
	</div>
  <?php else: ?>
   <div class="alert alert-info alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There are total of <strong><?php echo count($user_types); ?></strong> <?php echo ucwords($obj); ?> in the database.
	</div>
  <?php endif; ?>
<div class="table-responsive">
	<table class="table table-striped ">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th class='text-center'>Status</th>
				<th class='text-center'>Option</th>
			  </tr>
		</thead>	  
		<?php foreach($user_types as $user_type): ?>
		  <tr>
			<td><?php echo ucwords($user_type->name); ?></td>
			<td><?php echo ucwords($user_type->description); ?></td>
			<td class='text-center'><?php echo $user_type->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
			<td class='text-center'><a href="update.php?id=<?php echo $user_type->id; ?>" rel="tooltip"  title="Edit <?php echo ucwords($obj); ?>"><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $user_type->id; ?>" rel="tooltip"  title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
		  </tr>
		<?php endforeach; ?>
	</table>
</div>
<a href="create.php" class="btn btn-primary" > <i class="fa fa-plus "></i> Add <?php echo ucwords($obj); ?></a> 
<?php include_layout_template('sub_footer.php'); ?>
