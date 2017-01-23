
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eye Learn</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/dropzone.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../assets/css/modern-business.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">
    <link href="../../assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="../../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/dropzone.js"></script>
    <script src="../../assets/js/mask.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="../../assets/js/jquery-ui.js"></script> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Eye Learn</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="#">Welcome to <strong>
                    <?php $user = User::find_by_id($_SESSION['user_id']); $user_type = User_type::find_by_id($user->type_id); echo ucwords($user_type->name).' Page'; ?>
                    </strong>
                    <?php echo ucwords($user->full_name()); ?>!</a>
                    </li>
                    <li> <a href="../index.php">Home</a></li>
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manager	 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="user.php">User</a></li>
                            <li><a href="user_type/user_type.php">User Type</a></li>
                            <li><a href="student/student.php">Student</a></li>
                            <li><a href="lesson/student.php">Lesson</a></li>
                        </ul>
                    </li>-->
					<?php if($_SESSION):?>
					<li> <a href="../logout.php">Logout</a></li>
					<?php else: ?>
					<li> <a href="login.php">Login</a></li>
					<?php endif; ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">