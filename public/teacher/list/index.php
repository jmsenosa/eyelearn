<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find all the User
    $data = [
        "users.id"=>$_SESSION['user_id']
    ];

    $students = Student::get_all_with_parents($data); 

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
					    <div class="col-lg-6">

                            <form class="form-inline" method="GET">
                                <div class="form-group">
                                    <label for="datepicker1">From</label>
                                    <input type="number" min="2000" max="<?php echo date('Y') ?>" value="<?php echo date('Y') ?>" class="form-control" id="datepicker1">
                                    <label for="datepicker2">To</label>
                                    <input type="number" min="2000" max="<?php echo date('Y') ?>" value="<?php echo date('Y') ?>" class="form-control" id="datepicker2">
                                    <button name="search-by-year" id="btnsearchyear" class="btn btn-secondary">Search</button>
                                </div>
                                 
                            </form>
                        </div> 
                    </div>
                    <br><br>
                                    
					
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
							<?php foreach($students as $student): ?>
                                
							<tr>
								<td><a href=# rel="tooltip"  title="Student LRN"><?php echo $student->lrn; ?></a></td>
								<td><?php echo $student->full_name; ?></td>
								<td><?php echo $student->address; ?></td>
								<td><?php echo $student->parent_name; ?></td>
								<td><?php echo $student->section_name ?></td>
								<td><?php echo $student->sy ?></td>
							</tr>
							
							<?php endforeach; ?>
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
    
    $.fn.dataTable.ext.search.push( function( settings, data, dataIndex ) {
        var row = data[5]  || 0; // use data for the age column
        /*var section = $('#datepicker').val();

        if (  row == section )
        {
            return true;
        }
        return false;*/

        var from = $('#datepicker1').val();
        var to = $('#datepicker2').val();

        if (from == to) {
            if (  row == from )
            {
                return true;
            } 
        }else if (row >= from && row <= to){
            return true;
        } 

        return false;
    });

	$(document).ready(function(){
		$("[rel='tooltip']").tooltip();	
        $('.table').DataTable();
        var table = $('.table').DataTable();

        $('#datepicker1').on('change, click', function() {
            $("#datepicker2").attr("min",$(this).val());
            if ( $("#datepicker2").val() < $(this).val() ) {
                $("#datepicker2").val($(this).val());
            }
        } );

        $("#btnsearchyear").click(function(){
            table.draw();

            return false;
        });

	}); 
/*]]>*/
</script>