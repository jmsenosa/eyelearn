<div class="bg-success"><span style="font-size: 18px;">STUDENT INFORMATION</span></div>
<div class="bordered">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">

        <?php $counter = 0; ?>
        <?php foreach ($periods as $period): ?>
            <li role="presentation" class="<?php echo ($counter == 0) ? 'active': '';?>">
                <?php $name = str_replace(" ","-",ucwords($period->name));  ?>  
                <a href="#<?php echo $name; ?>" aria-controls="<?php echo $name; ?>" role="tab" data-toggle="tab">
                    <?php echo $period->name; ?>
                </a>
            </li>
            <?php $counter = $counter + 1; ?>
        <?php endforeach ?> 
    </ul>
    <!-- Tab panes -->
    <div class="row">
        <div class="col-xs-12">
            <div class="tab-content">
                <?php $counter = 0; ?>
                <?php foreach ($periods as $period): ?>                                   
                    <?php $params = [" lesson.grading_quarter_id "=>$period->id, "student.id" => $student->id]; ?>
                    <?php #dd($grading); ?>
                    <?php $name = str_replace(" ","-",ucwords($period->name));  ?>  
                    <div role="tabpanel" class="tab-pane <?php echo ($counter == 0) ? 'active': '';?>" id="<?php echo $name; ?>">
                        <div class="container-fluid">
                            <br>
                            <h4><?php echo $name." Period"; ?></h4>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><h5><b>LESSONS</b></h5></p>
                                    <span class="label label-success">ONGOING</span>
                                    <span class="label label-warning">PENDING</span>
                                    <span class="label label-danger">DONE</span> 
                                </div>
                                <div class="col-sm-12 text-right">
                                    <hr/>
                                </div>
                                <div class="col-sm-12">
                                    <?php include 'lessons_quiz.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $counter = $counter + 1; ?>
                <?php endforeach ?>  
            </div>
        </div>
    </div>
</div>