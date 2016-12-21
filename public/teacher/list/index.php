<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find all the User
    $students = Student::find_all();
    $obj = 'Parents and Student';
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

			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active in" id="service-one">
                    <br/>
                     <div class="form-group">
					   <label class="col-sm-1 control-label" style="text-align:left !important;">Year </label>
					    <div class="col-lg-3">
					  
					  <input type="number" min="2000" max="<?php echo date('Y') ?>" value="<?php echo date('Y') ?>" class="form-control" id="datepicker">
					  </div>
                    </div><BR>
                    <bR>
					
					<div class="table-responsive">
					<table class="table table-striped ">
						<thead>
							<tr>
								<th>LRN</th>
								<th>Full name</th>
								<th>Address</th>
								<th>Parent</th>
								<th>Section</th>
                                <th>SY</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($students as $student): 
                                if($student->teacher == $_SESSION['user_id']):
                            ?>
                                
							<tr>
								<td><a href=# rel="tooltip"  title="Student LRN"><?php echo $student->lrn; ?></a></td>
								<td><?php echo $student->full_name() ?></td>
								<td><?php echo $student->address; ?></td>
								<td><?php
                                    $magulang == "";
                                    $magulang = Magulang::find_by_id(Parentstud::find_by_student_id($student->id)->parent_id);
                                    echo $magulang == "" ? "N/A" : $magulang->full_name(); ?></td>
								<td><?php echo $student->section ?></td>
								<td><?php echo $student->sy ?></td>
							</tr>
							
							<?php 
                                endif;
                            endforeach; ?>
						</tbody>
					</table>
				</div>

	
				</div>

				</div>
			</div>
		</div>



<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
    
          $.fn.dataTable.ext.search.push(
                 function( settings, data, dataIndex ) {
         var section = $('#datepicker').val();
         var row = data[5]  || 0; // use data for the age column
 
        if (  row == section )
        {
            return true;
        }
        return false;
            }
        );
    
	$(document).ready(function(){
		$("[rel='tooltip']").tooltip();	
        $('.table').DataTable();
        var table = $('.table').DataTable();
        $('#datepicker').on('change', function() {
                        table.draw();
                    } );
	}); 
/*]]>*/
</script>