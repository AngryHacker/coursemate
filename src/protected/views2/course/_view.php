<?php
/* @var $this CourseController */
/* @var $data Course */
?>

<ul data-role='listview'>
<li><a href=''>
<div class="view">

	<?php echo CHtml::encode($data->course_name); ?>
	<br />

	<?php echo CHtml::encode($data->time); ?>
	<br />

	<?php echo CHtml::encode($data->tea_id); ?>
	<br />


</div></a>
</li>
</ul>
