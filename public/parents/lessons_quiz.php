<?php  
    $lessons = Lesson::get_by_quarter_by_teacher($period->id, $student->teacher_id);

    $grouped_lessons = [
        "ongoing" => ["color"=>"#2ecc71", "data" => []],
        "pending" => ["color"=>"#f1c40f", "data" => []],
        "done" => ["color"=>"#e74c3c", "data" => []]
    ];

    foreach ( $lessons as $lesson ) {
        if ( strtotime($lesson->description) <= strtotime(date("Y-m-d")) && $lesson->isDone == 0) {
            $grouped_lessons["ongoing"]["data"][] = $lesson;
        }
        elseif ( ( strtotime($lesson->description) > strtotime(date("Y-m-d")) || strtotime($lesson->description) < strtotime(date("Y-m-d"))) && $lesson->isDone == 0) {
            $grouped_lessons["pending"]["data"][] = $lesson;
        } 
        elseif($lesson->isDone == 1){
            $grouped_lessons["done"]["data"][] = $lesson;

        }
    }
?>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <?php foreach ($grouped_lessons as $type => $value): ?> 
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo str_replace(" ","-",$type) ; ?>" style="background: <?php echo $value['color']; ?>">
                    <h4 class="panel-title" style="color: #FFF !important;">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo str_replace(" ","-",$type) ; ?>" aria-expanded="true" aria-controls="<?php echo str_replace(" ","-",$type) ; ?>">
                            <?php echo ucfirst($type); ?>
                        </a>
                    </h4>
                </div>
                <div id="<?php echo str_replace(" ","-",$type) ; ?>" class="panel-collapse collapse <?php echo ($type == "ongoing") ? "in" : ""; ?>" role="tabpanel" aria-labelledby="heading<?php echo str_replace(" ","-",$type) ; ?>">
                    <div class="panel-body">
                        <?php foreach ($value["data"] as $lesson): ?>
                            <p><b><?php echo ucfirst($lesson->name); ?> Quizes</b></p>
                            <?php $studentall = new StudentAll() ?>
                            <?php $quiz_takes = $studentall->quiz_takes($lesson); ?>
                            <?php if ( count($quiz_takes) > 0 ): ?>                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Quiz #</th>
                                            <th class="text-center">First Take</th>
                                            <th class="text-center">Second Take</th>
                                            <th class="text-center">Third Take</th>
                                            <th class="text-center">Questions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($quiz_takes as $num => $data): ?>
                                            <tr>
                                                <th class="text-center"><?php echo $num; ?></th>
                                                <?php foreach ($data as $key => $value): ?>
                                                    <td class="text-center"><?php echo $value; ?></td>
                                                <?php endforeach ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div>No quiz found</div>
                            <?php endif ?>
                            <hr>
                        <?php endforeach ?>
                    </div>
                </div>
            </div> 
        <?php endforeach ?>
    </div> 