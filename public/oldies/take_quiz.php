<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Find  Quiz
	$id = ($_GET['id'] ? $_GET['id']:0);
	$quiz = Quiz::find_by_id($id);	
	$questions = Quiz_question::find_by_quiz($id);	
	
	// Find User 
	$user = User::find_by_id($_SESSION['user_id']);		
	
	if(isset($_POST['submit'])) {
		print_r($_POST);
	}
	
	$result = quiz_result::find_my_quiz($id,$_SESSION['user_id']);		
	print_r($result->quiz_status);
	
	
	// print_r($questions);
	$ctr=0;
 ?>
 <?php include_layout_template('header.php'); ?>
<section id="main">
	<div class="widget-boxes news">
		<h2>Kamusta <span style='color: #FFA500; background: transparent; margin-left: -10px;' ><?php echo ucwords($user->first_name); ?>!</span> <br />
		<a href='quiz.php'> Pagsusulit</a> | <a href='admin/logout.php'> Logout</a></h2>
	</div>
	
	<?php if($result->quiz_status!=1):?>
	<form action="take_quiz_proccess.php?id=<?php echo $id ; ?>" class="form-newsletter"  method="POST">
	<?php foreach($questions as $question): ?>
	<div class="person">
		<div class="person-img">
			<img src="<?php echo $question->image_path(); ?>" alt="" />
			<div class="mask"></div>
		</div>
		<div style='margin-left: 20px; margin-right: -100px; font-size: 60px; min-width: 220px;' ><?php echo $question->question; ?></div>
		<div class="person-description" style='padding-top: 80px;' >
			<?php  foreach($choices = Choice::find_by_question($question->id) as $choice): ?>
				<p><label style="cursor: pointer;font-size: 36px; padding: top: 100px; "  ><input type="radio" name="answer<?php echo $ctr; ?>" id="answer"    value=<?php echo $choice->is_correct; ?>  required='required' /> <?php echo $choice->name; ?></label></p>
			<?php endforeach; $ctr++; ?>
		</div>
	</div>
	<?php endforeach; ?>
	<br />
	<input class="btn red" type="submit"  name='submit' value="Ipasa" style='margin-bottom: 100px;'  />
	
	</form>
	<?php else:?>
	<section id="main">				
		<div class="widget-boxes news">
			<h2>Naipasa mu na ang pasgsusulit na ito ang iyong score ay <span style='color: #FFA500; background: transparent; margin-left: -10px; font-size: 80px !important' ><?php echo $result->score; ?></span> / <?php echo $result->total_number; ?><br /> 
			
		</div>
	</section>
	<?php endif;?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!--<form action="take_quiz_proccess.php?id=<?php echo $id ; ?>" class="form-newsletter"  method="POST">
	<ol class="slider sortable-grid" >
		<ul  >
		<?php foreach($questions as $question): ?>
		<li class="grid-item parties"  >
			<img src='<?php echo $question->image_path(); ?>' ><br />
			<div class="mask"  ><?php 
				$choices = Choice::find_by_question($question->id);
				foreach($choices as $choice):
				?>
				<label style="cursor: pointer; color: #333; font-size: 20px; "  ><input type="radio" name="answer<?php echo $ctr; ?>" id="answer"    value=<?php echo $choice->is_correct; ?>   /> <?php echo $choice->name; ?></label>
				<?php endforeach; ?>
				<?php $ctr++; ?></div>
		</li>
		<?php endforeach; ?>
		</ul>
	</ol>
	<center>
	<input class="btn red" type="submit"  name='submit' value="Subscribe" style='margin-bottom: 100px;'  />
	
	</form>-->
</section>

	<!--<div class="row">
		<div class="col-md-12">
			<p><?php echo $quiz->name; ?></p>
			<form action="take_quiz_proccess.php?id=<?php echo $id ; ?>"  method="POST">

			<ol>
			<?php foreach($questions as $question): ?>
				<li><a href='take_quiz_proccess.php?id=<?php echo $question->id; ?>' ><img src='<?php echo $question->image_path(); ?>'></a></li>
				<?php 
				$choices = Choice::find_by_question($question->id);
			 
				foreach($choices as $choice):
				?>
				<input type="radio" name="answer<?php echo $ctr; ?>" id="answer" value=<?php echo $choice->is_correct; ?>   /> <?php echo $choice->name; ?>
				<?php endforeach; ?>
				<?php $ctr++; ?>
				
			<?php endforeach; ?>
			</ol>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>-->
	
<?php include_layout_template('footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
	  // alert('Testing alert');
	}); 
/*]]>*/
</script>