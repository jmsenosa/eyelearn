<?php
require_once("../includes/initialize.php");

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

  
  // Check database to see if username/password exist.
	$found_user = Magulang::authenticate_parent($_POST['username'],$_POST['password']);
	
	
	
  if ($found_user) {
	
			$session->login($found_user);
			log_action('User Log in', "{$found_user->full_name()} Log in.");
			redirect_to("parents/index.php");  

  } else {
    $message = "Invalid username or password";
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
	<title>Eye Learn</title>
	<link href='http://fonts.googleapis.com/css?family=Gochi+Hand|Arvo:400,700' rel='stylesheet' type='text/css'>
	<link href="assets_student/css/jquery.bxslider.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets_student/css/style.css" />
	<link rel="stylesheet" href="assets_student/css/custom.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body style=' background: #00ff00 url("images/bg.jpg") no-repeat fixed center; '>
	<div id="wrapper" class="about">
		<div class="wrapper-holder">
			<section class="promo" >
				<div class="slider-wrap">
					<ul class="slider">
						<li>
							<img class="slide" src="images/eyelearnlogo.png" style='width: 400px;  margin-left: 130px; margin-top: 130px' alt="">
							
							<div class="slide-info">
								<div class="col_wrap">
                                        <div class="panel panel-info">
                                    <div class="panel-heading">User Login</div>
                                    <div class="panel-body">
                                        <?php if($message):?> <p class="bg-danger text-danger" style="padding:15px"><?php echo output_message($message); ?></p><?php endif; ?>
                                        <h3>Parents Login</h3>
                                        <hr>
                                        <form action="login.php" method="post">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="username">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                            </div>
                                            <input type="submit" class="btn btn-primary" name="submit" value="Login" style="float:right">
                                            <a class="btn btn-success" href="register.php" role="button">Create Account</a>
                                            
                                        </form>
                                        
                                    </div>
                                    <div class="panel-footer">
                                        <a href="login_.php">Teacher Login</a> <a href="login_student.php" style="float:right">Student Login</a>            
                                    </div>
                                </div>
                
							</div>
							</div>
						</li>
					</ul>
				</div>
                
            
			</section>
		
		</div>
	</div>
	
	<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="assets_student/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="assets_student/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/mask.js"></script>
</body>
</html>
<script>

   $('#stud').mask('99-9999-9999'); 

</script>