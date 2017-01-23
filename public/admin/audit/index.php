<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);
	
	$obj = 'Quiz Result';
	
	// Find all the Quiz
	$results = Log::find_all();



	if (isset($_POST['submit'])) {
		$results = Log::get_by_date($_POST['datefrom'], $_POST['dateto']);
		if ($_POST['submit'] == "Generate Report") {
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename=data-'.md5(date("Y-m-d H:i:s")).'.csv');
			ob_start();
			$output = fopen('php://output', 'w');
			$logs = (array) new Log(); $newLogs = []; 
		 	fputcsv($output, array_keys($logs));

		 	foreach ($results as $key => $value) {
		 		fputcsv($output, (array) $value);
		 	}

		 	fclose($output);   
		 	exit();
		}
	}

?>
<?php include_layout_template('sub_header.php'); ?>
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <i class="fa fa-pencil "></i> <?php echo ucwords($obj); ?> Manager <small class='pull-right' style='font-size: 14px;'  >Welcome to <strong><?php $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?></strong> <a href='#'><?php echo ucwords($user->full_name()); ?></a>! </small> </h1>
			<ol class="breadcrumb">
				<li><a href="../index.php">Dashboard</a></li>
				<li class="active">List</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->

	<!-- Main -->
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-12 col-lg-4">
					<p class="lead" ><?php echo ucwords($obj); ?> Table</p> 
				</div> 
				<div class="col-sm-12 col-lg-8">
					<div class="text-right">
						<form method="post" class="form-inline">
							<div class="form-group">
								<label for="datefrom">Start Date&nbsp;&nbsp;</label>
								<input type="date" name="datefrom" value="<?php echo (isset($_POST['datefrom'])) ? $_POST['datefrom'] : date('Y-m-d'); ?>" id="datefrom" class="form-control input-sm"> 
							</div>
							<div class="form-group">
								<label for="datefrom">&nbsp;&nbsp;End Date&nbsp;&nbsp;</label>
								<input type="date" name="dateto" value="<?php echo (isset($_POST['dateto'])) ? $_POST['dateto'] : date('Y-m-d'); ?>" id="dateto" class="form-control input-sm"> &nbsp;
							</div>
							<input type="submit" name="submit" value="Submit" class="btn btn-primary input-sm" style="padding: 6px 10px;">
							<input type="submit" name="submit" value="Generate Report" class="btn btn-primary input-sm" style="padding: 6px 10px;">
							
						</form>
					</div>
				</div> 
			</div>
			<br>
			<?php if($message):?>
				 <div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
				</div>
			  <?php else: ?>
			   <div class="alert alert-info alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all <?php echo ucwords($obj); ?>.
				</div>
			  <?php endif; ?>
			
			<div class="table-responsive"> 
				<table class="table">
					<thead>
						<tr>
							<th style="width:10%" class="text-center">is</th>
							<th style="width:25%" >Action</th>
							<th style="width:40%"class='text-left'>Message</th>
							<th style="width:25%" class='text-center'>Date Time</th>
					  	</tr>
					</thead> 
					<tbody>
						<?php if($results):?>  
							<?php foreach($results as $result): ?>
						  	<tr>
								<td class='text-center'><?php echo $result->id; ?></td>
								<td class='text-left'><?php echo $result->action; ?></td>
	                          	<td class='text-left'><?php echo $result->message; ?></td>
	                          	<td class='text-center'><?php echo $result->created_at; ?></td>
							</tr>
							<?php endforeach; ?>
						<?php else: ?>
						  	<tr>
								<td style='background: #F2DEDE !important' colspan=5 class="text-danger text-center"  ><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>  No <?php echo ucwords($obj); ?> Found.</td>
						  	</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	

<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">

	$(document).ready(function(){
		$("[rel='tooltip']").tooltip();	
        $('.table').DataTable();
	
    	$("#dateto, #datefrom").attr('max','<?php echo date("Y-m-d");?>');
        $("#datefrom").change(function(){
        	if ($(this).val() != "") {
        		$("#dateto").attr('min',$(this).val());        		
        	}
        });

        $("#dateto").change(function(){
        	if ($(this).val() != "") {
        		$("#datefrom").attr('max',$(this).val()).val($(this).val());        		
        	}
        });
	}); 

</script>