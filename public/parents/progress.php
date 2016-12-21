<?php
	// Initialize 
	require_once('../../includes/initialize.php');
	// Check if User is Logged in to view this page.
	
	if (!$session->is_logged_in()) { redirect_to("login.php"); }
	//!$session->is_logged_in() ? redirect_to("../login.php") : redirect_to("index.php"); 
	

	// find user info
	   $user = Magulang::find_by_id($_SESSION['user_id']);
        
        $name = Lesson::find_by_id($_GET['lesson']);
        $result = Quiz_result::find_my_student($_GET['student_id'],$_GET['lesson']);
        

         
       
?>
    <html>
    <script type="text/javascript" src="../assets/js/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            <?php

                    echo "['Takes','".$name->name."'],";
                
                $i = 0;
$total = 0;
                $takes = array('1st','2nd','3rd');
                foreach($result as $results){
                    echo "['".$takes[$i]." take',".$results->score."],";
                    $i++;
                    $total = $results->total_number != "" ? $results->total_number  : 5;
                } ?>
        ]);
            var options = {
                title: 'Student Performance'
                , curveType: 'function'
                , pointsVisible: true
                , vAxis: {
                    maxValue: <?php echo $total ?>
                }
                , legend: {
                    position: 'bottom'
                }
            };
               
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                  google.visualization.events.addListener(chart, 'error', function (googleError) {
      google.visualization.errors.removeError(googleError.id);
      document.getElementById("error_msg").innerHTML = "Message removed = '" + googleError.message + "'";
  });
            chart.draw(data, options);
        }
    </script>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Eye Learn</title>
        <!-- Bootstrap Core CSS -->
        <link href="../materialize.min.css" rel="stylesheet">
        <link href="../animate.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- jQuery -->
        <script src="../assets/js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../materialize.min.js"></script>
    </head>
    <style>
        .side-nav a:hover {
            background-color: #039be5   !important;
        }
    </style>

    <body>
    <div class="navbar-fixed ">
        <nav class="light-blue darken-2">
            <div class="nav-wrapper container">
                <ul class="left">Hello! Mr/Mrs. <?php echo $user->last_name ?></ul>
                <ul class="right">
                   <li><a href="index.php">Home</a></li>
   
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    
                </ul>
            </div>
        </nav>
    </div>
            <ul id="slide-out" class="side-nav">
    <?php foreach($lesson as $lessons){
        
    
    ?>
      <li><a href="progress.php?lesson=<?php echo $lessons->id ?>&student_id=<?php echo isset($_GET['student_id']) ? $_GET['student_id'] : "" ?>"><?php echo $lessons->name ?></a></li>
        <?php
}
?>
    </ul>
    
        <div class="container">
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
        </div>
    </body>

    </html>
    <script>
        $(".button-collapse").sideNav();
    </script>