<?php
/* @var $this CommentsController */
/* @var $model Comments */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Comments', 'url'=>array('index')),
	array('label'=>'Manage Comments', 'url'=>array('admin')),
);
?>

        <div data-role='header'data-theme='a'>
            <h1>CourseMate</h1>
            <div data-role="navbar">
              <ul>
                <li><a href="#" data-rel="back" data-icon="arrow-l" data-theme='b' class="nav">返回</a></li>
                <li><a href="?r=course/index" data-icon="home"  data-theme='b' class="nav" data-prefetch="ture">我的主页</a></li>
                <li><a href="?r=post/view&id=<?php echo $post_id;?>" data-icon="arrow-r" data-theme='b' class="nav">查看帖子</a></li>
              </ul>
            </div>
        </div>
		<div class="content main" data-role='content'>

<ul data-role='listview'>
<li data-role="list-divider"><center><h2>回复帖子： <?php echo $title;?></h2></center></li>
</ul>

<div class="cont">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
</div>
