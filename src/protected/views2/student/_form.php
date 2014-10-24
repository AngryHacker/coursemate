<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<ul data-role='listview'>
<li data-role="list-divider"><center><h2>更新我的资料</h2></center></li>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'data-ajax'=>'false',
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row" style='margin-top:0.8em;'>
		<?php echo $form->labelEx($model,'nickname'); ?>
		<?php echo $form->textField($model,'nickname',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nickname'); ?>
	</div>

	<div class="row" style='margin-top:0.8em;'>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row" style='margin-top:0.8em;'>
		<?php echo $form->labelEx($model,'signature'); ?>
		<?php echo $form->textField($model,'signature',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'signature'); ?>
	</div>

	<div class="row buttons" style='margin-top:1.2em;'>
        <button type='submit'>保存</button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
