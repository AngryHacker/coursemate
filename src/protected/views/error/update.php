<?php
/* @var $this ErrorController */
/* @var $model Error */

$this->breadcrumbs=array(
	'Errors'=>array('index'),
	$model->er_id=>array('view','id'=>$model->er_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Error', 'url'=>array('index')),
	array('label'=>'Create Error', 'url'=>array('create')),
	array('label'=>'View Error', 'url'=>array('view', 'id'=>$model->er_id)),
	array('label'=>'Manage Error', 'url'=>array('admin')),
);
?>

<h1>Update Error <?php echo $model->er_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>