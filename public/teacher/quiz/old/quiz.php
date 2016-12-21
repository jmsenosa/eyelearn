<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	// if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
	$obj = 'Quiz';
	
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	$quiz = Quiz::find_by_id($id); 
	$quiz_questions = Quiz_question::find_by_quiz($id); 
	
	
?>
<?php include_layout_template('sub_header.php'); ?>
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-pencil "></i> <?php echo ucwords($obj); ?>  <small class='pull-right' style='font-size: 14px;'  >Welcome to <strong><?php $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?></strong> <a href='#'><?php echo ucwords($user->full_name()); ?></a>! </small> </h1>
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
			
    		<div class="invoice-title">
    			<h2><?php echo ucwords($obj); ?> </h2><h3 class="pull-right">Order # 12345</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Created By:</strong><br>
    					<?php echo $quiz->name?><br>
    					<?php echo $quiz->description?><br>
    					<?php echo $quiz->user_id?><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					<?php echo $quiz->description?><br>
    					<?php echo $quiz->user_id?><br>
    				</address>
    			</div>
    		</div>
    		
			<ol>
			<?php foreach($quiz_questions as $quiz_question): ?>
				<li><img src='../../<?php echo $quiz_question->image_path(); ?>' style='width: 100px;' ></li>
			<?php endforeach; ?>
			</ol>
		
			
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