<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

    <div class="content" data-role='content'>
      <div class='fix_mob hidden-md hidden-lg'></div>
      <div class="panel panel-warning">
          <div class="panel-heading text-center"><center style='font-size:15px;font-weight:650;'>更新我的资料</center></div>
          <div class="panel-body">

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

    <div class="form-group col-xs-12">
        <div class="input-group input-group-lg">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </div>
            <!-- <input type="text" name='Student[nickname]' id='Student_nickname' class="form-control form-input" placeholder='昵称'>-->
            <?php echo $form->textField($model,'nickname',array('maxlength'=>32,'class'=>'form-control form-input','placeholder'=>'昵称')); ?>
        </div>
    </div>

    <div class="form-group col-xs-12">
        <div class="input-group input-group-lg">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-envelope"></span>
            </div>
            <?php echo $form->textField($model,'email',array('maxlength'=>128,'class'=>'form-control form-input','placeholder'=>'邮箱')); ?>
            <!-- <input type="text" name='Student[email]' id='Student_email' class="form-control form-input" placeholder='邮箱'>-->
        </div>
    </div>

    <div class="form-group col-xs-12">
        <div class="input-group input-group-lg">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-italic"></span>
            </div>
            <?php echo $form->textField($model,'signature',array('maxlength'=>64,'class'=>'form-control form-input','placeholder'=>'签名')); ?>
            <!-- <input type="text" name='Student[signature]' id='Student_signature' class="form-control form-input" placeholder='签名'> -->
        </div>
    </div>

    <button type="submit" class="btn btn-warning btn-block btn-lg center-block" style=''>
        <span><span class="glyphicon glyphicon-pencil"></span> 提交</span>
    </button>

<?php $this->endWidget(); ?>

</div><!-- form -->

        </div>
    </div>
