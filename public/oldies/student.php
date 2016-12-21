<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	!$session->is_logged_in() ? redirect_to("login.php"):'';
	
	$lessons = Lesson::find_all(); 
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);		
	
 ?>
<?php include_layout_template('header.php'); ?>
<section id="main">				
	<div class="widget-boxes news">
		<h2>Kamusta <span style='color: #FFA500; background: transparent; margin-left: -10px;' ><?php echo ucwords($user->first_name); ?>!</span> <br /> 
		<a href='index.php'> Home</a> | <a href='admin/logout.php'> Logout</a></h2>
		<?php $ctr = 1;?>
		<?php foreach($lessons as $lesson): ?>
		<div class="box">
			<img src="images/lesson<?php echo $ctr; ?>.jpg" style='width: 200px;' alt="" />
			<div class="box-info">
				<h2><a href="lesson.php?id=<?php echo $lesson->id; ?>"><?php echo ucwords($lesson->name); ?></a></h2>
			</div>
		</div>
		<?php $ctr++;?>
		<?php endforeach; ?>
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