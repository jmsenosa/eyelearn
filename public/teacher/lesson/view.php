<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Lesson';
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	$lessons = Lesson_dtl::find_by_lesson($id); 
	
	
?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-book "></i>  <?php echo ucwords($obj); ?> <small></small></h1>
		<ol class="breadcrumb">
			<li><a href="../index.php"> Dashboard</a></li>
			<li><a href="index.php"> List</a></li>
			<li class="active"> Content</li>
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
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There are total of <strong><?php echo count($lessons); ?></strong> <?php echo ucwords($obj); ?> in the database.
	</div>
  <?php endif; ?>
<div class="table-responsive">
	<table class="table table-striped ">
		<thead>
			<tr>
			<th>Image</th>
			<th>Name</th>
			<th>Description</th>
			<th class='text-center'>Status</th>
			<th class='text-center'>Option</th>
		  </tr>
		</thead> 
		<?php foreach($lessons as $lesson): ?>
		  <tr>
			<td><img src='../../<?php echo $lesson->image_path(); ?>' style='width: 100px;' ></td>
			<td><?php echo ucwords($lesson->name); ?></td>
			<td><?php echo ucwords($lesson->description); ?></td>
			<td class='text-center'><?php echo $lesson->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
			<td class='text-center'><a href="update.php?id=<?php echo $lesson->id; ?>"  rel="tooltip"  title="Edit <?php echo ucwords($obj); ?>" ><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $lesson->id; ?>" rel="tooltip"  title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
		  </tr>
		<?php endforeach; ?>
		</table>
</div>
<a href="content.php?id=<?php echo $id; ?>" class="btn btn-primary" > <i class="fa fa-plus "></i> Add Content</a> 
<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
		$("[rel='tooltip']").tooltip();	
	}); 
/*]]>*/
</script>
		
