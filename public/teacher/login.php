<?php
require_once("../../includes/initialize.php");

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
  // Check database to see if username/password exist.
	$found_user = User::authenticate($username, $password);
	//print_r($found_user->type);
	
	
	
  if ($found_user) {
	$user_type = User_type::find_by_id($found_user->type_id);	
	
	if($found_user->active==1){
		$session->login($found_user);
		log_action('User Log in', "{$found_user->full_name()} Log in.");
		redirect_to("index.php");  
	  }else{
		log_action('User Sign in - Inactive', "{$found_user->full_name()} Inactive.");
		$message = "Sorry, your account is not active.";
	  }
  } else {
    $message = "Invalid username or password.";
  }
  
} else { // Form has not been submitted.
  $username = "";
  $password = "";
}

?><!DOCTYPE html>
<!--[if lte IE 8]> <html class="oldie" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="format-detection" content="telephone=no">
	<title>Kid' school - Home</title>
	<link href='http://fonts.googleapis.com/css?family=Gochi+Hand|Arvo:400,700' rel='stylesheet' type='text/css'>
	<link href="assets/css/jquery.bxslider.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="stylesheet" href="assets/css/custom.css" />
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="wrapper" class="about">
		<div class="wrapper-holder">
			<section class="promo" style='margin-top: 100px;' >
				<div class="slider-wrap">
					<ul class="slider">
						<li>
							<img class="slide" src="assets/images/img-slide01.jpg" alt="">
							<img class="slide-mask" src="assets/images/bg_slider-mask.png" alt="">
							<div class="slide-info">
								<div class="col_wrap">
								<div class="col">
									<h1 style='margin-top: -80px; margin-bottom: -50px;' ><a href="#">Log in</a></h1>
									<?php if($message):?> <p class="form-newsletter" style='color: #EA6B6E; font-size: 18px; '><?php echo output_message($message); ?></p><?php else: ?> <p class="form-newsletter" style='font-size: 18px;  ' >Please input your Username and Password</p><?php endif; ?>
									<form  action="login.php" method="POST"   class="form-newsletter">
										<fieldset>
											<input type="text" name="username"  placeholder="Username" />
											<input type="password" name="password"  placeholder="password" />
											<input class="btn red" type="submit"  name='submit'value="Subscribe" />
										</fieldset>
									</form>
								</div>
							</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
		
		</div>
	</div>
	
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>