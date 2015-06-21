<?php
/* @var $this CulkController */
/* @var $model Culk */

$this->breadcrumbs=array(
	'Culks'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Culk', 'url'=>array('index')),
	array('label'=>'Create Culk', 'url'=>array('create')),
	array('label'=>'View Culk', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Culk', 'url'=>array('admin')),
);
?>

<h1>Update Culk <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>