<?php  require_once('../../../includes/initialize.php'); ?>
<?php if (!$session->is_logged_in()) { redirect_to("signin.php"); } ?>

<?php $quiz_categories = Quiz_Category::find_all(); ?>
<?php //echo "<pre>"; var_dump($quiz_categories ); die(); ?>
<?php $obj = 'Quiz Categories'; ?>
<!-- include page header -->
<?php include_layout_template('sub_header.php'); ?>

<!-- bread crumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="fa fa-object-group" aria-hidden="true"></i> Quiz Categories
        </h1>
        <ol class="breadcrumb">
            <li><a href="../index.php">Dashboard</a></li>
            <li class="active"> List</li>
        </ol>        
    </div>
</div>

<!-- main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="tab-pane fade active in" id="service-one">
            <h3 class="lead" ><?php echo ucwords($obj); ?> Table</h3> 
            <?php if($message):?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all Quiz Categories
                </div>
            <?php endif; ?> 
        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width: 5%;">ID</th>
                        <th style="width: 15%;">name</th>
                        <th style="width: 40%;">Description</th> 
                        <th style="width: 10%;">Folder/Filename</th>
                        <th style="width: 15%" class='text-center'>Date Created</th>
                        <th style="width: 15%" class='text-center'>Date Updated</th>
                        <!-- <th style="width: 10%"></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($quiz_categories as $category): ?>
                        
                        <tr>
                            <td>
                                <a href="#" rel="tooltip" title="Show Quiz">
                                    <?=str_pad($category->id, 7, "0",STR_PAD_LEFT);?>
                                </a>
                            </td>
                            <td><?=$category->name;?></td>
                            <td><?=$category->description;?></td>
                            <td><?=$category->filename;?></td>
                            <td class='text-center'><?=$category->date_added;?></td>
                            <td class='text-center'><?=$category->date_updated;?></td>
                            
                        </tr> 
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-right">
                            <ul class="list-inline">
                                <li><a id="try" href="../quiz/index.php" class="btn btn-primary">Create Quiz</a></li>
                            </ul>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div> 
<?php include_layout_template('sub_footer.php'); ?>