<?php
/* @var $this ErrorController */
/* @var $data Error */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('er_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->er_id), array('view', 'id'=>$data->er_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('psw')); ?>:</b>
	<?php echo CHtml::encode($data->psw); ?>
	<br />


</div>