<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

        <div data-role='header'data-theme='a'>
            <h1>CourseMate</h1>
            <div data-role="navbar">
              <ul>
                <li><a href="#" data-rel="back" data-icon="arrow-l" data-theme='a' class="nav">返回</a></li>
                <li><a href="?r=course/index" data-icon="home"  data-theme='a' class="nav" data-prefetch="ture">我的主页</a></li>
                <li><a href="?r=post/create&cou_id=<?php echo $cou_id;?>" data-icon="arrow-r" data-theme='a' class="nav">我要发帖</a></li>
              </ul>
            </div>
        </div>
		<div class="content" data-role='content'>

<ul data-role='listview'>
<li data-role="list-divider"><center>主题</center></li>

<div class='cont'>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</ul>
</div>
</div>
