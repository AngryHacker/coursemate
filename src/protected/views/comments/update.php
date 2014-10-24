<?php
/* @var $this CommentsController */
/* @var $model Comments */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->com_id=>array('view','id'=>$model->com_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comments', 'url'=>array('index')),
	array('label'=>'Create Comments', 'url'=>array('create')),
	array('label'=>'View Comments', 'url'=>array('view', 'id'=>$model->com_id)),
	array('label'=>'Manage Comments', 'url'=>array('admin')),
);
?>

<h1>Update Comments <?php echo $model->com_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>