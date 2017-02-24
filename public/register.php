<?php
require_once("../includes/initialize.php");

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

  
  // Check database to see if username/password exist.
	$found_user = User::check_username($_POST['username']);
	
	
	
  if ($found_user) {
            $message = "Username Already exist.";
  } elseif($_POST['password'] != $_POST['rpassword']) {
            $message = "Password did not match.";
  }else{
      $parent = new Magulang();
      $parent->last_name = $_POST['last_name'];
      $parent->first_name = $_POST['first_name'];
      $parent->username   = $_POST['username'];
      $parent->password = $_POST['password'];
      if($parent->save()){ 
          $session->message("Account created, Please login");
          redirect_to('login.php');
      }
      
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
                                    <div class="panel-heading">Parents Registration</div>
                                    <div class="panel-body">
                                        <?php if($message):?> <p class="bg-danger text-danger" style="padding:15px"><?php echo output_message($message); ?></p><?php endif; ?>
                                        
                                        
                                        <form method="post">
                                           <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control lettersonly" required name="first_name" id="first_name" placeholder="First Name">

                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control lettersonly" required  name="last_name" id="last_name" placeholder="Last Name">

                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" maxlenght="16" required name="username" id="username" placeholder="Username">

                                                </div>
                                                
                                  
                                                
                                                <div class="form-group col-md-12">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" required id="password" placeholder="Password">

                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <label for="rpassword">Retype Password</label>
                                                    <input type="password" class="form-control" name="rpassword" required id="rpassword" placeholder="Repeat Password">

                                                </div>
                                            
                                            </div>
                                            <input type="submit" class="btn btn-primary" name="submit" value="Register" style="float:right">
                                            <a class="btn btn-success" href="login.php" role="button">Go to Login</a>
                                            
                                        </form>
                                        
                                    </div>
                                    <div class="panel-footer">
                                        <a href="login_.php">Teacher Login</a> <a href="student_login.php" style="float:right">Student Login</a>            
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

     $('.lettersonly').on('keypress',function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) { 
            event.preventDefault(); 
        }
    });
    
    
    $('.lettersonly').on('blur', function(){
        var node = $(this);
        node.val(node.val().replace(/[^a-zA-Z ]/g,'') );
    });
    
     $('.numbersonly').on('keypress',function(event){
        var inputValue = event.which;
        // numbers only.
        if(!(inputValue >= 48 && inputValue <= 57)) { 
            event.preventDefault(); 
        }
    });
    
     $('.numbersonly').on('blur', function(){
        var node = $(this);
        node.val(node.val().replace(/[^0-9]/g,'') );
    });
    

</script>