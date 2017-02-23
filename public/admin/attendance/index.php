<?php
    // Initialize Page
    require_once('../../../includes/initialize.php');
    
    // Check if Logged in. If not the page will go to Signin page
    if (!$session->is_logged_in()) { redirect_to("signin.php"); }
    
    // Find all the User
    $students = Student::find_all();
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
        <h3>TODAY: <?php echo date('Y-m-d'); ?></h3>
        <div class="form-group ">
            
            <label for="teacher" class="col-sm-1 control-label" style="text-align:left !important;">Teacher </label>
            <div class="col-sm-3">
                
                <select name="teacher" id="teacher" class="form-control teacher">
                    <option></option>
                    <?php
                    $teachers = User::find_teacher();
                    foreach($teachers as $teacher):
                    
                    ?>
                    <option value="<?php echo $teacher->id ?>">
                        <?php echo $teacher->full_name() ?>
                    </option>
                    <?php
                    
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group ">
            
            <label for="section" class="col-sm-1 control-label" style="text-align:left !important;">Section </label>
            <div class="col-sm-3">
                
                <select name="section" id="section" class="form-control section">
                    <option></option>
                    <!-- <?php $sections = Section::find_all(); ?>
                    <?php foreach($sections as $section): ?>
                    <option value="<?php echo $section->section ?>" data-created_by="<?php echo $section->created_by; ?>">
                        <?php echo $section->section ?>
                    </option>
                    <?php endforeach; ?> -->
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
                    if($student->teacher = $_SESSION['user_id']):
                        if($student->sy == date('Y')){
                            ?>
                            <tr>
                                <td><a href=# rel="tooltip" title="Show Profile"><?php echo $student->lrn; ?></a></td>
                                <td>
                                    <?php echo $student->full_name() ?>
                                </td>
                                
                                <td>
                                    <?php echo $student->section ?>
                                </td>
                                <td class='text-center'>
                                    <?php
                                    $attendance = Attendance::find_by_today_student($student->id,date('Y-m-d'));
                                    if(!empty($attendance)):
                                    
                                    echo $attendance->attendance == "present" ? "present" : "absent";
                                    
                                    else:
                                    ?>
                                    N/A  <?php
                                    endif;
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
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
        function(settings, data, dataIndex) {
            var section = $('.section').val();
            var row = data[2] || 0; // use data for the age column

            if (row == section) {
                return true;
            }
            return false;
        }
    );

    /*<![CDATA[*/
    $(document).ready(function() {
        $("[rel='tooltip']").tooltip();
        $('.table').DataTable({
            "aaSorting": [
                [1, 'asc']
            ]
        });
        var table = $('.table').DataTable();
        // Event listener to the two range filtering inputs to redraw on input
        $('.section').on('change', function() {
            table.draw();
        });

        $('.table').on('click', '.present', function(e) {

            var id = $(this).data('id');
            var thisElement = $(this);
            $.post('attendance.php', {
                id: id,
                type: "present"
            }, function(data) {
                $('.present[data-id="' + id + '"]').prop('disabled', true);
                $('.absent[data-id="' + id + '"]').prop('disabled', false);
            });
        });

        $('.table').on('click', '.absent', function() {
            var id = $(this).data('id');
            var thisElement = $(this);
            $.post('attendance.php', {
                id: id,
                type: "absent"
            }, function(data) {
                $('.absent[data-id="' + id + '"]').prop('disabled', true);
                $('.present[data-id="' + id + '"]').prop('disabled', false);
            });
        });

        $('#teacher').on('change', function() {
            var id = $(this).val();
            $.post('section.php', {
                id: id
            }, function(data) {
                $('#section').html("");
                $("#section").prop("selectedIndex", -1);
                $.each(data, function(i, value) {
                    $('#section').append($('<option>').text(value.section).attr('value', value.section));
                });
            }, 'json');
        });
    });    
</script>