<?php
/* @var $this PostController */
/* @var $model Post */

?>

        <div data-role='header'data-theme='a'>
            <h1>CourseMate</h1>
            <div data-role="navbar">
              <ul>
                <li><a href="#" data-rel="back" data-icon="arrow-l" data-theme='b' class="nav">返回</a></li>
                <li><a href="?r=course/index" data-icon="home"  data-theme='b' class="nav" data-prefetch="ture">我的主页</a></li>
                <li><a href="?r=comments/create&post_id=<?php echo $model->post_id;?>" data-icon="arrow-r" data-theme='b' class="nav">我要评论</a></li>
              </ul>
            </div>
        </div>
		<div class="content" data-role='content'>

    <ul data-role='listview'>
        <li data-role="list-divider"><center style='font-size:15px;font-weight:650;'><?php echo $model->title;?></center>
        <center  style='font-size:13px;font-weight:500;margin-top:10px;'>发贴人：<?php echo "<a data-ajax=false href='?r=student/view&id={$model->author_id}'>";
            echo $model->author->username;?></a>
        &nbsp;&nbsp;发帖时间：<?php echo date('Y-m-d H:i:s',$model->create_time);?></center>
        </li>

      <div class='custom-corners ui-corner-all post'>
        <div class='ui-body ui-body-a'>
          <p><?php echo $model->content;?></p>
        </div>
    </div>

    <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-theme='b'>
    <h3 style="color:#eee !important;">查看评论</h3>

<?php
if(count($comments))
{
    $i = 0;
    foreach($comments as $comment)
    {
        $i ++;
        echo "<div class='custom-corners ui-corner-all item'>";
        echo "<div class='ui-bar ui-bar-a'>";
        $time = date("Y-m-d H:i:s",$comment->create_time);
        echo "<small>{$i} 楼 {$comment->author->username} {$time} 发表</small></div>";
        echo "<div class='ui-body ui-body-a'>";
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

