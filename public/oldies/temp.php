<?php 
	// Initialize Page
	require_once('../includes/initialize.php');
	
	// Find all events
	$events = Event::find_all_post();
	
 ?>
 <?php include_layout_template('header.php'); ?>
 
	<div class="row">
		<div class="col-md-12">
		
		</div>
	</div>
	
<?php include_layout_template('footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
	$(document).ready(function(){
	  // alert('Testing alert');
	}); 
/*]]>*/
</script>