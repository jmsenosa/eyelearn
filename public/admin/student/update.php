<?php
    require_once("../../../includes/config.php");
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'student';
	
	// Find course ut
	
	// Find section
	$sections = Section::find_all(); 
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);

	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	if(isset($_POST['submit'])) {

		$section = Section::find_by_id($_POST['section']);		

		//Get user id to be edit	
			// id, section_id, course_id, first_name, last_name, email, phone, active, last_update
		$student = Student::find_by_id($_POST['id']);
		$student->section_id	= $section->id; 
		$student->section	= $section->section;
		$student->first_name	= $_POST['first_name'];
		$student->last_name		= $_POST['last_name'];
		$student->active 		= $_POST['active'];  
		$student->address 		= $_POST['address'];  

		// Create connection
		

		$mysql = "SELECT * FROM parentstud WHERE parent_id IN (".implode(',', $_POST['parents']).") AND student_id = ".$id; 
		$result = $conn->query($mysql); 
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$deleteSql = "DELETE FROM parentstud WHERE id = ".$row['id'];
				$conn->query($deleteSql);
			}
		}

		foreach ( $_POST['parents'] as $key => $value) {
			$sql = "INSERT INTO parentstud (parent_id, student_id) VALUES (".$value.",".$_POST['id'].")";
			$conn->query($sql);
		}
 
		if($student->update()) {
			// Success
			$session->message("{$_POST['first_name']} {$_POST['last_name']} successfully edited.");
			redirect_to('index.php');
		} else {
			$session->message("{$_POST['first_name']} {$_POST['last_name']} successfully edited.");
			redirect_to('index.php');
		} 
	}


	$student = Student::find_by_id($id); 
	$parents = Magulang::get_all();
	
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

		<form class="form-horizontal" method="POST">
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
				<input type='hidden' name='id' value='<?php echo $student->id; ?>'/>
	  			<div class="form-group">
					<label for="first_name" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-3">
				  		<input type="text" class="form-control" id="first_name" name="first_name" value='<?php echo ucwords($student->first_name); ?>' />
					</div>
					<label for="last_name" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-3">
					   	<input type="text" class="form-control" id="last_name" name="last_name" value='<?php echo ucwords($student->last_name); ?>'/>
					</div>
				</div>
				<div class="form-group">
					<label for="address" class="col-sm-2 control-label">Address</label> 				
					<div class="col-sm-8">
				  		<!-- <input type="text" class="form-control" id="first_name" name="first_name" value='<?php echo ucwords($student->first_name); ?>' /> -->
						<textarea class="form-control" id="address" name="address"><?php echo ucwords($student->address); ?></textarea>
					</div>
				</div>
			  	<div class="form-group">
					<label for="section" class="col-sm-2 control-label">Section</label>
					<div class="col-sm-3">
					  	<select class="form-control" id="section" name="section" >
							<?php foreach($sections as $section):	?>
								<option value='<?php echo $section->id; ?>' <?php echo  ($section->id == $student->section ? 'selected="selected"':''); ?>  ><?php echo ucwords($section->section); ?></option>
							<?php endforeach; ?>
						</select>
					</div> 
					<label for="event_time" class="col-sm-2 control-label"> Active</label>
					<div class="col-sm-3">
						<div class="form-control">
							Active &nbsp;<input type="radio" name="active" id="active" value=1 required='required' <?php echo $student->active==1 ? "checked='checked'":"" ; ?> /> <span>&nbsp; &nbsp;</span>
							Inactive &nbsp;<input type="radio" name="active" id="active" value=0 required='required' <?php echo $student->active==0 ? "checked='checked'":"" ; ?> />
						</div>	
					</div>
				</div> 
									
		  	</div> 
			<div class="col-xs-12">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="Parents" class="col-sm-2 control-label">Parents</label> 
							<div class="col-sm-8">
								<select name="parents[]" class="form-control multiselect" required="required" multiple> 
									<?php foreach ($parents as $parent): ?> 
										<?php
											$selected = "";
											$mysql = "SELECT * FROM parentstud WHERE parent_id = ".$parent->id." AND student_id = ".$id. " LIMIT 1"; 
											$result = $conn->query($mysql); 
											if ($result->num_rows > 0) {
												while($row = $result->fetch_assoc()) {
													if ($row['parent_id'] == $parent->id ) {
														$selected = "selected";
													}
												}
											}
										?>
										<option <?php echo $selected; ?> value="<?php echo $parent->id; ?>"><?php echo $parent->first_name." ".$parent->last_name; ?></option>
									<?php endforeach ?>
								</select> 
							</div> 
						</div>
					</div>
				</div>
			</div>
			<br>
		  	<div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
				   <button type="submit" class="btn btn-success" name="submit" onclick="return confirm('Are you sure you want to save changes?');">Save</button>
				  <button type="button" class="btn btn-danger" onClick='window.location.href = "index.php";' >Cancel </button>
				</div>
		  	</div>
		  	<div class="col-xs-offset-1 col-xs-9">
		  	
			  	<hr>
			  	<br>
		  		<h4>Parents/Guardian</h4>
		  		<table class="table table-bordered">
		  			<thead>
		  				<tr style="background: #000; color: #FFF;">
		  					<th>Username</th>
		  					<th>Name</th>
		  					<th>Email</th>
		  					<th>Phone</th>
		  				</tr>
		  			</thead>
		  			<tbody>
		  				<?php $mysql = "SELECT * FROM parentstud JOIN parent ON parent.id = parentstud.parent_id WHERE student_id = ".$id; ?>
	
						<?php $parentRes = $conn->query($mysql); ?>  
						<?php if ($parentRes->num_rows > 0) { ?>
							<tr>
							<?php while($row = $parentRes->fetch_object()) { ?>
								<td><?php echo $row->username; ?></td>
								<td><?php echo $row->first_name." ".$row->last_name; ?></td>
								<td><?php echo $row->email; ?></td>
								<td><?php echo $row->phone; ?></td>
							</tr>
							<?php } ?>
						<?php } ?> 
		  			</tbody>
		  		</table>
		  	</div>
		</form>
			
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