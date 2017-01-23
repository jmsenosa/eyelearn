<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Quiz';
	
	// Find all the User
	$quizes = Quiz::find_by_lesson($_GET['id']);

?>
    <?php include_layout_template('sub_header.php'); ?>
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-volume-up "></i>   <?php echo ucwords($obj); ?> <small></small></h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php"> Dashboard</a></li>
                    <li><a href="index.php">Folder</a></li>
                    <li class="active"> List</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php if($message):?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong><i class="fa fa-check"></i> Success!</strong>
                <?php echo output_message($message); ?>
            </div>
            <?php else: ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There are total of <strong><?php echo count($quiz); ?></strong>
                    <?php echo ucwords($obj); ?> in the database. </div>
                <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th class='text-center'>Type</th>
                                    <th class='text-center'>Choice 1</th>
                                    <th class='text-center'>Choice 2</th>
                                    <th class='text-center'>Choice 3</th>
                                    <th class='text-center'>Choice 4</th>
                                    <th class='text-center'>Answer</th>
                                    <th class='text-center'>Option</th>
                                </tr>
                            </thead>
                            <?php foreach($quizes as $quiz): ?>
                                <tr>
                                    <td>
                                        <?php echo ucwords($quiz->description); ?>
                                    </td>
                                    <td class='text-center'>
                                        <?php echo ucwords($quiz->type); ?>
                                    </td>
                                    <td class='text-center'> <img src="../../images/<?php echo ucwords($quiz->choice1); ?>" height="50" width="50"> </td>
                                    <td class='text-center'> <img src="../../images/<?php echo ucwords($quiz->choice2); ?>" height="50" width="50"> </td>
                                    <td class='text-center'> <img src="../../images/<?php echo ucwords($quiz->choice3); ?>" height="50" width="50"> </td>
                                    <td class='text-center'> <img src="../../images/<?php echo ucwords($quiz->choice4); ?>" height="50" width="50"> </td>
                                    <td class='text-center'>
                                        <?php echo ucwords($quiz->answer); ?>
                                    </td>
                                    <td class='text-center'> <a href="delete.php?id=<?php echo $quiz->id; ?>&folder=<?php echo $_GET['id'] ?>" rel="tooltip" title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                    <a href="create.php?id=<?php echo $_GET['id']?>" class="btn btn-primary"> <i class="fa fa-plus "></i> Add
                        <?php echo ucwords($obj); ?>
                    </a>
                    <?php include_layout_template('sub_footer.php'); ?>