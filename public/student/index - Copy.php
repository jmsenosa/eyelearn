<?php 
	// Initialize Page
	require_once('../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("login.php"); }
	
	
	$lessons = Lesson::find_all();	
	
 ?>
 <!DOCTYPE html>
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
	<link href="../assets_student/css/jquery.bxslider.css" rel="stylesheet" />
	<link rel="stylesheet" href="../assets_student/css/style.css" />
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="wrapper" class="gallery">
		<div class="wrapper-holder" >
			<header id="header">
				<div class="left-part"></div>
				<a id="logo" href="index.html">Eye Learning</a>
				
			</header>
			<!--<div class="dvdr"></div>-->
			<div class="container"  style='min-height: 1000px;' >
				<section id="main">
		
					<div class="widget-boxes news">
						<?php foreach($lessons as $lesson):?>
							<h2><a href="lesson.php?id=<?php echo $lesson->id; ?>"  ><?php echo ucwords($lesson->name); ?></a></h2>
							<?php endforeach; ?>
						
					</div>
				</section>
			</div>
		</div>
		
		
		
		<div class="top-blue-border"></div>
		<footer id="footer">
			<div class="footer-holder">
				<div class="footer-frame">
					<div class="footer-content">
						<div class="col-holder">
							<div class="col_wrap">
								<div class="col">
									<h3>Our address</h3>
									<address class="map">1186 Madison Ave, NY 10173</address>
									<address class="mail"><a href="mailto:contact@kidschool.com">contact@kidschool.com</a></address>
									<address class="phone">(580) 845 982 431</address>
								</div>
							</div>
							<div class="col_wrap">
								<div class="col">
									<h3>Latest posts</h3>
									<ul class="posts">
										<li><a href="#">Dignissimos ducimus blanditiis</a></li>
										<li><a href="#">Praesentium voluptatum deleniti</a></li>
										<li><a href="#">Atque corrupti quos dolores</a></li>
										<li><a href="#">Molestias excepturi sint occaecati</a></li>
										<li><a href="#">Cupiditate provident similique</a></li>
									</ul>
								</div>
							</div>
							<div class="col_wrap">
								<div class="col">
									<h3>Follow us</h3>
									<p class="social">Accusamus iusto odio dignissimos ducimus qui blanditiis praesentium</p>
									<ul class="social">
										<li><a class="facebook" href="#">Facebook</a></li>
										<li><a class="google" href="#">Google+</a></li>
										<li><a class="twitter" href="#">Twitter</a></li>
										<li><a class="pinterest" href="#">Pinterest</a></li>
									</ul>
								</div>
							</div>
							<div class="col_wrap">
								<div class="col">
									<h3>Newsletter</h3>
									<p class="form-newsletter">Voluptas sit aspernatur consequuntur.</p>
									<form action="#" class="form-newsletter">
										<fieldset>
											<input type="email" placeholder="Your email..." />
											<input class="btn white" type="submit" value="Subscribe" />
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="footer-bottom">
						<div class="holder">
							<p>Copyright 2014 Kid’ school. All rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>	
	</div>
	
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../assets_student/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="../assets_student/js/jquery.placeholder.js"></script>
	<script type="text/javascript" src="../assets_student/js/imagesloaded.pkgd.min.js"></script>
	<script type="text/javascript" src="../assets_student/js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="../assets_student/js/main.js"></script>
</body>
</html>
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