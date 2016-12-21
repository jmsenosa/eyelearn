<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Find  Quiz
	$id = ($_GET['id'] ? $_GET['id']:0);
	$story = Story::find_by_id($id);	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);		
	
	
 ?>
 <?php include_layout_template('header.php'); ?>
<section id="main">
	<div class="widget-boxes news">
		<h2>Kamusta <span style='color: #FFA500; background: transparent; margin-left: -10px;' ><?php echo ucwords($user->first_name); ?>!</span> <br />
		<a href='story.php'> Salaysay Kuwento</a> | <a href='admin/logout.php'> Logout</a></h2>
	</div>
	
	
	<video width="320" height="240" controls>
  <source src="video/<?php echo $story->filename; ?>" type="video/mp4">
  <source src="video/<?php echo $story->filename; ?>" type="video/ogg">
Your browser does not support the video tag.
</video>

	
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