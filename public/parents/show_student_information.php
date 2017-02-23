<?php
    // Initialize 
    require_once('../../includes/initialize.php');
    require_once('student_all.php');

    // Check if User is Logged in to view this page.
    if (!$session->is_logged_in()) { redirect_to("login.php"); }

    $student_id = $_GET['student_id'];
    $student = StudentAll::get_student(['student.id' => $student_id]);
    
    if (count($student) > 0) 
    {
        $student = $student[0];
        $parent = Magulang::find_by_id($student->parent_id);
        $attendance = StudentAll::get_all_attendance($student->id); 
        $periods = Grading_Quarters::find_all();
        $newAll = new StudentAll();
        $student_data = $newAll->get_charts_result($student->id);
        // dd($student_data);
        // echo $attendance; die();
    } else {
        redirect_to("index.php"); 
    }

?>

<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eye Learn</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/dropzone.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/modern-business.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    <link href="../assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../../bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" media="screen" rel="stylesheet" type="text/css">
    
    <link rel='stylesheet' href='../../bower_components/fullcalendar/dist/fullcalendar.css' />
    <!-- <link rel='stylesheet' href='../../bower_components/fullcalendar/dist/fullcalendar.print.css' /> -->
    
    <link href="../animate.css" rel="stylesheet">
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="parent.css" rel="stylesheet">

    <link href="../materialize.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../materialize.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/dropzone.js"></script>
    <script src="../assets/js/mask.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="../../../bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <script src="http://code.highcharts.com/highcharts.js" type="text/javascript"></script>

    <script src="../assets/js/jquery-ui.js"></script> 

    <!-- <script src='../../bower_components/fullcalendar/dist/jquery.min.js'></script> -->
    <script src='../../bower_components/moment/min/moment.min.js'></script>
    <script src='../../bower_components/fullcalendar/dist/fullcalendar.js'></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head> 
<body>
    


    <!-- nav bar -->
     <div class="navbar power_bar">
        <nav class="light-blue darken-2">
                <div class="nav-wrapper container">
                <ul class="left">Hello! Mr/Mrs. <?php echo $parent->last_name ?></ul>
                <ul class="right">
                    <li><a href="index.php">Home</a></li>
                    
                    <li><a href="profile.php">Profile</a></li>
                    <!--<li><a href="#" data-activates="slide-out" class="button-collapse show-on-large">Lesson Progress</a></li>-->
                    <li><a href="logout.php">Logout</a></li>
                    
                </ul>
            </div>
        </nav>
    </div>
    <div class="container" style="background: #FFF">
        <div class="row"> 
            <div class="col-sm-12">
                <!-- resumt -->
                <br/>
                <strong style="font-weight: bold; margin-bottom: 15px; display: block; font-size: 32px;"><?php echo  $student->full_name; ?></strong>
                <hr/>                            
                <table class="table table-bordered">
                    <tr>
                        <th style="width:20%;">LRN: </th>
                        <td><?php echo $student->lrn; ?></td>
                        <th style="width:20%;">Section: </th>
                        <td><?php echo $student->section_name; ?></td>
                    </tr>
                    <tr>
                        <th style="width:20%;">School Year: </th>
                        <td><?php echo $student->school_year." - ".($student->school_year+1); ?></td> 
                        <th style="width:20%;">Teacher: </th>
                        <td><?php echo $student->teacher_name; ?></td>
                    </tr>
                </table> 
            </div>
            <div class="col-sm-12">
                <hr/>
            </div>
            <div class="col-md-12">
                <div id="quiz-chart"></div>
            </div>
            <div class="col-sm-12">
                <hr/>
            </div>
            <div class="col-sm-8">
                <?php include 'student_progress.php'; ?>
            </div>
            <div class="col-sm-4"> 
                <div class="bg-success"><span style="font-size: 18px;">ATTENDANCE</span></div>                
                <div id='calendar'></div>        
            </div>
        </div> 
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#calendar').fullCalendar({
            weekends: false,
            theme: true,
            fixedWeekCount: false,
            height: 370,
            events: $.parseJSON('<?php echo $attendance; ?>')
        });

        $('#accordion').collapse({
            toggle: true
        });

        var studentData = <?php echo $student_data; ?>;
        console.log(studentData);
        Highcharts.chart('quiz-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Overall Quiz Performance'
            }, 
            subtitle: {
                text: "Repeated quiz included"
            },
            xAxis: {
                title: {
                    text: 'Lesson - Quiz #'
                },
                type: 'category',
                labels: { 
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Percentage'
                }
            },
            legend: {
                enabled: false
            },
            series: [{
                name: 'Quiz',
                data : studentData, 
                dataLabels: {
                    enabled: false,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right', 
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
</script>
</html>