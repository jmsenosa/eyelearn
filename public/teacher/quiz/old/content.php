<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	// if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
	$obj = 'Quiz Question';
	
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	$quiz_questions = Quiz_question::find_by_quiz($id); 
	
	
?>
<?php include_layout_template('sub_header.php'); ?>
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-pencil "></i> <?php echo ucwords($obj); ?> Manager <small class='pull-right' style='font-size: 14px;'  >Welcome to <strong><?php $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?></strong> <a href='#'><?php echo ucwords($user->full_name()); ?></a>! </small> </h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dashoard</a></li>
				<li><a href="index.php">List</a></li>
				<li class="active">Question</li>
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
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all <?php echo ucwords($obj); ?>.
				</div>
			  <?php endif; ?>
			
			<div class="table-responsive">
				<table class="table table-striped ">
					<thead>
						<tr>
						<th>Image</th>
						<th>Quiz</th>
						<th>Question</th>
						<th class='text-center'>Status</th>
						<th class='text-center'>Option</th>
					  </tr>
					</thead> 
					<?php if($quiz_questions):?>  
					<?php foreach($quiz_questions as $quiz_question): ?>
					  <tr>
						<td><a href='#' data-toggle="modal" data-target="#<?php echo $quiz_questionid; ?>" ><img src='../../<?php echo $quiz_question->image_path(); ?>' style='width: 50px;' ></a></td>
						<td><?php $quiz = Quiz::find_by_id($quiz_question->quiz_id); echo ucwords($quiz->name) ; ?></td>
						<td><?php echo ucwords($quiz_question->question); ?></td>
						<td class='text-center'><?php echo $quiz_question->active==1 ? '<span class="label label-success">&nbsp;&nbsp;Active&nbsp;&nbsp;</span>':'<span class="label label-danger">In Active</span>'; ?></td>
						<td class='text-center'> <a href="content_edit.php?id=<?php echo $quiz_question->id; ?>"  rel="tooltip"  title="Edit <?php echo ucwords($obj); ?>" ><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete_question.php?id=<?php echo $quiz_question->id; ?>" rel="tooltip"  title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
					  </tr>
					<?php endforeach; ?>
					<?php else: ?>
					  <tr>
						<td style='background: #F2DEDE !important' colspan=7 class="text-danger text-center"  ><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>  No <?php echo ucwords($obj); ?> Found.</td>
					  </tr>
					<?php endif; ?>
					</table>
			</div>
			<a href="content_add.php?id=<?php echo $id; ?>" class="btn btn-primary" > Add </a> 
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