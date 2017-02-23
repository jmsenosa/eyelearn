<?php
    // Initialize Page
    require_once('../../../includes/initialize.php');
    error_reporting(E_ALL);
    // Check if Logged in. If not the page will go to Signin page
    if (!$session->is_logged_in()) { redirect_to("signin.php"); }
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    // Find user by id
    $session_user = User::find_by_id($_SESSION['user_id']);
    $parents = Magulang::get_all();
    // Find all user type
    $student_info = Student::find_by_id($_GET['id']);
    $user_types = User_type::find_all_except_admin();
    if(isset($_POST['submit'])) {
        // print_r($_POST);
        
        if(is_numeric($_POST['first_name'])){
            $session->message("Unable to insert numeric character on Firt Name");
            redirect_to('update.php?id='.$_GET['id']);
        }else{
            $user = new Student();
            $user->id       = $_GET['id'];
            $user->lrn = $_POST['LRN'];
            $user->first_name   = $_POST['first_name'];
            $user->middle_name  = $_POST['middle_name'];
            $user->last_name    = $_POST['last_name'];
            $user->address      = $_POST['address'];
            $user->active       = $_POST['active'];
            $user->section      = $_POST['section']; 
            $user->teacher      = $_SESSION['user_id'];
            $user->sy         = date('Y');
           
            if($user->save()) {
                log_action('User Create User', "{$session_user->full_name()} Create User [{$_POST['username']}].");
                $session->message("Successfully created.");
                $mysql = "SELECT * FROM parentstud WHERE parent_id IN (".implode(',', $_POST['parents']).") AND student_id = ".$student->id; 
                    $result = $conn->query($mysql); 
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $deleteSql = "DELETE FROM parentstud WHERE id = ".$row['id'];
                            $conn->query($deleteSql);
                        }
                    }

                    foreach ( $_POST['parents'] as $key => $value) {
                        $sql = "INSERT INTO parentstud (parent_id, student_id) VALUES (".$value.",".$student->id.")";
                        $conn->query($sql);
                    }
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
        <h1 class="page-header"><i class="fa fa-user "></i> Student <small></small></h1>
        <ol class="breadcrumb">
            <li><a href="../index.php">Dashboard</a></li>
            <li class="active"> Update</li>
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
            <input type="hidden" name="LRN" value="<?php echo $student_info->lrn ?>" >
            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label"> First Name </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control lettersonly" id="first_name" required name="first_name" placeholder="First name" value='<?php echo $student_info->first_name ?>' />
                </div>
                <label for="middle_name" class="col-sm-1 control-label"> Middle Name </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control lettersonly" id="middle_name" name="middle_name" placeholder="Middle name" value='<?php echo $student_info->middle_name ?>' />
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="col-sm-2 control-label"> Last Name </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control lettersonly" id="last_name" required name="last_name" placeholder="Last name" value='<?php echo $student_info->last_name ?>' />
                </div>
                
                
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label"> Address</label>
                <div class="col-sm-4">
                    <textarea class="form-control" rows="3" class="form-control"required  id="address" name="address" placeholder="Address" value='' /><?php echo $student_info->address ?></textarea>
                </div>
                <label for="section" class="col-sm-1 control-label" >Section </label>
                <div class="col-sm-4">
                    <select name="section" class="form-control" required>
                        <?php
                        $sections = Section::find_all();
                        foreach($sections as $section):
                        if($section->created_by == $_SESSION['user_id']):
                        ?>
                        <option value="<?php echo $section->section ?>"><?php echo $section->section ?></option>
                        <?php
                        endif;
                        endforeach;
                        ?>
                        
                    </select>
                </div>
            </div>
            
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="Parents" class="col-sm-2 control-label">Parents</label> 
                            <div class="col-sm-9" style="padding-left: 5px;">
                                <select name="parents[]" class="form-control multiselect" required="required"> 
                                    <?php foreach ($parents as $parent): ?>   
                                        <?php $selected = ""; ?>
                                        <?php if (isset($_POST['parents'])): ?>
                                            <?php foreach ($_POST['parents'] as $key => $value): ?>
                                                <?php if ($value == $parent->id): ?>
                                                    <?php $selected = "selected"; ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                        <option <?php echo $selected; ?> value="<?php echo $parent->id; ?>"><?php echo $parent->first_name." ".$parent->last_name; ?></option>
                                    <?php endforeach ?>
                                </select> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">Parent First Name </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="parent_first_name" required name="parent_first_name" placeholder="First name" value='<?php echo @$_POST[' first_name '] ? $_POST['first_name '] : ''; ?>' />
                </div>
                <label for="middle_name" class="col-sm-1 control-label">Parent Last Name </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="parent_last_name" required name="parent_last_name" placeholder="Middle name" value='<?php echo @$_POST[' middle_name '] ? $_POST['middle_name '] : ''; ?>' />
                </div>
            </div> -->
            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-4">
                    Active
                    <input type="radio" name="active" id="active" value=1 checked='checked' /> Inactive
                    <input type="radio" name="active" id="active" value=0 />
                </div>
            </div>
            <hr />
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-plus "></i> Update User</button>
                </div>
            </div>
        </form>
        <hr />
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.multiselect').multiselect({
            buttonWidth: "100%",
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true
        })

    });
</script>    
<?php include_layout_template('sub_footer.php'); ?>