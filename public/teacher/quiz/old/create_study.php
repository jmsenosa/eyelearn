<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
		
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);	
	
	$obj = 'Quiz';
	
	// Find all the Quiz
	$quizes = Quiz::find_all();
	
	if(isset($_POST['submit'])) {
		
		$name = trim($_POST['name']);
		$check = Quiz::check_name($name);
	
		if($_POST['name']=='' && $_POST['description']=='' ){
			$session->message("Please input data on  fields.");
			redirect_to('create.php');
		}elseif($check){
			$session->message("Unable to add new Quiz. The <strong>{$name}</strong> is already exist. Please input another name.");
			redirect_to('create.php');
		}else{
			$quiz = new Quiz();
			$quiz->name			= $_POST['name'];
			$quiz->user_id		= $_SESSION['user_id'];
			$quiz->description	= $_POST['description'];
			$quiz->active 		= $_POST['active'];
			if($quiz->save()) {
				// Success
				$session->message("The <strong>{$_POST['name']}</strong> was successfully added.");
				redirect_to('create.php');
			} else {
				$session->message("Unable to add <strong>{$_POST['name']}</strong>.");
				redirect_to('create.php');
			}
		}
		
	}
	
?>
<?php include_layout_template('sub_header.php'); ?>
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-pencil "></i> <?php echo ucwords($obj); ?> Manager <small class='pull-right' style='font-size: 14px;'  >Welcome to <strong><?php $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?></strong> <a href='#'><?php echo ucwords($user->full_name()); ?></a>! </small> </h1>
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active"><?php echo ucwords($obj); ?> Manager</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->
	
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<?php if($message):?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong><i class="fa fa-warning"></i> Warning!</strong> <?php echo output_message($message); ?>
			</div>
			<?php else: ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  Please make sure <strong><?php echo ucwords($obj); ?> Name</strong> is <strong>Unique</strong> 
			</div>
			<?php endif; ?>
		</div>
	</div>
	<!-- /.row -->

	<!-- Main -->
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-md-6">
			<p class="lead" ><?php echo ucwords($obj); ?> Add Form</p> 
			<form  action="create.php"  method="POST">
			  <div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo ucwords($obj); ?> Name">
			  </div>
			  <div class="form-group">
				<label for="description">Password</label>
				<input type="text" class="form-control" name="description" id="description" placeholder="<?php echo ucwords($obj); ?> Description">
			  </div>
			  <div class="radio">
				<label>
				  <input type="radio" name="active" id="active" id="active" value=1  checked='checked'  /> Active
				  <input type="radio" name="active" id="active" value=0  /> Inactive
				</label>
			  </div>
			  <button type="submit" class="btn btn-primary" name='submit' >Submit</button>
			</form>
		</div>
		<div class="col-md-6">
			<p class="lead" ><?php echo ucwords($obj); ?> Table</p> 
			<div class="table-responsive">
				<table class="table table-striped ">
					<thead>
						<tr>
						<th>Name</th>
						<th>Created By</th>
						<th>Description</th>
						<th class='text-center'>Status</th>
						<th class='text-center'>Option</th>
					  </tr>
					</thead>
					<?php if($quizes):?>  
					<?php foreach($quizes as $quiz): ?>
					  <tr>
						<td><?php echo ucwords($quiz->name); ?></td>
						<td><?php $user = User::find_by_id($quiz->user_id);  echo ucwords($user->full_name()); ?></td>
						<td><?php echo ucwords($quiz->description); ?></td>
						<td class='text-center'><?php echo $quiz->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
						<td class='text-center'><a href="update.php?id=<?php echo $quiz->id; ?>"  rel="tooltip"  title="Edit <?php echo ucwords($obj); ?>" ><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $quiz->id; ?>" rel="tooltip"  title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
					  </tr>
					<?php endforeach; ?>
					<?php else: ?>
					  <tr>
						<td style='background: #F2DEDE !important' colspan=5 class="text-danger text-center"  ><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>  No <?php echo ucwords($obj); ?> Found.</td>
					  </tr>
					<?php endif; ?>
					</table>
			</div>
		</div>
	</div>
	
	
	<!-- Main -->
	<!-- Page Heading/Breadcrumbs -->
	<!--<div class="row">
		<div class="col-lg-12">
			<?php if($message):?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong><i class="fa fa-warning"></i> Warning!</strong> <?php echo output_message($message); ?>
			</div>
			<?php else: ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>  Please make sure <strong><?php echo ucwords($obj); ?> Name</strong> is <strong>Unique</strong> 
			</div>
			<?php endif; ?>
			  
			<p class="lead" >Quiz Add Form</p> 
			<form class="form-horizontal" action="create.php"  method="POST">
			  <div class="form-group">
				<label for="name" class="col-sm-2 control-label">  <span class="glyphicon glyphicon-asterisk text-danger" aria-hidden="true"></span> Name</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo ucwords($obj); ?> Name" />
				</div>
				<label for="name" class="col-sm-2 control-label"> <span class="glyphicon glyphicon-asterisk text-danger" aria-hidden="true"></span> Description</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="description" name="description" placeholder="<?php echo ucwords($obj); ?> Description" />
				</div>
				
			  </div>
			 <div class="form-group">
				<label for="status" class="col-sm-2 control-label">Status</label>
				<div class="col-sm-3">
				   Active <input type="radio" name="active" id="active" value=1  checked='checked'  />
				 Inactive <input type="radio" name="active" id="active" value=0  />
				</div>
				
			  </div>
			  
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				  <button type="submit" class="btn btn-primary" name="submit">Add <?php echo ucwords($obj); ?></button>
				</div>
			  </div>
			</form>
		</div>
	</div>-->


<?php include_layout_template('sub_footer.php'); ?>
		
