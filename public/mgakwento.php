<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	 if (!$session->is_logged_in()) { redirect_to("login.php"); }
	
	// Find User 
	$user = Student::find_by_id($_SESSION['user_id']);	
	$stories = Story::find_all_active();

 ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include('header.php'); ?>
    </head>

    <body>

            <div>
                <ul class="tabs">
                    <?php 
                                 foreach($stories as $story){
                                      if($story->user_id == $user->teacher){
                                            ?>
                    
                        <li class="tab col"><a href="#<?php echo $story->id ?> "><?php echo $story->name ?></a></li>
                        <?php
                                      }
                                            }
                                     ?>
                </ul>
            </div>
        <br>
            <?php 
                                 foreach($stories as $story){
                                      if($story->user_id == $user->teacher){
                                     
                                            ?>
                
                <div id="<?php echo $story->id ?>" style="width:600px;height:480px;margin: auto;">
                    <video  controls  style="width:600px;height:480px">
                        <source src="video/<?php echo $story->filename ?>"> </video>
                </div>
                <?php
                                     }
                                            }
                                     ?>
         <a href="welcome.php" class="waves-effect waves-light btn go_back" style="position:absolute;top:600px;left:600px">Bumalik</a> </body>

    </html>