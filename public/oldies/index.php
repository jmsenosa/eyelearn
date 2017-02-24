<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	 if (!$session->is_logged_in()) { redirect_to("login_student.php"); }
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
 ?>
<?php include_layout_template('header.php'); ?>
<section id="main">				
	<div class="widget-boxes news">
		<h2>Kamusta <span style='color: #FFA500; background: transparent; margin-left: -10px;' ><?php echo ucwords($user->first_name); ?>!</span> <br /> <a href='admin/logout.php'> Logout</a></h2>
		<div class="box">
			<!--<a class="news-img" href="student.php">
				<img src="assets_student/images/img-news01.jpg" alt="" />
				<div class="mask"></div>
			</a>-->
			<img src="images/12735984_1224084410939285_929329037_n.jpg" style='width: 230px;' alt="" />
			<div class="box-info">
				<h2><a href="student.php">Leksyon</a></h2>
			</div>
		</div>
		<div class="box">
			<img src="images/11260108_734055886722099_2065749052_n.gif" style='width: 200px;' alt="" />
			<div class="box-info">
				<h2><a href="quiz.php">Pagsusulit</a></h2>
			</div>
		</div>
		<div class="box">
			<img src="images/12735984_1224084410939285_929329037_n.jpg" style='width: 200px;' alt="" />
			<div class="box-info">
				<h2><a href="story.php">Salaysay Kuwento</a></h2>
			</div>
		</div>
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