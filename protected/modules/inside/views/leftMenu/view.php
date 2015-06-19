<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */

$this->breadcrumbs=array(
	'Left Menus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LeftMenu', 'url'=>array('index')),
	array('label'=>'Create LeftMenu', 'url'=>array('create')),
	array('label'=>'Update LeftMenu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LeftMenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LeftMenu', 'url'=>array('admin')),
);
?>

<h1>View LeftMenu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'page_id',
		'description',
		'create_time',
		'update_time',
	),
)); ?>
