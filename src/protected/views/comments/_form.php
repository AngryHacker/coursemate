<?php
/* @var $this CommentsController */
/* @var $model Comments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'action'=>"?r=comments/create&post_id=$post_id&cou=$cou_id",
)); ?>

<br/>
	<?php echo $form->errorSummary($model); ?>

    <div class="form-group col-xs-12">
            <textarea rows='6' name='Comments[content]' id='Comments_content' class="form-control" placeholder="写下您的评论..."></textarea>
    </div>

    <button type="submit" class="btn btn-warning btn-block btn-lg center-block" style=''>
        <span><span class="glyphicon glyphicon-pencil"></span> 提交</span>
    </button>


<?php $this->endWidget(); ?>

</div><!-- form -->

