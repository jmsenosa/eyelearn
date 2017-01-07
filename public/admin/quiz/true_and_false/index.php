<?php 
    require_once('../../../../includes/initialize.php'); 
    if (!$session->is_logged_in()) { redirect_to("signin.php"); } 

    $data = $_GET;  
    $quiz_category_id = (isset($data["quiz_cat"])) ? $data["quiz_cat"]: 3;

    if ( isset($data["id"]) && $data["id"] != "") {
        $lesson_id = $data["id"];
    }else{
        redirect_to("../index.php");
    }



    $quiz_category = Quiz_Category::find_by_id($quiz_category_id); 
    // echo "<pre>"; var_dump($quiz_category ); die(); 
    $obj = 'True or False Quiz'; 
    // include page header 
    include_layout_template('sub_header.php'); 
 ?>

<!-- bread crumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="fa fa-object-group" aria-hidden="true"></i> True or False Quiz
        </h1>
        <ol class="breadcrumb">
            <li><a href="../index.php">Dashboard</a></li>
            <li class="active"> List</li>
        </ol>        
    </div>
</div>

<!-- main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="tab-pane fade active in" id="service-one">
            <h3 class="lead" ><?php echo ucwords($obj); ?> Table</h3> 
            <?php if($message):?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><i class="fa fa-check"></i> Success!</strong> <?php echo output_message($message); ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Create True or False Quiz
                </div>
            <?php endif; ?> 
        </div>
        <div class="table-responsive">
            <div class="well">
                <p><?php echo $quiz_category->description; ?></p>
            </div>
            <form method="post"  enctype="multipart/form-data">
                <table class="table">
                    <tbody>
                        <tr>
                            <th colspan="2" class="text-left">Question</th> 
                        </tr>
                        <tr>
                            <td colspan="2"><textarea class="form-control" required name="question"></textarea></td>
                        </tr>
                        <tr>
                            <th class="text-left">Question background</th>
                            <th class="text-left">Correct Answer</th>
                        </tr>
                        <tr>
                            <td><input type="file" required name="background" accept="image/*" class="form-control"></td>
                            <td> 
                                <select required name="correct_answer" class="form-control">
                                    <option></option>
                                    <option value="true">True</option>
                                    <option value="false">False</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>                            
                            <th colspan="2" class="text-left">Truth Selection</th>
                        </tr>
                        <tr>
                            <td>                                
                                <p>Display Text</p>
                                <input type="text" required name="truth_text" class="form-control">
                            </td>
                            <td>
                                <p>Background/Image</p>
                                <input type="file" required name="true_image" accept="image/*" class="form-control">
                            </td>
                        </tr>                        
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-left">False Selection</th>
                        </tr>
                        <tr>
                            <td>                                
                                <p>Display Text</p>
                                <input type="text" required name="false_text" class="form-control">
                            </td>
                            <td>
                                <p>Background/Image</p>
                                <input type="file" required name="false_image" accept="image/*" class="form-control">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-center">
                                <input type="submit" name="submit" value="submit" class="btn btn-primary">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
</div> 
<?php include_layout_template('sub_footer.php'); ?>