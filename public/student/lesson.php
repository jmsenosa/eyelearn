<?php 
	// Initialize Page
	require_once('../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("login.php"); }
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	$lessons = Lesson::find_all();	
	$ctr = 0;
 ?>
<?php include_layout_template('student_header.php'); ?>
<section id="main">
	<div class="tabs">
		<ul class="filter-controls">
			<?php foreach($lessons as $lesson): ?>
			<li><a href="lesson.php?id=<?php echo $lesson->id; ?>" ><?php echo $lesson->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	
	<ul class="slider sortable-grid">
		<li class="grid-item parties">
			<a href="#"><img src="images/img-person01.jpg" alt="" />
			<div class="mask"></div></a>
		</li>	
	</ul>
</section>
<?php include_layout_template('student_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
	  // alert('Testing alert');
	  
	  // $(".slider li ul a")
	  // .each(function(i) {
		// if (i != 0) { 
		  // $("#beep-two")
			// .clone()
			// .attr("id", "beep-two" + i)
			// .appendTo($(this).parent()); 
		// }
		// $(this).data("beeper", i);
	  // })
	  // .mouseenter(function() {
		// $("#beep-two" + $(this).data("beeper"))[0].play();
	  // });
	// $("#beep-two").attr("id", "beep-two0");
	  
	}); 
/*]]>*/
</script>