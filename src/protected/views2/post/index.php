<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

?>

        <div data-role='panel' id='more' data-position='left' data-display='reveal' data-theme='a' class='ui-panel ui-panel-position-left'>
          <a href='' data-rel='close' style='margin-top:30px;' class='ui-btn ui-shadow ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-left'>返回</a>
          <button data-theme='b' style='margin-top:30px;'>评价老师</button>
          <a data-role='button' data-theme='b' style='margin-top:30px;' href='?r=student/index&cou_id=<?php echo $cou_id;?>'>查看同学</a>
        </div>



        <div data-role='header'data-theme='a'>
            <h1>CourseMate</h1>
            <div data-role="navbar">
              <ul>
                <li><a href="#" data-rel="back" data-icon="arrow-l" data-theme='b' class="nav">返回</a></li>
                <li><a href="?r=course/index" data-icon="home"  data-theme='b' class="nav" data-prefetch="ture">我的主页</a></li>
                <li><a href="?r=post/create&cou_id=<?php echo $cou_id;?>" data-icon="arrow-r" data-theme='b' class="nav">我要发帖</a></li>
              </ul>
            </div>
        </div>
		<div class="content" data-role='content'>

<ul data-role='listview'>
<div data-role="header">
<h6><small>帖子列表</small></h6>
    <a href="#more" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all">更多</a>
</div>

<?php

if(count($models))
{
    foreach($models as $model)
    {
        echo "<li><a href='?r=post/view&id={$model->post_id}'data-ajax=false>";
        echo "<p><big><b>{$model->title}</b></big></p>";
        echo "<p>发贴人：{$model->author->username}</p>";
        echo "</a></li>";
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
