<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

?>

    <nav class="navbar navbar-fixed-top nav-container">
      <h4 class='text-center'>CourseMate</h4>
       <div class='container'>
             <ul class='nav nav-pills nav-justified tabs' role='tablist'>
                <li role='presentation' class="text-center">
                    <a href="?r=student/view"><span class="glyphicon glyphicon-hand-right"></span> 我的资料</a></li>
                <li role='presentation' class="text-center">
                    <a href="?r=course/index"><span class="glyphicon glyphicon-th-large"></span> 我的主页</a></li>
                <li role='presentation' class="text-center">
                    <a href="?r=post/create&cou_id=<?php echo $cou_id;?>"><span class="glyphicon glyphicon-hand-right"></span> 我要发帖</a></li>
             </ul>
       </div>
    </nav>

    <div class="content" data-role='content'>
      <div class='fix_mob hidden-md hidden-lg'></div>

    <div class="panel panel-warning">
        <div class="panel-heading text-center">帖子列表
            <div class='btn-group pull-right'>
                <button type='button' role='presentation' class="btn btn-warning dropdown-toggle btn-sm" data-toggle='dropdown'>
                    更多<span class='caret'></span>
                </button>
                <ul class='dropdown-menu' role='menu'>
                   <li><a href='?r=student/index&cou_id=<?php echo $cou_id;?>'>我的同学</a></li>
                </ul>
           </div>
       </div>
        <div class="panel-body">
            <div class='list-group'>


<?php

if(count($models))
{
    foreach($models as $model)
    {
        $time = date('Y-m-d H:i:s',$model->create_time);
        $author_name = $model->author->nickname;
        if(!$author_name) $author_name = $model->author->username;

        echo "<a href='?r=post/view&id={$model->post_id}&cou={$cou_id}' class='list-group-item'>";
        echo "<p><b>{$model->title}</b></p><span class='glyphicon glyphicon-chevron-right pull-right'></span>";
        echo "<p><small>童鞋：{$author_name}</small></p>";
        echo "<p><small>时间：{$time}</small></p>";
        echo "</a>";
    }
    if($pre)
        echo "<a href='?r=post/index&page=$pre' data-role='button'>上一页</a>";
    if($next)
        echo "<a href='?r=post/index&page=$next' data-role='button'>下一页</a>";
}
else
{
    echo "<div style='height:100px'><center style='margin:auto'>本主题还没有人发帖哦！快来抢沙发吧！</center></div>";
}

?>

</div>
