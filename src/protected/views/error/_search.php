<?php
/* @var $this ErrorController */
/* @var $model Error */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'er_id'); ?>
		<?php echo $form->textField($model,'er_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>60,'maxlength'=>124)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'psw'); ?>
		<?php echo $form->textField($model,'psw',array('size'=>60,'maxlength'=>124)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->