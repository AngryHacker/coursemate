<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <div class="form-group col-xs-12">
        <div class="input-group input-group-lg">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-record"></span>
            </div>
            <input type="text" name='Post[title]' id='Post_title' class="form-control form-input" placeholder="帖子标题...">
        </div>
    </div>

    <div class="form-group col-xs-12">
            <textarea rows='6' name='Post[content]' id='Post_content' class="form-control" placeholder="帖子内容..."></textarea>
    </div>

    <button type="submit" class="btn btn-warning btn-block btn-lg center-block" style=''>
        <span><span class="glyphicon glyphicon-pencil"></span> 提交</span>
    </button>

<?php $this->endWidget(); ?>

</div><!-- form -->
