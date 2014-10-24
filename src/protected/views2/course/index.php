<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Courses',
);

$this->menu=array(
	array('label'=>'Create Course', 'url'=>array('create')),
	array('label'=>'Manage Course', 'url'=>array('admin')),
);
?>

<ul data-role='listview'>
<li data-role="list-divider"><center><h2>course</h2></center></li>
</ul>

<div class="cont">
<ul data-role='listview'>
<?php
foreach($courseArray as $course)
{
    echo "<li><a href='?r=post/index&cou_id={$course->cou_id}&page=1' data-ajax=false>";
    echo "<p><b>{$course->course_name}</b></p>";
    echo "<p>{$course->tea->tea_name}</p>";
    echo "<p>{$course->time}</p>";
    echo "</a></li>";
}
?>
</ul>

</div>
