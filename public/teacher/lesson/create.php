<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Lesson';
	$user = User::find_by_id($_SESSION['user_id']);
	
	if(isset($_POST['submit'])) {
		
		$name = trim($_POST['name']);
		$check = Lesson::check_name($name);
	
		if($_POST['name']=='' && $_POST['description']=='' ){
			$session->message("Please input data on  fields.");
			redirect_to('create.php');
		}elseif($check){  
			$session->message("Unable to add new Lesson. The <strong>{$name}</strong> is already exist. Please input another name.");
			redirect_to('create.php');
		}else{
            mkdir("../../audio/" . $_POST['name'] . "");
            
            $fileName = $_FILES['audio']['name'];
            $targetDir = "../../audio/" . $_POST['name'] . "/";
            $targetFile = $targetDir.$fileName;
            move_uploaded_file($_FILES['audio']['tmp_name'],$targetFile);
			$lesson = new Lesson();
			$lesson->name			= $_POST['name'];
			$lesson->user_id		= $_SESSION['user_id'];
			$lesson->description	= $_POST['description'];
			$lesson->active 		= $_POST['active'];
            $lesson->audio 		= $fileName;
            			$lesson->last_update 	= date('Y-m-d H:i:s');
			if($lesson->save()) {
				// Success
				$session->message("The {$_POST['name']} was successfully Added.");
                log_action('Add Lesson', "{$user->full_name()} Added new Lesson {$_POST['name']}.");
				redirect_to('index.php');
			} else {
				$session->message("Unable to create {$obj}.");
				redirect_to('index.php');
			}
		}
		
	}
	
?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-book "></i>  <?php echo ucwords($obj); ?> <small></small></h1>
		<ol class="breadcrumb">
			<li><a href="../index.php"> Dashboard</a></li>
			<li><a href="index.php"> List</a></li>
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
				  <strong><i class="fa fa-warning"></i> Warning!</strong> <?php echo output_message($message); ?>
				</div>
			  <?php else: ?>
			   <div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span > Please make sure Section Name is <strong>Unique</strong> 
				</div>
			  <?php endif; ?>
			<form class="form-horizontal" action="create.php" enctype="multipart/form-data"  method="POST">
			  <div class="form-group">
				<label for="name" class="col-sm-2 control-label"> <?php echo ucwords($obj); ?> Name</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo ucwords($obj); ?> Name" />
				</div>
				<label for="status" class="col-sm-1 control-label">Status</label>
				<div class="col-sm-4">
				   Active <input type="radio" name="active" id="active" value=1  checked='checked'  />
				 Inactive <input type="radio" name="active" id="active" value=0  />
				</div>
			  </div>
			 <div class="form-group">
				<label for="name" class="col-sm-2 control-label"> <?php echo ucwords($obj); ?> Date</label>
				<div class="col-sm-4">
				  <input type="date" class="form-control" id="description" name="description"  />
				</div>
				
			  </div>
			  
			  <div class="form-group">
				<label for="name" class="col-sm-2 control-label"> <?php echo ucwords($obj); ?> Audio</label>
				<div class="col-sm-4">
				  <input type="file" class="form-control" id="description" name="audio" accept="audio/*" />
				</div>
				
			  </div>
			  
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				  <button type="submit" class="btn btn-success" name="submit">Add <?php echo ucwords($obj); ?></button>
				</div>
			  </div>
			</form>
			<hr />
			
		</div>
	</div>

<?php include_layout_template('sub_footer.php'); ?>
		