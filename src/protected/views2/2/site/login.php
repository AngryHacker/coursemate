<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <div data-role='header'data-theme='a'>
            <h1>CourseMate</h1>
        </div>
		<div class="content" data-role='content'>

<img class="img-responsive center-block" src="images/mobilelogo.png" alt="">

<div class="cont">
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'htmlOptions'=>array(
        'data-ajax'=>'false',
    ),
)); ?>

    <div data-role='fieldcontain'>
		<?php echo $form->textField($model,'username',array('placeholder'=>'您的学号')); ?>

		<?php echo $form->passwordField($model,'password',array('placeholder'=>'教务系统密码，默认身份证后8位')); ?>
        <button type='submit' data-ajax=false>登录</button>

    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>
