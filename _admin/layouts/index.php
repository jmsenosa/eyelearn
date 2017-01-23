<?php include("layouts/header.php"); ?>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <?php include 'layouts/sidebar.php'; ?>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <?php echo $content; ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

<?php include('layouts/footer.php'); ?>
            