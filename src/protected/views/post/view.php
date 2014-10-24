<?php
/* @var $this PostController */
/* @var $model Post */

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/comment.js',CClientScript::POS_HEAD);
?>

    <nav class="navbar navbar-fixed-top nav-container">
      <h4 class='text-center'>CourseMate</h4>
       <div class='container'>
             <ul class='nav nav-pills nav-justified tabs' role='tablist'>
                <li role='presentation' class="text-center">
                <a href="?r=post/index&cou_id=<?php echo $cou_id;?>"><span class="glyphicon glyphicon-hand-right"></span> 返回课程</a></li>
                <li role='presentation' class="text-center">
                    <a href="?r=course/index"><span class="glyphicon glyphicon-th-large"></span> 我的主页</a></li>
                <li role='presentation' class="text-center">
                <a href="?r=comments/create&post_id=<?php echo $model->post_id;?>&cou=<?php echo $cou_id;?>"><span class="glyphicon glyphicon-pencil"></span> 我要评论</a></li>
             </ul>
       </div>
    </nav>

    <div class="content" data-role='content'>
      <div class='fix_mob hidden-md hidden-lg'></div>

    <div class="panel panel-warning">
        <div class="panel-heading text-center">
            <center style='font-size:15px;font-weight:650;'><?php echo $model->title;?></center>
            <center  style='font-size:13px;font-weight:500;margin-top:10px;'>发贴人：<?php echo "<a data-ajax=false href='?r=student/view&id={$model->author_id}'>";
                echo $author_name;?></a>
            &nbsp;&nbsp;发帖时间：<?php echo date('Y-m-d H:i:s',$model->create_time);?></center>
        </div>
        <div class="panel-body post">
            <p><?php echo $model->content; ?></p>
        </div>
    </div>

    <div class="panel panel-default">
        <button class='btn btn-lg btn-block' id='isDisplay'>查看评论</button>
        <div class="panel-body" id='area'>

<?php
if(count($comments))
{
    $i = 0;
    foreach($comments as $comment)
    {
        $comment_name = $comment->author->nickname;
        if(!$comment_name) $comment_name = $comment->author->username;

        $i ++;
        echo "<div class='panel'>";
        echo "<div class='panel-heading' style='background:#EEE;'>";
        $time = date("Y-m-d H:i:s",$comment->create_time);
        echo "<small>{$i} 楼 <a href='?r=student/view&id={$comment->author_id}'>{$comment_name}</a> {$time} 发表</small></div>";
        echo "<div class='panel-body'>";
        echo "<p>{$comment->content}</p>";
        echo "</div></div>";
    }
}
else
{
    echo "<samll>暂无评论</small>";
}
?>

    </div>
    </ul>

    </div>
</div>

