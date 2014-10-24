<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

?>


    <div class="panel panel-warning">
        <div class="panel-heading text-center">
            <center style='font-size:15px;font-weight:650;'>课程同学 : <?php echo $topic; ?></center>
        </div>
        <div class="panel-body post">
            <div class='list-group'>

<?php

if(count($models))
{
    foreach($models as $model)
    {
        echo "<a class='list-group-item' href='?r=student/view&id={$model->user_id}'><p style='font-size:14px;'>{$model->grade}&nbsp;&nbsp;&nbsp; {$model->username}</p></a>";
    }
    if($pre)
        echo "<a href='?r=post/index&page=$pre' data-role='button'>上一页</a>";
    if($next)
        echo "<a href='?r=post/index&page=$next' data-role='button'>下一页</a>";
}
else
{
    echo "<div style='height:100px'><center style='margin:auto'>见鬼了！居然没有人！</center></div>";
}

?>
            </div>
        </div>
    </div>
