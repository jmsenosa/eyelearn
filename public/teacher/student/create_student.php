<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	 error_reporting(E_ALL);
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find user by id
	$session_user = User::find_by_id($_SESSION['user_id']); 
	
	// Find all user type
	$user_types = User_type::find_all_except_admin();
 
    if(isset($_POST['submit'])) {
		$check_username = Student::check_username($_POST['lrn']);
		
		if($check_username){
			$message = "The <strong>{$_POST['lrn']}</strong> is already taken";
		}elseif(is_numeric($_POST['first_name'])){
			$session->message("Unable to insert numeric character on Firt Name");
			redirect_to('create_student.php');
        }elseif(strlen($_POST['lrn']) < 11){
            $session->message("Invalid LRN");
            redirect_to('create_student.php');
        
		}else{
			$user = new Student();
			$user->lrn		= $_POST['lrn'];
			$user->first_name	= $_POST['first_name'];
			$user->middle_name	= $_POST['middle_name'];
			$user->last_name	= $_POST['last_name'];
			$user->address 		= $_POST['address'];
			$user->active 		= $_POST['active'];
            $user->section 		= $_POST['section'];
            $user->parent_last_name 		= $_POST['parent_last_name'];
            $user->parent_first_name 		= $_POST['parent_first_name'];
            $user->teacher 		= $_SESSION['user_id'];
            $user->sy         = date('Y');
 
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong><i class="fa fa-info-circle"></i> Warning!</strong>
                        <?php echo output_message($message); ?>
                    </div>
                    <?php else: ?>
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please input <strong>User</strong> details.
                        </div>
                        <?php endif; ?>
                            <form class="form-horizontal" method="POST">
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label"> First Name </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control lettersonly" id="first_name" required name="first_name" placeholder="First name" value='<?php echo @$_POST['first_name'] ? $_POST['first_name'] : ''; ?>' />
                                    </div>
                                    <label for="middle_name" class="col-sm-1 control-label"> Middle Name </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle name" value='<?php echo @$_POST['middle_name'] ? $_POST['middle_name'] : ''; ?>' />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="last_name" class="col-sm-2 control-label"> Last Name </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="last_name" required name="last_name" placeholder="Last name" value='<?php echo @$_POST['last_name'] ? $_POST['last_name'] : ''; ?>' />
                                    </div>
                                    <label for="username" class="col-sm-1 control-label">LRN</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control numbersonly" required maxlength="12" id="username" name="lrn" placeholder="LRN" value='<?php echo @$_POST['lrn'] ? $_POST['lrn'] : ''; ?>' />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-2 control-label"> Address</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" rows="3" class="form-control"required  id="address" name="address" placeholder="Address" value='<?php echo @$_POST['address'] ? $_POST['address'] : ''; ?>' /></textarea>
                                    </div>
                                    <label for="section" class="col-sm-1 control-label" >Section </label>
                                    <div class="col-sm-4">
                                        <select name="section" class="form-control" required>
                                            <option>Select Section</option>
                                            <?php
                                            $sections = Section::find_all();
                                            foreach($sections as $section):
                                                // if($section->created_by == $_SESSION['user_id']):
                                                ?>
                                            <option value="<?php echo $section->section ?>"><?php echo $section->section ?></option>
                                            <?php
                                                // endif;
                                            endforeach;
                                            ?>
                                            
                                        </select>
                                     </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-2 control-label">Parent First Name </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="parent_first_name" required name="parent_first_name" placeholder="First name" value='<?php echo @$_POST['parent_last_name'] ? $_POST['parent_last_name'] : ''; ?>' />
                                    </div>
                                    <label for="middle_name" class="col-sm-1 control-label">Parent Last Name </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="parent_last_name" required name="parent_last_name" placeholder="Middle name" value='<?php echo @$_POST['parent_last_name'] ? $_POST['parent_last_name'] : ''; ?>' />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-4">
                                        
                                        <input type="radio" name="active" id="active" value=1 checked='checked' /> Active<br> 
                                        <input type="radio" name="active" id="active" value=0 /> Inactive
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-4">
                                        <!-- <button type="submit" class="" name="submit" value=""><i class="fa fa-plus "></i> </button> -->
                                        <input type="submit" name="submit" class="btn btn-primary" value="Add User">
                                    </div>
                                </div>
                            </form>
                            <hr />

            </div>
        </div>
        <?php include_layout_template('sub_footer.php'); ?>
