<?php
/* @var $this CulkController */
/* @var $model Culk */

$this->breadcrumbs=array(
	'Culks'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Culk', 'url'=>array('index')),
	array('label'=>'Create Culk', 'url'=>array('create')),
	array('label'=>'Update Culk', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Culk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Culk', 'url'=>array('admin')),
);
?>

<h1>View Culk #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'price',
		'procent',
		'create_time',
		'update_time',
	),
)); ?>
