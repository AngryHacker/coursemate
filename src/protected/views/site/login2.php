<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/login.css');
?>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <nav class="navbar nav-container">
       <div class='container'>
           <div class='row'>
              <h4 class='text-center'>CourseMate</h4>
           </div>
       </div>
    </nav>

    <div class="content">

       <div class='container'>
           <div class='row'>

        <img class="img-responsive center-block" id="login-logo" src="images/mobilelogo.png" alt="">

        <div class="form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                'validateOnSubmit'=>true,
                ),
            )); ?>

        <div>

          <div class="form-group col-xs-12">
            <div class="input-group input-group-lg">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </div>
              <input type="text" name='LoginForm[username]' id='LoginForm_username' class="form-control form-input" placeholder="您的学号">
            </div>
          </div>

          <div class="form-group col-xs-12">
            <div class="input-group input-group-lg">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-eye-close"></span>
              </div>
              <input type="password" name='LoginForm[password]' id='LoginForm_password' class="form-control form-input" placeholder="教务系统密码，默认身份证后8位">
            </div>
          </div>

            <button type="submit" class="btn btn-warning btn-block btn-lg center-block" style='width:50%'>
              <span><span class="glyphicon glyphicon-log-in"></span> 登录</span>
            </button>

        </div>

        <?php $this->endWidget(); ?>

        </div><!-- form -->
        </div>
        </div>
    </div>
