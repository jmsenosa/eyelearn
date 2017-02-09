<?php 
    require_once("../../../includes/config.php");
    // Initialize Page
    require_once('../../../includes/initialize.php');
    // Check if Logged in. If not the page will go to Signin page
    if (!$session->is_logged_in()) { redirect_to("signin.php"); } 

    if (isset($_GET['id']) && $_GET['id'] != "") {
        
        $parent = Magulang::get_one($_GET['id']);
    }else{
        header('Location: index.php');
    }


    if (isset($_POST['submit'])) { 
        $post = $_POST;
        unset($post['submit']);

        foreach ($post as $key => $value) {
            $parent->{$key} = $value;
        } 

        if ($post['password'] != $post['password2']) {
            $message = "Password didn't match";
        }else{ 

            $parent->save();
            header('Location: index.php');
        }
    }

?>
<?php include_layout_template('sub_header.php'); ?>
<!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-user "></i>Parents <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="../index.php">Dashboard</a></li>
                <li class="active"> List</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Main -->
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Service Tabs -->
            

            <div>
                <div class="tab-pane fade active in" id="service-one">
                    <h3 class="lead" >Parents Table</h3> 
                    <?php if($message):?>
                        <?php if ($message == "Password didn't match"): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><i class="fa fa-exclamation-circle"></i> Warning!</strong> <?php echo output_message($message); ?>
                            </div>                           

                        <?php else: ?>

                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
                            </div>

                        <?php endif ?>
                    <?php else: ?>
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all Your Parents.
                        </div>
                    <?php endif; ?>
                    <div class="container"> 
                        <div class="row">
                            <div class="col-xs-6 col-xs-offset-3">
                                <?php include('form.php'); ?>
                            </div>
                        </div>
                    </div>
 
                </div>

                </div>
            </div>
        </div>



<?php include_layout_template('sub_footer.php'); ?>
<!-- Javascript Declaration -->
<script type="text/javascript">
/*<![CDATA[*/
    $(document).ready(function(){
        $("[rel='tooltip']").tooltip(); 
    }); 
/*]]>*/
</script>