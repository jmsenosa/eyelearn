<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);
	$parent = User::find_by_parent_id($user->id);

	$obj = 'Quiz Result';
	
	// Find all the Quiz
	$results = Quiz_result::find_my_student($parent->id);

?>
<?php include_layout_template('sub_header.php'); ?>
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-pencil "></i> <?php echo ucwords($obj); ?>  <small class='pull-right' style='font-size: 14px;'  >Welcome to <strong><?php $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?></strong> <a href='#'><?php echo ucwords($user->full_name()); ?></a>! </small> </h1>
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
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <strong><?php echo ucwords($parent->full_name()); ?></strong> Quiz results.
				</div>
			  <?php endif; ?>
			
			<div class="table-responsive">
				<table class="table   ">
					<thead>
						<tr>
						<th>Name</th>
						<th>Student Name</th>
						<th class='text-center'>Score</th>
						<th class='text-center'>Number of items</th>
						<th class='text-center'>Quiz Date</th>
						<th class='text-center'>Status</th>
					  </tr>
					</thead> 
					<?php if($results):?>  
					<?php foreach($results as $result): $passing_grade = $result->total_number/2;?>
					  <tr class='<?php echo $result->score >= $passing_grade ? 'success':'danger'; ?> text-<?php echo $result->score >= $passing_grade ? 'success':'danger'; ?>'>
						<td><?php $quiz = Quiz::find_by_id($result->quiz_id); echo ucwords($quiz->name); ?></td>
						<td><?php $user = User::find_by_id($result->user_id); echo ucwords($user->full_name()); ?></td>
						<td class='text-center'><?php echo $result->score; ?></td>
						<td class='text-center'><?php echo $result->total_number; ?></td>
						<td class='text-center'><?php echo date('M d, Y H:i:s',strtotime($result->quiz_date)); ?></td>
						<td class='text-center'><?php echo  $result->score >= $passing_grade ? '<span class="label label-success">Passed</span>':'<span class="label label-danger">&nbsp;Failed&nbsp;</span>'; ?></td>
					  </tr>
					<?php endforeach; ?>
					<?php else: ?>
					  <tr>
						<td style='background: #F2DEDE !important' colspan=5 class="text-danger text-center"  ><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>  No <?php echo ucwords($obj); ?> Found.</td>
					  </tr>
					<?php endif; ?>
					</table>
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