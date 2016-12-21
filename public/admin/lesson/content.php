<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Content';
	
	// Find  User
	$id = ($_GET['id'] ? $_GET['id']:0);
	$lessons = Lesson_dtl::find_by_lesson($id); 
	$board = ceil((count($lessons)) / 3);
	
?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"> <i class="fa fa-book "></i>  <?php echo ucwords($obj); ?> <small></small></h1>
		<ol class="breadcrumb">
			<li><a href="../index.php"> Dashboard</a></li>
			<li><a href="index.php"> List</a></li>
			<li class="active"> Content</li>
		</ol>
	</div>
</div>
<!-- /.row -->


 <?php if($message):?>
	 <div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
	</div>
  <?php else: ?>
   <div class="alert alert-info alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There are total of <strong><?php echo count($lessons); ?></strong> <?php echo ucwords($obj); ?> in the database.
	</div>
  <?php endif; ?>
<div class="table-responsive">
	<table class="table table-striped ">
		<thead>
			<tr>
			<th>Image</th>
			<th>Lesson</th>
			<th>Audio</th>
			<th>Second(s)</th>
            <th>Board</th>
			<th class='text-center'>Option</th>
		  </tr>
		</thead> 
		<?php foreach($lessons as $lesson): ?>
		  <tr>
			<td><a href='#' data-toggle="modal" data-target="#<?php echo $lesson->id; ?>" ><img src='../../<?php echo $lesson->image_path(); ?>' style='width: 50px;' ></a></td>
			<td><?php $leson = Lesson::find_by_id($lesson->lesson_id); echo ucwords($leson->name) ; ?></td>
			<td><?php $audio = Audio::find_by_id($lesson->audio_id); echo $audio->filename ; ?></td>
			<td><?php echo ucwords($lesson->seconds); ?> Second(s)</td>
            <td><select class="board" data-id="<?php echo $lesson->id ?>" data-lesson="<?php echo $_GET['id'] ?>">
                <option value="" ></option>
            <?php 
                for($x = 1; $x<=$board;$x++){
                    ?>
                    <option value="<?php echo $x ?>" <?php echo ($lesson->board == $x) ? "Selected" : "" ?>><?php echo $x ?></option>
              <?php
                }
              ?>
            </select></td>
			<td class='text-center'><a href="content_edit.php?id=<?php echo $lesson->id; ?>"  rel="tooltip"  title="Edit <?php echo ucwords($obj); ?>" ><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="content_delete.php?id=<?php echo $lesson->id; ?>" rel="tooltip"  title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
		  </tr>
		  
		   <!-- Modal -->
			<div class="modal fade" id="<?php echo $lesson->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			 <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><?php echo $lesson->name; ?></h4>
				  </div>
				  <div class="modal-body">
					<center><img src="../../<?php echo $lesson->image_path(); ?>"  height='500' /></center>
				  </div>
				</div>
			  </div>
			</div>
			
		<?php endforeach; ?>
		</table>
</div>
<a href="content_add.php?id=<?php echo $id; ?>" class="btn btn-primary" > <i class="fa fa-plus "></i> Add Content</a> 
<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
        var prev = "";
		$("[rel='tooltip']").tooltip();	
        $('.board').on('change',function(){
            var id = $(this).data('id');
            var lesson = $(this).data('lesson');
            var board = $(this).val();
            var sel = $(this);
            $.post('add_board.php', {board:board,id:id,lesson:lesson}, function(data){
            
             if(data == "fail"){
                 alert("Reached maximum number of board item");
                $(sel).val($(sel)[0].initialValue);

             }
        });
        });

	});
/*]]>*/
</script>
		
