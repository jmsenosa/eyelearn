<?php 
	// Initialize Page
	require_once('../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("login.php"); }
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
 ?>
<?php include_layout_template('student_header.php'); ?>
<section id="main">				
	<div class="widget-boxes news">
		<h2>Kamusta <?php echo ucwords($user->first_name); ?>! <a href='logout.php' >Log out</a></h2>
		<div class="box">
			<a class="news-img" href="lesson.php">
				<img src="../assets_student/images/img-news01.jpg" alt="" />
				<div class="mask"></div>
			</a>
			<div class="box-info">
				<h2><a href="lesson.php">Leksyon</a></h2>
			</div>
		</div>
		<div class="box">
			<a class="news-img" href="exam.php">
				<img src="../assets_student/images/img-news02.jpg" alt="" />
				<div class="mask"></div>
			</a>
			<div class="box-info">
				<h2><a href="quiz.php">Pagsusulit</a></h2>
			</div>
		</div>
	</div>
</section>
<?php include_layout_template('student_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
	  // alert('Testing alert');
	  
	  $(".slider li ul a")
	  .each(function(i) {
		if (i != 0) { 
		  $("#beep-two")
			.clone()
			.attr("id", "beep-two" + i)
			.appendTo($(this).parent()); 
		}
		$(this).data("beeper", i);
	  })
	  .mouseenter(function() {
		$("#beep-two" + $(this).data("beeper"))[0].play();
	  });
	$("#beep-two").attr("id", "beep-two0");
	  
	}); 
/*]]>*/
</script>