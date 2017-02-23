<?php 
    require_once("../../../includes/config.php");
    // Initialize Page
    require_once('../../../includes/initialize.php');
    // Check if Logged in. If not the page will go to Signin page
    if (!$session->is_logged_in()) { redirect_to("signin.php"); } 

    $parents = Magulang::get_all();
    if (isset($_GET["message"])) {
        $message = $_GET["message"];
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
                         <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
                        </div>
                      <?php else: ?>
                       <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> List of all Your Parents.
                        </div>
                      <?php endif; ?>
                    <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($parents as $parent): ?>
                            <tr>
                                <td></td>
                                <td><?php echo $parent->username ; ?></td>
                                <td><?php echo $parent->first_name ; ?></td>
                                <td><?php echo $parent->last_name ; ?></td>
                                <td><?php echo $parent->email ; ?></td>
                                <td><?php echo $parent->phone ; ?></td>
                                <td class="text-right">
                                    <a class="btn btn-info" role="btn" href="edit.php?id=<?php echo $parent->id; ?>">Update</a>
                                    <a class="btn btn-danger delete-parent" role="btn" href="delete.php?id=<?php echo $parent->id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>

                <a href="create.php" class="btn btn-primary" >  Add</a> 
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

    $(".delete-parent").click(function(){
        r = confirm("Are you sure?");
        if (r == true) {
            return true;
        } else {
            return false;
        }
    });
/*]]>*/
</script>