<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find user by id
	$session_user = User::find_by_id($_SESSION['user_id']); 
	
	// Find all user type
	$user_types = User_type::find_all();
	
	if(isset($_POST['submit'])) {
		// print_r($_POST);
		$check_username = User::check_username($_POST['username']);
		
		if($check_username){
			$session->message("The <strong>{$_POST['username']}</strong> is already taken");
			redirect_to('create_teacher.php');
		}elseif($_POST['repassword']!=$_POST['password']){
			$session->message("Password not match");
			redirect_to('create_teacher.php');
		}elseif(strlen($_POST['phone']) != 11){
			$session->message("Invalid Phone number. Please insert numeric 11 digit only");
			redirect_to('create_teacher.php');
		}else{
			$user = new User();
			$user->type_id		= 2;
			$user->username		= $_POST['username'];
			$user->password		= $_POST['password'];
			$user->first_name	= $_POST['first_name'];
			$user->middle_name	= $_POST['middle_name'];
			$user->last_name	= $_POST['last_name'];
			$user->email 		= $_POST['email'];
			$user->phone 		= $_POST['phone'];
			$user->address 		= $_POST['address'];
            $user->fromtime 		= $_POST['from'];
            $user->totime 	= $_POST['to'];
			$user->active 		= $_POST['active'];
			if($user->save()) {
				log_action('User Create User', "{$session_user->full_name()} Create User [{$_POST['username']}].");
				$session->message("Successfully created.");
				redirect_to('index.php');
			} else {
				$session->message("Unable to create.");
				redirect_to('index.php');
			}
		}
		
		
	}
	
	// print_r($_POST);
?>
    <?php include_layout_template('sub_header.php'); ?>
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-user "></i> User <small></small></h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Dashboard</a></li>
                    <li class="active"> Add</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <?php if($message):?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong><i class="fa fa-info-circle"></i> Warning!</strong>
                        <?php echo output_message($message); ?>
                    </div>
                    <?php else: ?>
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please input <strong>User</strong> details. </div>
                        <?php endif; ?>
                            <form class="form-horizontal" action="create_teacher.php" method="POST">
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label"> First Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" required class="form-control lettersonly" id="first_name" name="first_name" placeholder="First name" value='<?php echo @$_POST[' first_name '] ? $_POST['first_name '] : ''; ?>' /> </div>
                                    <label for="middle_name" class="col-sm-1 control-label"> Middle Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control lettersonly" id="middle_name" name="middle_name" placeholder="Middle name" value='<?php echo @$_POST[' middle_name '] ? $_POST['middle_name '] : ''; ?>' /> </div>
                                </div>
                                <div class="form-group">
                                    <label for="last_name" class="col-sm-2 control-label"> Last Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" required class="form-control lettersonly" id="last_name" name="last_name" placeholder="Last name" value='<?php echo @$_POST[' last_name '] ? $_POST['last_name '] : ''; ?>' /> </div>
                                    <label for="username" class="col-sm-1 control-label">Username</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="username" name="username" required placeholder="Username" value='<?php echo @$_POST[' username '] ? $_POST['username '] : ''; ?>' /> </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label"> Password</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password" value='<?php echo @$_POST[' password '] ? $_POST['password '] : ''; ?>' /> </div>
                                    <label for="repassword" class="col-sm-1 control-label"> Re-Type Password</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="repassword" name="repassword" required placeholder="Re-Type Password" value='<?php echo @$_POST[' repassword '] ? $_POST['repassword '] : ''; ?>' /> </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-2 control-label"> Address</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" rows="3" class="form-control" id="address" name="address" placeholder="Address" value='<?php echo @$_POST[' address '] ? $_POST['address '] : ''; ?>' /></textarea>
                                    </div>
                                    <label for="email" class="col-sm-1 control-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="email"  name="email" required placeholder="Email" value='<?php echo @$_POST[' email '] ? $_POST['email '] : ''; ?>' /> </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label"> Phone </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control numbersonly" maxlength="11" id="phone" required name="phone" placeholder="Phone" value='<?php echo @$_POST[' phone '] ? $_POST['phone '] : ''; ?>'/> </div>
                                    <label for="status" class="col-sm-1 control-label">Status</label>
                                    <div class="col-sm-4"> Active
                                        <input type="radio" name="active" id="active" value=1 checked='checked' /> Inactive
                                        <input type="radio" name="active" id="active" value=0 /> </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label"> Schedule </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="from">
                                            <option value="08:00">8 AM</option>
                                            <option value="09:00">9 AM</option>
                                            <option value="10:00">10 AM</option>
                                            <option value="11:00">11 AM</option>
                                            <option value="12:00">12 PM</option>
                                            <option value="13:00">1 PM</option>
                                            <option value="14:00">2 PM</option>
                                            <option value="15:00">3 PM</option>
                                            <option value="16:00">4 PM</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <select class="form-control" name="to">
                                            <option value="08:00">8 AM</option>
                                            <option value="09:00">9 AM</option>
                                            <option value="10:00">10 AM</option>
                                            <option value="11:00">11 AM</option>
                                            <option value="12:00">12 PM</option>
                                            <option value="13:00">1 PM</option>
                                            <option value="14:00">2 PM</option>
                                            <option value="15:00">3 PM</option>
                                            <option value="16:00">4 PM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-4">
                                        <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-plus "></i> Add Teacher</button>
                                    </div>
                                </div>
                            </form>
                            <hr /> </div>
        </div>
        <?php include_layout_template('sub_footer.php'); ?>