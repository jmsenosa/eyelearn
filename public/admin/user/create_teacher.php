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
        
        if($_POST['username']=='' || $_POST['password']=='' || $_POST['first_name']=='' || $_POST['last_name']=='' || $_POST['email']=='' || $_POST['phone']=='' || $_POST['address']==''){
            $session->message("Please input data on required fileds.");
            // redirect_to('create.php');
        }elseif($check_username){
            $session->message("The <strong>{$_POST['username']}</strong> is already taken");
            // redirect_to('create.php');
        }elseif($_POST['repassword'] != $_POST['password']){
            $message = "Password not match"; 
            // redirect_to('create.php');
        }else{
            $user = new User();
            $user->type_id      = 2;
            $user->username     = $_POST['username'];
            $user->password     = $_POST['password'];
            $user->first_name   = $_POST['first_name'];
            $user->middle_name  = $_POST['middle_name'];
            $user->last_name    = $_POST['last_name'];
            $user->email        = $_POST['email'];
            $user->phone        = $_POST['phone'];
            $user->address      = $_POST['address'];
            $user->active       = $_POST['active'];
            $user->fromtime     = $_POST['fromtime'].":00";
            $user->totime       = $_POST['totime'].":00";

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
<?php include_layout_template( 'sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user "></i> User <small></small></h1>
        <ol class="breadcrumb">
            <li><a href="../index.php">Dashboard</a>
            </li>
            <li class="active"> Add</li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <?php if($message):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <strong><i class="fa fa-info-circle"></i> Warning!</strong>
            <?php echo output_message($message); ?>
        </div>
        <?php else: ?>
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Please input <strong>User</strong> details.
        </div>
        <?php endif; ?>
        <form class="form-horizontal" action="create_teacher.php" method="POST">
            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label"> First Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control lettersonly" id="first_name" name="first_name" placeholder="First name" value='<?php echo @$_POST['first_name'] ? $_POST['first_name'] : ''; ?>' required />
                </div>
                <label for="middle_name" class="col-sm-1 control-label"> Middle Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control lettersonly" id="middle_name" name="middle_name" placeholder="Middle name" value='<?php echo @$_POST['middle_name'] ? $_POST['middle_name'] : ''; ?>' />
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="col-sm-2 control-label"> Last Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control lettersonly" id="last_name" name="last_name" placeholder="Last name" value='<?php echo @$_POST['last_name'] ? $_POST['last_name'] : ''; ?>' required/>
                </div>
                <label for="username" class="col-sm-1 control-label">Username</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value='<?php echo @$_POST['username'] ? $_POST['username'] : ''; ?>' required />
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label"> Password</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"  required />
                </div>
                <label for="repassword" class="col-sm-1 control-label"> Re-Type Password</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re-Type Password"  required />
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label"> Address</label>
                <div class="col-sm-4">
                    <textarea class="form-control" rows="3" class="form-control" id="address" name="address" placeholder="Address"/><?php echo @$_POST['address'] ? $_POST['address'] : ''; ?></textarea>
                </div>
                <label for="email" class="col-sm-1 control-label">Email</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value='<?php echo @$_POST['email'] ? $_POST['email'] : ''; ?>' required />
                </div>
            </div>


            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label"> Phone </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control numbersonly" maxlength="12" id="phone" name="phone" placeholder="Phone" value='<?php echo @$_POST['phone'] ? $_POST['phone'] : ''; ?>' required />
                </div>
                <label for="status" class="col-sm-1 control-label">Status</label>
                <div class="col-sm-4">
                    Active
                    <input type="radio" name="active" id="active" value=1 checked='checked' /> Inactive
                    <input type="radio" name="active" id="active" value=0 />
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
                    <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-plus "></i> Add Teacher</button>
                </div>
            </div>
        </form>
        <hr />

    </div>
</div>
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
<?php include_layout_template( 'sub_footer.php'); ?>