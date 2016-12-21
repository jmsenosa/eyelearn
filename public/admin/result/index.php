<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);
	$students = Student::find_all();
	$obj = 'Quiz Result';
	
	// Find all the Quiz

    
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
			<p class="lead" ><?php echo ucwords($obj); ?> Table</p> 
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
			 <div class="form-group ">
                    
                   <label for="teacher" class="col-sm-1 control-label" style="text-align:left !important;">Teacher </label>
                    <div class="col-sm-3">
                       
                        <select name="teacher" id="teacher" class="form-control teacher">
                           <option></option>
                            <?php
                                            $teachers = User::find_teacher();
                                            foreach($teachers as $teacher):
                                               
                                                ?>
                                <option value="<?php echo $teacher->full_name() ?>">
                                    <?php echo $teacher->full_name() ?>
                                </option>
                                <?php
                                                
                                            endforeach;
                                            ?>

                        </select>
                    </div>
                </div>
                
                <div class="col-lg-12" style="margin-top:20px">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
						<th>Teacher</th>
						<th>LRN</th>
						<th>Student Name</th>
						<th class='text-center'>Quiz Date</th>
						<th class='text-center'>Number of Items</th>
						
						<th class='text-center'>Attemp 1</th>
						<th class='text-center'>Attemp 2</th>
                        <th class='text-center'>Attemp 3</th>
						<th class='text-center'>Option</th>
					  </tr>
					</thead> 
					            <?php
                foreach($students as $student):
  
                $check = Quiz_result::find_my_student_group_lesson($student->id); 
                foreach($check as $checks){
                     echo "<tr>";
                     echo "<td>" . User::find_by_id($student->teacher)->full_name() . "</td>";
                    echo "<td>" . $student->lrn . "</td>";
                    echo "<td>" . $student->full_name() . "</td>";
                    echo "<td class='text-center'>" . $checks->quiz_date . "</td>";
                    echo "<td class='text-center'>" . $checks->total_number . "</td>";
                    $lesson_result = Quiz_result::find_my_student($student->id,$checks->lesson_id);
                    for($i = 0;$i < 3;$i++){
                       
                        echo "<td class='text-center'>" . ($lesson_result[$i]->score == "" ? "N/a" : $lesson_result[$i]->score)  ."</td>";
                        
                    }
                    echo '<td class="text-center"><a href="delete.php?lesson_id=' . $checks->lesson_id . '&student_id='. $student->id .'" onclick="return confirm(\'Are you sure you want to delete\');" rel="tooltip"  title="Delete record"><i class="fa fa-trash text-danger"></i></a></td>';
                }
               
                endforeach;
                
                    
                ?>
					</table>
			</div>
			</div>
			<div class="col-md-12"><a href='viewpdf.php?id=<?php echo $event->id; ?>' target='blank' class="btn btn-danger" >View in PDF Files</a></div>
			 
		</div>
	</div>
	

<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
    
      $.fn.dataTable.ext.search.push(
                 function( settings, data, dataIndex ) {
         var section = $('.teacher').val();
         var row = data[0]  || 0; // use data for the age column
 
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
        $('.textarea').on('change',function(){
            var id = $(this).data('id');
            var remarks = $(this).val();
             $.post('remarks.php', {remarks:remarks,id:id}, function(data){
            
             console.log(data);
             });
             });
          var table = $('.table').DataTable();
                    
                    // Event listener to the two range filtering inputs to redraw on input
                    $('.teacher').on('change', function() {
                        table.draw();
                    } );
                    
	}); 
/*]]>*/
</script>