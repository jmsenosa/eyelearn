<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Find all events
	$lessons = Lesson::find_all();
	
 ?>
  <?php include_layout_template('header.php'); ?>
 
	<section id="main">
		<div class="tabs">
			<ul class="filter-controls">
				<?php foreach($lessons as $lesson):?>
				<form id="my_form" method="post" action="lesson.php?id=<?php echo $lesson->id; ?>">
					<li><a href="javascript:{}" data-filter=".<?php echo $lesson->name; ?>" onclick="document.getElementById('my_form').submit();"><?php echo $lesson->name; ?></a></li>
				</form>
				<?php endforeach; ?>
			</ul>
		</div>
		
		<ul class="slider sortable-grid">
			<?php foreach($lessons as $lesson):?>
			<li>
				<ul id="nav-two">
				<li class="grid-item animal">
					<a href="#"><img src="images/lesson/aso.png" alt="" />	
					<div class="mask"></div></a>
					<audio id="beep-two" style='visibility: hidden;' controls preload="auto">
						<source src="audio/aso.mp3" controls></source>
						Your browser isn't invited for super fun time.
					</audio>
				</li>	
				
			</li>
			<?php endforeach; ?>
		</ul>
	</section>
	
<?php include_layout_template('footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$("#nav-two a")
  .each(function(i) {
    if (i != 0) { 
      $("#beep-two")
        .clone()
        .attr("id", "beep-two" + i)
        .appendTo($(this).parent()); 
    }
    $(this).data("beeper", i);
  })
  .mouseenter(function() {
    $("#beep-two" + $(this).data("beeper"))[0].play();
  });
$("#beep-two").attr("id", "beep-two0");
/*]]>*/
</script>


				
			