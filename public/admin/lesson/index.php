<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	
	$obj = 'Lesson';
	
	$user = User::find_by_id($_SESSION['user_id']);
	
    $lessons = Lesson::find_all();	

	
	 

?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
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
			<th>Name</th>
			<th>Quarter</th>
			<th>Created By</th>
			<th>Description</th>
            <th>Date Created</th>
			<th class='text-center'>Status</th>
			<th class='text-center'>Option</th>
		  </tr>
		</thead> 
		<?php foreach($lessons as $lesson):
        $datetime = new DateTime($lesson->last_update);
        if($datetime->format('Y') == date('Y')){
        ?>
      
		  <tr>
			<td>
				<?php if ($lesson->isDone == 0): ?> 
					<a href='content.php?id=<?php echo $lesson->id; ?>' rel="tooltip"  title="View Content" >
						<?php echo ucwords($lesson->name); ?>
					</a>
				<?php else: ?>
					<?php echo ucwords($lesson->name); ?>
				<?php endif ?>
			</td>
			<?php $grading = Grading_Quarters::find_by_id($lesson->grading_quarter_id) ?>
			<td><?php echo $grading->name; ?></td>
			<td><?php $user = User::find_by_id($lesson->user_id); echo ucwords($user->full_name());  ?></td>
			<td>
                <?php echo ucwords($lesson->description); ?> 
                <?php if ((strtotime($lesson->description." 01:00:00") == strtotime(date('Y-m-d')." 01:00:00") && $lesson->isDone == 0) || (strtotime($lesson->description." 01:00:00") < strtotime(date('Y-m-d')." 01:00:00") && $lesson->isDone == 0) ): ?>
                    <span class="label label-success"> ONGOING</span>
                <?php elseif ( strtotime($lesson->description." 01:00:00") > strtotime(date('Y-m-d')." 01:00:00") && $lesson->isDone == 0):?>
                    <span class="label label-warning"> PENDING</span>
                <?php elseif($lesson->isDone == 1): ?>
                    <span class="label label-danger"> DONE</span>
                <?php elseif(strtotime($lesson->description." 01:00:00") < strtotime(date('Y-m-d')." 01:00:00") && $lesson->isDone == 0): ?>
                    <span class="label label-warning"> PENDING</span> 
                <?php endif; ?>  
            </td>
            <td><?php echo ucwords($lesson->last_update); ?></td>
			<td><?php echo ucwords($lesson->description); ?></td>
			<td class='text-center'><?php echo $lesson->active==1 ? '<i class="fa fa-check text-success"></i>':'<i class="fa fa-remove text-danger"></i>'; ?></td>
			<td class='text-center'><!--<a href="dtl.php?id=<?php echo $lesson->id; ?>"  rel="tooltip"  title="Add <?php echo ucwords($obj); ?>" ><i class="fa fa-plus text-success"></i></a> &nbsp; --><a href="update.php?id=<?php echo $lesson->id; ?>"  rel="tooltip"  title="Edit <?php echo ucwords($obj); ?>" ><i class="fa fa-pencil text-warning"></i></a> &nbsp; <a href="delete.php?id=<?php echo $lesson->id; ?>" rel="tooltip"  title="Delete <?php echo ucwords($obj); ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-trash text-danger"></i></a></td>
		  </tr>
		<?php
        }
            endforeach; ?>
		</table>
</div>
<a href="create.php" class="btn btn-primary" > <i class="fa fa-plus "></i> Add <?php echo ucwords($obj); ?></a> 
 <a href='viewpdf.php' target='blank' class="btn btn-danger" >View in PDF Files</a>
<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
		$("[rel='tooltip']").tooltip();	
        $('.table').DataTable(
        {
            "order": [[ 3, "desc" ]]
        }); 
/*]]>*/
</script>
