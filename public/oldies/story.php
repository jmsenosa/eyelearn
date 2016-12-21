<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	!$session->is_logged_in() ? redirect_to("login.php"):'';
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);		
	
	// Find all events
	$stories = Story::find_all();
	
	
 ?>
<?php include_layout_template('header.php'); ?>
<section id="main">				
	<div class="widget-boxes news">
		<h2>Kamusta <span style='color: #FFA500; background: transparent; margin-left: -10px;' ><?php echo ucwords($user->first_name); ?>!</span> <br /> 
		<a href='index.php'> Home</a> | <a href='admin/logout.php'> Logout</a></h2>
		<?php foreach($stories as $story): ?>
		<div class="box">
			<img src="images/lesson1.jpg" style='width: 200px;' alt="" />
			<div class="box-info">
				<h2><a href="play_story.php?id=<?php echo $story->id; ?>"><?php echo ucwords($story->name); ?></a></h2>
				<p><?php echo ucwords($quiz->description); ?></p>
			</div>
		</div>
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