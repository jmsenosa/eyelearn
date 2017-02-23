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
	$user_id = ($_GET['id'] ? $_GET['id']:0);
	$user = User::find_by_id($user_id); 
	
	// Verification
	// if(!$user) {
		// $session->message("The User could not be located. Please try to select other <strong>User</strong>");
		// redirect_to('index.php');
	// }
	
	
	
	if(isset($_POST['submit'])) {
		//Get user id to be edit	
		$user = User::find_by_id($_POST['id']);
		$user->username		= $_POST['username'];
			$user->password		= $_POST['password'];
			$user->first_name	= $_POST['first_name'];
			$user->middle_name	= $_POST['middle_name'];
			$user->last_name	= $_POST['last_name'];
			$user->email 		= $_POST['email'];
			$user->phone 		= $_POST['phone'];
			$user->address 		= $_POST['address'];
            $user->fromtime 		= $_POST['fromtime'];
            $user->totime 	= $_POST['totime'];
			$user->active 		= $_POST['active'];
		$user->last_update	= date('Y-m-d h:i:s');
		if($user->save()){
			// Success
			log_action('User Update User', "{$session_user->full_name()} Update User [{$_POST['username']}].");
			$session->message("The username <strong>{$_POST['username']}</strong> was successfully updated.");
			redirect_to('index.php');
		} else {
			$session->message("Unable to update <strong>{$_POST['username']}</strong>.");
			redirect_to('index.php');
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
				<div class="alert alert-info" role="alert">
				 <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please input right date format.
				</div>
			  <?php endif; ?>
			<form class="form-horizontal" action="update.php"   method="POST">
			   <input type='hidden' name='id' value='<?php echo $user->id; ?>'/>
			  <div class="form-group">
				<label for="username" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="username" required name="username"  value='<?php echo $user->username; ?>' />
				</div>
				<label for="password" class="col-sm-1 control-label"> Password</label>
				<div class="col-sm-4">
				  <input type="password" class="form-control" id="password" required name="password"  value='<?php echo $user->password; ?>' />
				</div>
			  </div>
			 <div class="form-group">
				<label for="first_name" class="col-sm-2 control-label"> First Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control lettersonly" id="first_name" name="first_name" required  value='<?php echo $user->first_name; ?>' />
				</div>
				<label for="last_name" class="col-sm-1 control-label"> Last Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control lettersonly" id="last_name" name="last_name" required value='<?php echo $user->last_name; ?>' />
				</div>	
			  </div>
			  <div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="email" name="email" required value='<?php echo $user->email; ?>' />
				</div>
				<label for="phone" class="col-sm-1 control-label"> Phone </label>
				<div class="col-sm-4">
				  <input type="text" class="form-control numbersonly" id="phone" name="phone" required value='<?php echo $user->phone; ?>' />
				</div>	
			  </div>
			 <div class="form-group">
				<label for="address" class="col-sm-2 control-label"> Address</label>
				<div class="col-sm-4">
					<textarea class="form-control" rows="3" class="form-control" id="address" name="address"  /><?php echo $user->address; ?></textarea>
				</div>
				
			  </div>
			  <div class="form-group">
					<label for="status" class="col-sm-2 control-label">Active</label>
				<div class="col-sm-4">
				   Active <input type="radio" name="active" id="active" value=1  <?php echo $user->active==1 ? "checked='checked'":"" ?>   />
				 Inactive <input type="radio" name="active" id="active" value=0  <?php echo $user->active==0 ? "checked='checked'":"" ?> />
				</div>
			  </div>
               <div class="form-group">
                <label for="fromtime" class="col-sm-2 control-label">Schedule</label>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-xs-6"><input type="time" required="required" name="fromtime" min="06:00" value="06:00" max="20:00" class="form-control" id="fromtime"></div>
                        <div class="col-xs-6"><input type="time" required="required" name="totime" min="10:00" value="10:00" class="form-control" id="totime"></div>
                    </div>
                </div>
            </div>
			  <hr />
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				   <button type="submit" class="btn btn-success" name="submit" onclick="return confirm('Are you sure you want to save changes?');">Save</button>
				  <button type="button" class="btn btn-danger" onClick='window.location.href = "index.php";' >Cancel </button>
				</div>
			  </div>
			</form>
			<hr />
			
		</div>
        </div>
        <!-- /.row -->
  <script type="text/javascript">
    $(document).ready(function(){
        $("#fromtime").click(function(){
            var timeVal = $(this).val();
            if (timeVal.length > 0) {
                var fromtime =  parseInt(timeVal.replace(":",""));

                if (fromtime == 0 || fromtime == "0") 
                {
                    totime = "00:00";
                }
                else
                { 
                    totime = fromtime + 400;

                    if (totime.toString().length == 3) {
                        totime = "0"+totime;
                        totime = totime.toString().match(/.{1,2}/g);
                        totime = totime.join(":");
                    }else{
                        totime = totime.toString().match(/.{1,2}/g);
                        totime = totime.join(":");
                    }
                    
                    if (totime == "24:00") {
                        totime = "00:00";
                    }
                }

                $("#totime").val(totime).attr("min",totime);
            } 
        });
    })
</script>

<?php include_layout_template('sub_footer.php'); ?>
		
