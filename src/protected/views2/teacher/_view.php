<?php
/* @var $this TeacherController */
/* @var $data Teacher */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tea_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tea_id), array('view', 'id'=>$data->tea_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tea_name')); ?>:</b>
	<?php echo CHtml::encode($data->tea_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school')); ?>:</b>
	<?php echo CHtml::encode($data->school); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />


</div>