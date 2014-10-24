<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

?>

<ul data-role='listview'>
<div data-role="header">
<h6><small>课程同学</small></h6>
</div>

<?php

if(count($models))
{
    foreach($models as $model)
    {
        echo "<li><a href='?r=student/view&id={$model->user_id}>'<p style='font-size:14px;'>{$model->grade}&nbsp;&nbsp;&nbsp; {$model->username}</p></a></li>";
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

