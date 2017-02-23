<?php
    // Initialize Page
    require_once('../../../includes/initialize.php');
    
    // Check if Logged in. If not the page will go to Signin page
    // if (!$session->is_logged_in()) { redirect_to("signin.php"); }
    
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    // Find section
    $sections = Section::find_all();  
    $parents = Magulang::get_all();
    
    $obj = 'student';
    
    if(isset($_POST['submit'])) {       
        
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $check_duplicate = Student::find_by_lrn($_POST['lrn']); 

        if($_POST['first_name']=='' && $_POST['last_name']==''  && $_POST['phone']=='' ){
            $session->message("Please input data on required fileds.");
        }else{
            if($check_duplicate === true){
                $session->message("Unable to Add Student, Duplicate LRN");
            }else{
                // id, section_id, course_id, first_name, last_name, email, phone, active, last_update
                // 
                $section = Section::find_by_id($_POST['section_id']); 

                $student = new Student();
                $student->lrn           = $_POST['lrn'];
                $student->section_id    = $_POST['section_id'];
                $student->first_name    = $_POST['first_name'];
                $student->middle_name   = $_POST['middle_name'];
                $student->last_name     = $_POST['last_name'];
                $student->section       = $section->section;
                $student->email         = $_POST['email'];
                $student->address         = $_POST['address'];
                $student->teacher       = $_SESSION['user_id'];
                // $student->phone         = $_POST['phone'];
                $student->active        = $_POST['active'];
                $student->sy        = date("Y");
                if($student->save()) {
                    // Success
                    $session->message("{$obj} Successfully created.");
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
                    $session->message("Unable to create {$obj}.");
                    // redirect_to('index.php');
                }
            }
        }
        
    }
    
?>
<?php include_layout_template('sub_header.php'); ?>
    <style type="text/css">
        .multiselect-container.dropdown-menu
        {
            width: 100%;
        }
        button.multiselect.dropdown-toggle.btn.btn-default
        {
            background: #FFF;
            color: #000;
        } 
        ul.multiselect-container.dropdown-menu li label
        {
            color: #000;
            padding-bottom: 8px;
        }
        ul.multiselect-container.dropdown-menu li:hover label,
        ul.multiselect-container.dropdown-menu li.active label
        {
            color: #FFF;
        }

        ul.multiselect-container > li:nth-child(2) input[type="radio"]
        {
            display: none;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="title"><?php echo ucwords($obj); ?> Manager </h3>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a> </li>
                    <li><a href="index.php"><?php echo ucwords($obj); ?></a> </li>
                    <li class="active">Create </li>
                </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
              <?php if($message):?>
              <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <?php echo output_message($message); ?> 
              </div>
              <?php else: ?>
                <div class="alert alert-info" role="alert">
                 <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> All fields are required 
                </div>
              <?php endif; ?>
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <label for="lrn" class="col-sm-2 control-label">LRN</label>
                    <div class="col-sm-4">
                        <input type="text" maxlength="12" class="form-control numbersonly" id="lrn" name="lrn" placeholder="<?php echo ucwords($obj); ?> LRN" value="<?php echo (isset($_POST['lrn'])) ? $_POST['lrn'] : ""; ?>"  required />
                    </div>
                </div>
              <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control lettersonly" id="first_name" name="first_name" placeholder="<?php echo ucwords($obj); ?> First Name" value="<?php echo (isset($_POST['first_name'])) ? $_POST['first_name'] : ""; ?>" required/>
                </div>
                <label for="middle_name" class="col-sm-1 control-label"> Middle Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control lettersonly" id="middle_name" name="middle_name" placeholder="<?php echo ucwords($obj); ?> Middle Name"  value="<?php echo (isset($_POST['middle_name'])) ? $_POST['middle_name'] : ""; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control lettersonly" id="last_name" name="last_name" placeholder="<?php echo ucwords($obj); ?> Last Name" value="<?php echo (isset($_POST['last_name'])) ? $_POST['last_name'] : ""; ?>" required/>
                </div>
                <label for="address" class="col-sm-1 control-label"> Address</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="address"name="address" placeholder="<?php echo ucwords($obj); ?> Address" value="<?php echo (isset($_POST['address'])) ? $_POST['address'] : ""; ?>" required />
                </div>
              </div>
             <div class="form-group">
                <label for="type" class="col-sm-2 control-label">Section</label>
                <div class="col-sm-10">
                    <select class="form-control" id="section_id" name="section_id" >
                        <?php foreach($sections as $section): ?>
                            <?php if ($_SESSION["user_id"] == $section->created_by): ?>
                                <option <?php echo (isset($_POST['section_id'])) ? ($_POST['section_id'] == $section->id) ? "selected" : "" : ""; ?> value='<?php echo $section->id; ?>'  ><?php echo ucwords($section->section); ?></option> 
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- <label for="email" class="col-sm-1 control-label">Email</label>
                <div class="col-sm-4">
                 <input type="text" class="form-control" id="email" name="email" value='<?php echo @$_POST['email'] ? $_POST['email'] : ''; ?>' placeholder="<?php echo ucwords($obj); ?> Email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ""; ?>" />
                </div>   -->
              </div>
               <div class="form-group">
                <!-- <label for="phone" class="col-sm-2 control-label">Phone</label> -->
                <!-- <div class="col-sm-4">
                   <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo ucwords($obj); ?> Phone" value="<?php echo (isset($_POST['phone'])) ? $_POST['phone'] : ""; ?>" />
                </div> -->
                <label for="event_time" class="col-sm-2 control-label"> Status</label>
                <div class="col-sm-10">
                    <br>
                    Active <input type="radio" name="active" id="active" value=1  checked='checked'  />
                    Inactive <input type="radio" name="active" id="active" value=0  />
                </div>
              </div>
              <div class="col-xs-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="Parents" class="col-sm-2 control-label">Parents</label> 
                            <div class="col-sm-9" style="padding-left: 5px;">
                                <select name="parents[]" class="form-control multiselect" required="required"> 
                                    <option></option>
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
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4"> 
                  <input type="submit"  class="btn btn-success" name="submit" value="Add Student">
                </div>
              </div>
            </form>
            <hr />
            
        </div>
    </div>
<?php include_layout_template('sub_footer.php'); ?>
        
        
<script type="text/javascript">
    $(document).ready(function(){
        $('.multiselect').multiselect({
            buttonWidth: "100%",
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true
        })

    });
</script>