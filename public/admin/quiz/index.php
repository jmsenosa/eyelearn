 
<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Lesson';
    $user = User::find_by_id($_SESSION['user_id']);
    $lessons = Lesson::find_all();      
    $quiz_categories = Quiz_Category::find_all(); 
?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->


<script type="text/javascript">
    // because somewhere down there theres an error in an html markup
    $(document).ready(function(){
        $("[rel='tooltip']").tooltip(); 
        $('.table').DataTable(); 

    });

    $(document).ready(function(){
        var urlShtdata = new Array;
        <?php foreach($quiz_categories as $category): ?>
        urlShtdata[<?=$category->id?>] = "<?php echo $category->filename;?>";
        <?php endforeach ?>

        $(".cq-btn").click();

        $(document).on("click",".cq-btn", function(){
            var lesson_id = $(this).data("lesson_id");
            var quiz_cat  = $("#quiz_categories-"+lesson_id).val(); 
            
            var location = urlShtdata[quiz_cat]+"?id="+lesson_id+"&quiz_cat="+quiz_cat;
            window.location=location; 
        });
    });
</script>



<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> <i class="fa fa-book "></i> <?php echo ucwords($obj); ?> <small></small></h1>
        <ol class="breadcrumb">
            <li><a href="../index.php"> Dashboard</a></li>
            <li class="active"> List</li>
        </ol>
    </div>
</div>
<!-- /.row -->
<?php if($message):?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> 
        <strong><i class="fa fa-check"></i> Success!</strong>
        <?php echo output_message($message); ?>
    </div>
<?php else: ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> 
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> 
        There are total of <strong><?php echo count($lessons); ?></strong> <?php echo ucwords($obj); ?> in the database. 
    </div>
<?php endif; ?>
<div class="">
    <table class="table table-striped "  style="border-bottom: 1px solid #999; ">
        <thead>
            <tr>
                <th class="text-center" style="width: 20%">Name</th>
                <th class="text-left">Created By</th>
                <th class="text-center">Description</th>
                <td style="width: 33%;"></td>
            </tr>
        </thead>
        <tbody>    
            <?php foreach($lessons as $lesson): ?>
                <?php $user = User::find_by_id($lesson->user_id); @$fullname = ucwords($user->full_name());  ?>
                <tr>
                    <td class="text-center">
                        <?php echo ucwords($lesson->name); ?>                                        
                        <a href='folder.php?id=<?php echo $lesson->id; ?>' rel="tooltip" title="View Content">
                        </a>
                    </td>
        			<td>
                        <?php echo $fullname; ?>
                    </td>
        			<td>
                        <?php echo ucwords($lesson->description); ?>
                    </td>   
                    <td> 
                        <form method="get" class="form-inline">
                            <div class="form-group">
                                <label for=""></label>
                                <select name="quiz_categories" id="quiz_categories-<?php echo $lesson->id;?>" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php foreach($quiz_categories as $category): ?>
                                        <option value="<?=$category->id;?>"><?=$category->name;?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-default cq-btn" data-lesson_id="<?=$lesson->id;?>" >Create Quiz</button>
                        </form> 
                    </td>          			
    		  </tr>
    		<?php endforeach; ?>
        </tbody> 
	</table>
</div> 
<!-- Javascript Declaration -->
