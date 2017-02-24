<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Lesson';
	
	$user = User::find_by_id($_SESSION['user_id']);

    $lessons = Lesson::find_by_user($_SESSION['user_id']);

	
	 

?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-book "></i> <?php echo ucwords($obj); ?> <small></small></h1>
		<ol class="breadcrumb">
			<li><a href="../index.php"> Dashboard</a></li>
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
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There are total of <strong><?php echo count($lessons); ?></strong> <?php echo ucwords($obj); ?> in the database.
	</div>
  <?php endif; ?>
<div class="table-responsive">
	<table class="table table-striped ">
		<thead>
			<tr>
			<th>Name</th>
			<th>Created By</th>
			<th>Description</th>
		  </tr>
		</thead> 
		<?php foreach($lessons as $lesson): ?>
		  <tr>
			<?php $user = User::find_by_id($lesson->user_id); ?>
			<td>
				<?php if ($lesson->isDone == 0): ?> 
					<a href='folder.php?folder=<?php echo $lesson->name; ?>' rel="tooltip"  title="View Content" ><?php echo ucwords($lesson->name); ?></a>
				
				<?php else: ?>
					<?php echo ucwords($lesson->name); ?>
				<?php endif ?>
			</td>
			<td>
				<?php if (isset($user->first_name) && isset($user->last_name)): ?>
					<?php echo $user->first_name. " ".$user->last_name; ?>
				<?php endif ?>
			</td>
			<td><?php echo ucwords($lesson->description); ?></td>
			
		  </tr>
		<?php endforeach; ?>
		</table>
</div>
<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
		$("[rel='tooltip']").tooltip();
        $('.table').DataTable(); <!-- calling data table sorting sorting to -->
	}); 
/*]]>*/
</script>
