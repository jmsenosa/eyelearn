<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Audio';
	
	// Find all the User
	$audios = Audio::find_by_lesson_name($_GET['folder']);

?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><i class="fa fa-volume-up "></i>   <?php echo ucwords($obj); ?> <small></small></h1>
		<ol class="breadcrumb">
			<li><a href="../index.php"> Dashboard</a></li>
            <li><a href="index.php">Folder</a></li>
            <li class="active"> List</li>
		</ol>
	</div>
</div>
<!-- /.row -->


 <?php if($message):?>
	 <div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
	</div>
  <?php else: ?>
   <div class="alert alert-info alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There are total of <strong><?php echo count($audios); ?></strong> <?php echo ucwords($obj); ?> in the database.
	</div>
  <?php endif; ?>
<div class="table-responsive">
	<table class="table table-striped ">
		<thead>
			<tr>
			<th>Name</th>
			<th class='text-center'>Option</th>
		  </tr>
		</thead> 
		<?php foreach($audios as $audio): ?>
		  <tr>
			<td><?php echo ucwords($audio->filename); ?></td>
			<td class='text-center'> <a href="delete.php?id=<?php echo $audio->id; ?>" rel="tooltip"  title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
		  </tr>
		<?php endforeach; ?>
		</table>
</div>
<a href="create.php?folder=<?php echo $_GET['folder']?>" class="btn btn-primary" > <i class="fa fa-plus "></i> Add <?php echo ucwords($obj); ?></a> 
<?php include_layout_template('sub_footer.php'); ?>
