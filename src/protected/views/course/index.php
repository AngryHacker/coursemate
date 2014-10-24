<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

?>

<div class="panel panel-warning">
    <div class="panel-heading text-center">course</div>
    <div class="panel-body">
        <div class='list-group'>
        <?php
            foreach($courseArray as $course)
            {
                echo "<a href='?r=post/index&cou_id={$course->cou_id}&page=1' class='list-group-item'>";
                echo "<p><b>{$course->course_name}</b></p><span class='glyphicon glyphicon-chevron-right pull-right'></span>";
                echo "<p>{$course->tea->tea_name}</p>";
                echo "<p>{$course->time}</p>";
                echo "</a>";
            }
        ?>
        </div>
    </div>
</div>
