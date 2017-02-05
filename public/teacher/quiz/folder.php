<?php
    // Initialize Page
    require_once('../../../includes/initialize.php');
    
    // Check if Logged in. If not the page will go to Signin page
    if (!$session->is_logged_in()) { redirect_to("signin.php"); }
    
    $obj = 'Quiz';
    
    // Find all the User
    $quizes = Quiz::find_by_lesson($_GET['id']);
    $quiz_categories = Quiz_Category::find_all(); 

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
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There are total of <strong><?php echo count($quizes); ?></strong>
                    <?php echo ucwords($obj); ?> in the database. </div>
                <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th class='text-center'>Type</th>
                                    <th class='text-center'>Option</th>
                                </tr>
                            </thead>
                            <?php foreach($quizes as $quiz): ?>
                                <?php $quiz_category = Quiz_Category::find_by_id($quiz->quiz_category_id);  ?> 
                                <tr>
                                    <td>
                                        <?php echo ucwords($quiz->description); ?>
                                    </td>
                                    <td class='text-center'>
                                        <?php echo ucwords($quiz_category->name); ?>
                                    </td>
                                   
                                    <td class='text-center'> <a href="delete.php?id=<?php echo $quiz->id; ?>&folder=<?php echo $_GET['id'] ?>" rel="tooltip" title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- <a href="create.php?id=<?php echo $_GET['id']?>" class="btn btn-primary"> <i class="fa fa-plus "></i> Add
                        <?php echo ucwords($obj); ?>
                    </a> -->
                    <table class="table">
                        <tr>
                            <td class="text-right">
                                <form method="get" class="form-inline">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <select name="quiz_categories" id="quiz_categories" class="form-control">
                                            <option value="">Select Category</option>
                                            <?php foreach($quiz_categories as $category): ?>
                                                <option value="<?=$category->id;?>"><?=$category->name;?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-primary cq-btn" data-lesson_id="<?=$lesson->id;?>" >Create Quiz</button>
                                </form> 
                            </td>   
                        </tr>
                    </table>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            var urlShtdata = new Array;
                            <?php foreach($quiz_categories as $category): ?>
                            urlShtdata[<?=$category->id?>] = "<?php echo $category->filename;?>";
                            <?php endforeach ?>

                            $(".cq-btn").click();

                            $(document).on("click",".cq-btn", function(){
                                var lesson_id = '<?php echo $_GET['id']; ?>';
                                var quiz_cat  = $("#quiz_categories").val(); 
                                if (quiz_cat == 1) {
                                    location = 'create.php?id=<?php echo $_GET['id']?>';                 
                                    window.location=location; 
                                }else{
                                    var location = urlShtdata[quiz_cat]+"?id="+lesson_id+"&quiz_cat="+quiz_cat;
                                    // alert(location)
                                    window.location=location;
                                }
                                
                            });
                        });
                    </script>
                    <?php include_layout_template('sub_footer.php'); ?>