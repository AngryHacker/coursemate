<?php
/* @var $this MessageController */
/* @var $data Message */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('me_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->me_id), array('view', 'id'=>$data->me_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fr_id')); ?>:</b>
	<?php echo CHtml::encode($data->fr_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('send_time')); ?>:</b>
	<?php echo CHtml::encode($data->send_time); ?>
	<br />


</div>