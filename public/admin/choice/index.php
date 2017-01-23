<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// error_reporting(0);
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);
	
	$obj = 'Choice';
	
	// Find all the Quiz
	$quiz = Quiz::find_by_user_id($user->id);
	// Find all the Choice
	
	if($quiz){
			$quiz_questions = Quiz_question::find_by_quiz($quiz->id);
	}
	
	// Find all the Choice
	
	$id = ($_GET['id'] ? $_GET['id']:0);
	if($id):
		$choices = Choice::find_by_question($id);
	else:
		$choices = Choice::find_all();
	endif;

?>
<?php include_layout_template('sub_header.php'); ?>
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-pencil "></i> <?php echo ucwords($obj); ?> Manager <small class='pull-right' style='font-size: 14px;'  >Welcome to <strong><?php $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?></strong> <a href='#'><?php echo ucwords($user->full_name()); ?></a>! </small> </h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dashboard</a></li>
				<li class="active">List</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->

	<!-- Main -->
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<p class="lead" ><?php echo ucwords($obj); ?> Table</p> 
			<?php if($message):?>
				 <div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
				</div>
			  <?php else: ?>
			   <div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Select Question to Add choices
				</div>
			  <?php endif; ?>
			<div class="row">
				<div class="col-lg-4">
				<p class="lead" >Question</p> 
				<ol>
				<?php if($quiz):?>  
				<?php foreach($quiz_questions as $quiz_question): ?>
					<li><a href='index.php?id=<?php echo $quiz_question->id; ?>' ><img src='../../<?php echo $quiz_question->image_path(); ?>' style='width: 100px;' ></a>&nbsp;<strong><?php echo $quiz_question->question; ?></strong></li>
				<?php endforeach; ?>
				<?php else: ?>
					<li>No Question Available. Please Create a question First. Click <a href='../quiz/index.php' >Here</a> to create a quiz</li>
				<?php endif; ?>
				<ol>
				
				</div>
				<div class="col-lg-8">
					<p class="lead" ><?php echo ucwords($obj); ?> Table</p> 
					<?php if($id):?>  
					<div class="table-responsive">
						<table class="table table-striped  ">
							<thead>
								<tr>
								<th>Name</th>
								<th class='text-center'>Correct</th>
								<th class='text-center'>Status</th>
								<th class='text-center'>Option</th>
							  </tr>
							</thead>
							<?php if($choices):?>  
							<?php foreach($choices as $choice): ?>
							  <tr>
								<td><?php echo ucwords($choice->name); ?></td>
								<td class='text-center'><?php echo $choice->is_correct==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
								<td class='text-center'><?php echo $choice->active==1 ? '<span class="label label-success">&nbsp;&nbsp;Active&nbsp;&nbsp;</span>':'<span class="label label-danger">In Active</span>'; ?></td>
								<td class='text-center'><a href="update.php?id=<?php echo $choice->id; ?>"  rel="tooltip"  title="Edit <?php echo ucwords($obj); ?>" ><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $choice->id; ?>" rel="tooltip"  title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
							  </tr>
							<?php endforeach; ?>
							<?php else: ?>
							  <tr>
								<td style='background: #F2DEDE !important' colspan=4 class="text-danger text-center"  ><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>  No <?php echo ucwords($obj); ?> Found.</td>
							  </tr>
							<?php endif; ?>
						</table>
					</div>
					<a href="create.php?id=<?php echo $id; ?>" class="btn btn-primary" > Add </a> 
					<?php endif; ?>
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