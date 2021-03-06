<?php
/* @var $this PostController */
/* @var $model Post */

?>

    <nav class="navbar navbar-fixed-top nav-container">
      <h4 class='text-center'>CourseMate</h4>
       <div class='container'>
             <ul class='nav nav-pills nav-justified tabs' role='tablist'>
                <li role='presentation' class="text-center">
                <a href="?r=post/view&id=<?php echo $post_id;?>&cou=<?php echo $cou_id;?>"><span class="glyphicon glyphicon-hand-right"></span> 返回帖子</a></li>
                <li role='presentation' class="text-center">
                    <a href="?r=course/index"><span class="glyphicon glyphicon-th-large"></span> 我的主页</a></li>
                <li role='presentation' class="text-center">
                    <a href="?r=student/view"><span class="glyphicon glyphicon-hand-right"></span> 我的资料</a></li>
             </ul>
       </div>
    </nav>

    <div class="content" data-role='content'>
      <div class='fix_mob hidden-md hidden-lg'></div>
      <div class="panel panel-warning">
          <div class="panel-heading text-center"><center style='font-size:15px;font-weight:650;'>回复帖子： <?php echo $title;?></center></div>
          <div class="panel-body">
            <?php $this->renderPartial('_form', array('model'=>$model,'post_id'=>$post_id,'cou_id'=>$cou_id)); ?>
        </div>
    </div>
