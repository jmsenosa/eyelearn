<?php
	// Initialize 
	require_once('../../includes/initialize.php');
	// Check if User is Logged in to view this page.
	
	if (!$session->is_logged_in()) { redirect_to("login.php"); }
	//!$session->is_logged_in() ? redirect_to("../login.php") : redirect_to("index.php"); 

	// find user info
	$user = Magulang::find_by_id($_SESSION['user_id']);
    $lesson = Lesson::find_all();
    if(isset($_POST['action'])){
        $student = Student::find_ifexist($_POST['first_name'],$_POST['last_name'],$_POST['lrn']);
        if($student){
            $parentstud = new Parentstud();
            $parentstud->parent_id = $_SESSION['user_id'];
            $parentstud->student_id = $student->id;
            $parentstud->save();
            $message = "Student added successfully.";
            $session->message("Student added successfully.");
            
                
        }
        else{
            $message = "Student information does not exist.";
            $session->message("Student information does not exist.");
        }
    }
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Eye Learn</title>
    <!-- Bootstrap Core CSS -->
    <link href="../materialize.min.css" rel="stylesheet">
    <link href="../animate.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../materialize.min.js"></script>
</head>

    <style>
        .side-nav a:hover{
            background-color: #039be5   !important;
        }
    
    </style>
    
<body>
    <div class="navbar-fixed ">
        <nav class="light-blue darken-2">
            <div class="nav-wrapper container">
                <ul class="left">Hello! Mr/Mrs. <?php echo $user->last_name ?></ul>
                <ul class="right">
                   <li><a href="index.php">Home</a></li>
                  
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="#" data-activates="slide-out" class="button-collapse show-on-large">Lesson Progress</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    
                </ul>
            </div>
        </nav>
    </div>

    
    
    <div class="container"><br><br>

    <?php if($message == "Student added successfully."):?><span class="green-text text-darken-2"><?php echo $message; ?></span><?php endif; ?>
           <?php if($message == "Student information does not exist."):?><span class="red-text text-darken-2"><?php echo $message; ?></span><?php endif; ?>
        <div clas="row valign-wrapper">
          <form method="post" class="col s12">
               <div clas="row">
                <div class="input-field col s6">
                  <input id="first_name" type="text" required name="first_name" class="validate lettersonly">
                  <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="text" required name="last_name" class="validate lettersonly">
                  <label for="last_name">Last Name</label>
                </div> 
               </div> 
        
                <div class="input-field col s12">
                  <input id="lrn" type="text" name="lrn" required class="validate numbersonly">
                  <label for="lrn">LRN</label>
                </div>
        
               <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
              </button>
         
            
            
        </form>                   
      </div>
        
    </div>
</body>

</html>

<script>
$(".button-collapse").sideNav();
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