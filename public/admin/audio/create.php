<?php
	// Initialize Page
	require_once('../../../includes/initialize.php');
	
	// Check if Logged in. If not the page will go to Signin page
	if (!$session->is_logged_in()) { redirect_to("signin.php"); }
	



?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">  <?php echo (isset($obj)) ? ucwords($obj) : $_GET['folder']; ?> <small></small></h1>
		<ol class="breadcrumb">
			<li><a href="../index.php"> Dashboard</a></li>
			<li><a href="index.php"> Folder</a></li>
			<li class="active"> Add</li>
		</ol>
	</div>
</div>
<!-- /.row -->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="image_upload_div">
                <form action="upload.php" class="dropzone" id="dropzone">
                    <input type="hidden" value="<?php echo $_GET['folder'] ?>" name="folder">
                </form>
            </div>
		</div>
	</div>
<!-- mute -->
<?php include_layout_template('sub_footer.php'); ?>
<script type="text/javascript">
    Dropzone.options.dropzone = {
        acceptedFiles: "audio/*",
        init: function() {
            this.on("addedfile", function(file) {
                if (this.files.length) {
                    var _i, _len;
                    for (_i = 0, _len = this.files.length; _i < _len - 1; _i++) // -1 to exclude current file
                    {
                        if( this.files[_i].name === file.name && 
                        this.files[_i].size === file.size && 
                        this.files[_i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
                                
                            this.removeFile(file);
                        }
                    }
                }
            });
        }
    }
    
   
 </script>
		
