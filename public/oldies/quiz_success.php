<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	!$session->is_logged_in() ? redirect_to("login.php"):'';
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	$id = ($_GET['id'] ? $_GET['id']:0);
	$result = quiz_result::find_by_id($id);	
		
	
 ?>
<?php include_layout_template('header.php'); ?>
<section id="main">				
	<div class="widget-boxes news">
		<h2>Ang iyong nakuha ay  <span style='color: #FFA500; background: transparent; margin-left: -10px; font-size: 80px !important' ><?php echo $result->score; ?></span> out of <?php echo $result->total_number; ?><br /> 
		<a href='index.php'> Home</a> | <a href='admin/logout.php'> Logout</a></h2>
		
	</div>
</section>
<?php include_layout_template('footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
	  // alert('Testing alert');
	  
	 
	}); 
/*]]>*/
</script>