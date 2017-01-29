<?php
// Initialize 
require_once('../../../includes/initialize.php');

$sections = Section::find_all();
?>
<?php include_layout_template('sub_header.php'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-certificate "></i> Section Manager<small></small></h1>
            <ol class="breadcrumb">
                <li><a href="../index.php">Dashboard</a></li>
                <li class="active"> List</li>
            </ol>
        </div>
    </div>



    <?php if($message):?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-check"></i> Success!</strong>
            <?php echo output_message($message); ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There are total of <strong><?php echo count($sections); ?></strong>
            <?php echo ucwords("Sections"); ?> in the database.
        </div>
    <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                       <th>ID</th>
                        <th>Name</th>
                        <th class='text-center'>Option</th>
                    </tr>
                </thead>
                <?php foreach($sections as $section):
                    if($section->created_by == $_SESSION['user_id']):
                ?>
                    <tr>
                        <td>
                            <?php echo $section->id ?>
                        </td>
                        <td><?php echo $section->section ?></td>
                        <td class='text-center'><a href="update.php?id=<?php echo $section->id; ?>" rel="tooltip" title="Edit <?php echo ucwords($obj); ?>"><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $section->id; ?>" rel="tooltip" title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
                    </tr>
                    <?php 
                endif;
                endforeach; ?>
            </table>
        </div>
        <a href="create.php" class="btn btn-primary" > <i class="fa fa-plus "></i> Add Section</a> 
        <?php include_layout_template('sub_footer.php'); ?>
        
