<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Security
	// if(empty($_GET['id'])) {
	  // $session->message("No <strong> User ID</strong> was provided.");
	  // redirect_to('index.php');
	// }
	
	// Find user by id
	$session_user = User::find_by_id($_SESSION['user_id']); 
	
	// Find all user type
	$user_types = User_type::find_all();
	
	// Find  User
	$user = User::find_by_id($_SESSION['user_id']); 
	
	// Verification
	// if(!$user) {
		// $session->message("The User could not be located. Please try to select other <strong>User</strong>");
		// redirect_to('index.php');
	// }
	
	
	
	if(isset($_POST['submit'])) {
		//Get user id to be edit	
        if($_POST['username']=='' || $_POST['password']=='' || $_POST['first_name']=='' || $_POST['last_name']=='' || $_POST['email']=='' || $_POST['phone']=='' || $_POST['address']==''){
			$session->message("Please input data on required fileds.");
			redirect_to('create.php');
		}elseif($check_username){
			$session->message("The <strong>{$_POST['username']}</strong> is already taken");
			redirect_to('create.php');
		}elseif(is_numeric($_POST['first_name'])){
			$session->message("Unable to insert numeric character on Firt Name");
			redirect_to('create.php');
		}else{
		$user = User::find_by_id($_POST['id']);
		$user->username 	= $_POST['username'];
		$user->password 	= $_POST['password'];
		$user->first_name   = $_POST['first_name'];
		$user->middle_name   = $_POST['middle_name'];
		$user->last_name 	= $_POST['last_name'];
		$user->email 		= $_POST['email'];
		$user->phone 		= $_POST['phone'];
		$user->address 		= $_POST['address'];
		$user->last_update	= date('Y-m-d h:i:s');
		if($user->save()){
			// Success
			log_action('User Update Profile', "{$session_user->full_name()} Updated profile");
			$session->message("The username <strong>{$_POST['username']}</strong> was successfully updated.");
			redirect_to('index.php');
		} else {
			$session->message("Unable to update <strong>{$_POST['username']}</strong>.");
			redirect_to('index.php');
		}
	}
    }

?>

<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-user "></i> User <small></small></h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dashboard</a></li>
				<li class="active"> Edit</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->
	<!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
			  <?php if($message):?>
			  <div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <?php echo output_message($message); ?> 
			  </div>
			  <?php else: ?>

			  <?php endif; ?>
			<form class="form-horizontal"  method="POST">
			   <input type='hidden' name='id' value='<?php echo $user->id; ?>'/>
			  <div class="form-group">
				<label for="username" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="username" name="username"  value='<?php echo $user->username; ?>' />
				</div>
				<label for="password" class="col-sm-1 control-label"> Password</label>
				<div class="col-sm-4">
				  <input type="password" class="form-control" id="password" name="password"  value='<?php echo $user->password; ?>' />
				</div>
			  </div>
			 <div class="form-group">
				<label for="first_name" class="col-sm-2 control-label"> First name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control lettersonly" id="first_name" name="first_name"  value='<?php echo $user->first_name; ?>' />
				</div>
				<label for="last_name" class="col-sm-1 control-label"> Last </label>
				<div class="col-sm-4">
				  <input type="text" class="form-control lettersonly" id="last_name" name="last_name"  value='<?php echo $user->last_name; ?>' />
				</div>	
			  </div>
			  <div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="email" name="email"  value='<?php echo $user->email; ?>' />
				</div>
				<label for="phone" class="col-sm-1 control-label"> Phone </label>
				<div class="col-sm-4">
				  <input type="text" class="form-control numbersonly" maxlength="11" id="phone" name="phone"  value='<?php echo $user->phone; ?>' />
				</div>	
			  </div>
			 <div class="form-group">
				<label for="address" class="col-sm-2 control-label"> Address</label>
				<div class="col-sm-4">
					<textarea class="form-control" rows="3" class="form-control" id="address" name="address"  /><?php echo $user->address; ?></textarea>
				</div>
			  </div>
			  <hr />
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				   <button type="submit" class="btn btn-success" name="submit" onclick="return confirm('Are you sure you want to save changes?');">Save</button>
				  <button type="button" class="btn btn-danger" onClick='window.location.href = "../index.php";' >Cancel </button>
				</div>
			  </div>
			</form>
			<hr />
			
		</div>
        </div>
        <!-- /.row -->
  

<?php include_layout_template('sub_footer.php'); ?>
		
