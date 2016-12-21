<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
       
	// Find all the User
   
    if(isset($_GET['date'])):
        $students = Student::find_by_year($_GET['year']);
    endif;
    $obj = 'Parents and Student';
	
?>
    <?php include_layout_template('sub_header.php'); ?>
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-user "></i> Student Attendance <small></small></h1>
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
            <div class="col-lg-12 form-horizontal">
                <!-- Service Tabs -->
               
                <div class="form-group ">
                   <label for="section" class="col-sm-1 control-label" style="text-align:left !important;">Date </label>
                   <div class="col-sm-3">
                   <input type="text" class="form-control" id="datepicker" >
                    </div>
                </div>
                    
               
                

                <div class="form-group ">
                    
                   <label for="section" class="col-sm-1 control-label" style="text-align:left !important;">Section </label>
                    <div class="col-sm-3">
                       
                        <select name="section" class="form-control section">
                           <option></option>
                            <?php
                                            $sections = Section::find_all();
                                            foreach($sections as $section):
                                                if($section->created_by == $_SESSION['user_id']):
                                                ?>
                                <option value="<?php echo $section->section ?>">
                                    <?php echo $section->section ?>
                                </option>
                                <?php
                                                endif;
                                            endforeach;
                                            ?>

                        </select>
                    </div>
                </div>
            </div>
                <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>LRN</th>
                                <th>Full name</th>
                                <th>Section</th>
                                <th class='text-center'>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($students as $student): 
                                if($student->teacher == $_SESSION['user_id']):
                               
                            ?>

                                <tr>
                                   <?php
                                     $attendance = Attendance::find_by_today($student->id,$_GET['date']);
                                if(!empty($attendance)){
                                    foreach($attendance as $attend):
                                    
                                    if($attend->student_id == $student->id){
                                    ?>
                                    <td><a href=# rel="tooltip" title="Show Profile"><?php echo $student->lrn; ?></a></td>
                                    <td>
                                        <?php echo $student->full_name() ?>
                                    </td>
  
                                    <td>
                                        <?php echo $student->section ?>
                                    </td>
                                     <td class='text-center'>
                                       <?php
                                        
                                        
                                        ?>
                                         <?php echo $attend->attendance == "present" ? "Present" : "Absent" ?>
                                    </td>
                                       
                                        <?php
                                        }
                                    endforeach;
                                }
                                        else{
                                            ?>
                                            <td><a href=# rel="tooltip" title="Show Profile"><?php echo $student->lrn; ?></a></td>
                                    <td>
                                        <?php echo $student->full_name() ?>
                                    </td>
  
                                    <td>
                                        <?php echo $student->section ?>
                                    </td>
                                           <td>
                                            N/A</td>
                                       <?php
                                        }
                                        ?>
                                        
                                </tr>

                                <?php 
                                endif;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>



        <?php include_layout_template('sub_footer.php'); ?>
            <!-- Javascript Declaration -->
            <script type="text/javascript">
                $.fn.dataTable.ext.search.push(
                 function( settings, data, dataIndex ) {
         var section = $('.section').val();
         var row = data[2]  || 0; // use data for the age column
 
        if (  row == section )
        {
            return true;
        }
        return false;
            }
        );
 

                /*<![CDATA[*/
                $(document).ready(function () {
                    $("[rel='tooltip']").tooltip();
                    $('.table').DataTable({
                        "aaSorting": [[1,'asc']]
                    });
                    var table = $('.table').DataTable();
                    
                    // Event listener to the two range filtering inputs to redraw on input
                    $('.section').on('change', function() {
                        table.draw();
                    } );
                    
                    $('#datepicker').datepicker(
                        {
                            dateFormat: "yy-mm-dd",
                            beforeShowDay: $.datepicker.noWeekends
                        });
                    
                    $('.table').on('click','.present', function(e){
                        
                      
                        var id = $(this).data('id');
                        var thisElement = $(this);
                        $.post('attendance.php', {id:id,type:"present"}, function(data){
                            $('.present[data-id="'+id+'"]').prop('disabled', true);
                            $('.absent[data-id="'+id+'"]').prop('disabled', false);
                        })
                    });
                    
                    $('.table').on('click','.absent', function(){
                        var id = $(this).data('id');
                        var thisElement = $(this);
                        $.post('attendance.php', {id:id,type:"absent"}, function(data){
                            $('.absent[data-id="'+id+'"]').prop('disabled', true);
                            $('.present[data-id="'+id+'"]').prop('disabled', false);
                        })
                    })
                    
                    $('#datepicker').on('blur',function(){
                        var dateParts = $(this).val().split("-");
                        location.href = "?date="+$(this).val()+"&year="+dateParts[0];
                       
                    })
                    
                    
                });

   
            </script>