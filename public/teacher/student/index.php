<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	require_once("../../../includes/config.php");
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find all the User
    $servername = DB_SERVER;
    $username = DB_USER;
    $password = DB_PASS;

    // Create connection
    $conn = new mysqli($servername, $username, $password, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "
    	SELECT 
    		student.*,
    		parent.id as parent_id,
    		parent.first_name as p_first_name,
    		parent.last_name as p_last_name,
    		parent.phone,
			parent.email
		FROM
			student
		LEFT JOIN
			parentstud
			ON
				student.id = parentstud.student_id
		LEFT JOIN
			parent
			ON
				parentstud.parent_id = parent.id
		LEFT JOIN
        	section
            ON
            	section.id = student.section_id
        LEFT JOIN
        	users 
            ON
            	users.id = section.created_by
		WHERE 
			users.id = ".$_SESSION['user_id']." 
	"; 

	
	// echo "<pre>"; print_r($sql); die();

	if ( isset($_POST['submit']) ) {
		$dateStart = $_POST['yearstart'];
		$dateEnd   = $_POST['endstart'];

		if (strtotime($dateStart) <= strtotime($dateEnd)) {
			$sql = $sql . " AND sy >= ".$dateStart." AND sy <= ".$dateEnd;
		}
	}else{
		$sql = $sql . "AND sy = ".date('Y');
	}


	$sql = $sql." GROUP BY student.id"; 

	$result = $conn->query($sql);

	$obj = "Students";

    $user = User::find_by_id($_SESSION['user_id']);
	
?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-user "></i> Students and Parents <small></small></h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dashboard</a></li>
				<li class="active"> List</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->

	<!-- Main -->
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<!-- Service Tabs -->
			<ul id="myTab" class="nav nav-tabs nav-justified">
				<li class="active"><a href="#service-one" data-toggle="tab"> Student</a></li> 
			</ul>
 
			<div class="tab-pane fade active in" id="service-one">
				<h3 class="lead" ><?php echo ucwords($obj); ?> Table</h3> 
				<?php if($message):?>
					 <div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
					</div>
				  <?php else: ?>
				   <div class="alert alert-info alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all Your Student.
					</div>
				  <?php endif; ?>
				<div class="table-responsive">
					<div class="row">
						<div class="col-xs-12">
							<div class="text-right">
								<form class="form-inline" method="post">
									<div class="form-group">
										<label>School Year: </label>
									</div>
									<div class="form-group"> 
										<input type="number" class="form-control" name="yearstart" value="<?php echo (isset($_POST['yearstart'])) ? $_POST['yearstart'] : date("Y") - 1; ?>" id="yearstart" min="2011" max="<?php echo date("Y"); ?>"  placeholder="Start"/>
									</div>
									<div class="form-group"> 
										<input type="number" class="form-control" name="endstart" value="<?php echo (isset($_POST['endstart'])) ? $_POST['endstart'] : date("Y"); ?>" id="endstart" min="2011" max="<?php echo date("Y"); ?>" placeholder="End">
									</div>
									<input type="submit" name="submit" value="Search" class="btn btn-default">
									<br>
								</form>
							</div>	
							<hr>
						</div>
					</div>
					<table class="table table-striped ">
						<thead>
							<tr>
								<th>LRN</th>
								<th>Full name</th>
								<th>Address</th>
								<th>Parent</th>
								<th class='text-center'>Status</th>
								<th class='text-center'>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($result->num_rows > 0) { ?>
								<?php while ($student = $result->fetch_object()) { ?>
								<tr>
									<td><?php echo $student->lrn; ?></td>
									<td><?php echo $student->first_name." ".$student->last_name; ?></td>
									<td><?php echo $student->address; ?></td>
									<td><?php echo $student->p_first_name. " ".$student->p_last_name; ?></td>
									<td><?php echo ($student->active == 1) ? '<i class="fa fa-check text-success"></i> Active' : '<i class="fa fa-remove text-danger"></i> Inactive'; ?></td>
									<td class='text-center'><a href="update.php?id=<?php echo $student->id; ?>" rel="tooltip"  title="Edit User"><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $student->id; ?>" onclick="return confirm('Are you sure you want to delete');" rel="tooltip"  title="Delete User"><i class="fa fa-trash text-danger"></i></a></td>								
								</tr>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				</div>

				<a href="create_student.php" class="btn btn-primary" >  Add</a> 
				<a href='csv.php?id=<?php echo $user->id; ?>' target='blank' class="btn btn-danger" id="downloadCSV">Download CSV</a>
			</div>

			</div>
		</div>
	</div>



<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
		$("[rel='tooltip']").tooltip();	
        $('.table').DataTable();

        $('input[type="submit"]').click(function(){
        	var yearstart = $("#yearstart").val();
			var endstart = $("#endstart").val();

			if ((yearstart != "" && endstart != "") && (yearstart <= endstart ) ) {
				return true
			}else{ 
				return false;
			}
        });

        $("#downloadCSV").click(function(){
        	var yearstart = $("#yearstart").val();
			var endstart = $("#endstart").val();

			if ((yearstart != "" && endstart != "") && (yearstart <= endstart ) ) {
				var href = $(this).attr("href");
				href = href+"&startsy="+yearstart+"&endsy="+endstart;
				window.location.href = href;
				return false;
			}else{
				return true;
			}
        });

	}); 
/*]]>*/
</script>