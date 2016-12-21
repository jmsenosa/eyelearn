<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// !$session->is_logged_in() ? redirect_to("login.php"):redirect_to("index.php");
	
	$lessons = Lesson_dtl::find_by_lesson($_GET['id']); 
	$ctr = 0;
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
 ?>
 
<!--[if lte IE 8]> <html class="oldie" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="format-detection" content="telephone=no">
	<title>Eye Learning</title>
	<link href='http://fonts.googleapis.com/css?family=Gochi+Hand|Arvo:400,700' rel='stylesheet' type='text/css'>
	<link href="assets_student/css/jquery.bxslider.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets_student/css/style.css" />
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body style=' background: #00ff00 url("images/bg.jpg") no-repeat fixed center; '>

	<div id="wrapper" class="gallery">
		<div class="wrapper-holder">
			<header id="header">
				<div class="left-part"></div>
				<a id="logo" href="index.html">Eye Learning</a>
				<div class="bar-holder">
					<a class="menu_trigger" href="#">menu</a>
				</div>
			</header>
			<div class="container">
				<section id="main">
					<div class="widget-boxes news">
						<h2>Kamusta <span style='color: #FFA500; background: transparent; margin-left: -10px;' ><?php echo ucwords($user->first_name); ?>!</span> <br />
						<a href='student.php'> Lesson</a> | <a href='admin/logout.php'> Logout</a></h2>
					</div>
					<ul class="slider sortable-grid">
						<li>
							<ul>
							<?php foreach($lessons as $lesson): ?>
							<li class="grid-item parties">
								<a href="#"><img src='<?php echo $lesson->image_path(); ?>'>
								<input type="button" value="PLAY"  onclick="play()">
								<audio id="audio<?php echo $lesson->id; ?>" src="audio/<?php $audio = Audio::find_by_id($lesson->audio_id); echo $audio->filename; ?>" ></audio>
								<div class="mask"></div></a>
								<p style='font-size: 30px;'><?php echo ucwords($lesson->name); ?></p><br />
								 <script>
									  function play(){
										   var audio = document.getElementById("audio<?php echo $lesson->id; ?>");
										   audio.play();
													 }
									   </script>
							</li>
							<?php $ctr++; ?>
							<?php endforeach; ?>
					</ul>
				</section>
			</div>
			<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		</div>
		
	</div>
	
	<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
	<script type="text/javascript" src="assets_student/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="assets_student/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="assets_student/js/jquery.placeholder.js"></script>
	<script type="text/javascript" src="assets_student/js/imagesloaded.pkgd.min.js"></script>
	<script type="text/javascript" src="assets_student/js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="assets_student/js/main.js"></script>
</body>
</html>


				
			