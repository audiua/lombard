<?php
/* @var $this CulkController */
/* @var $model Culk */

$this->breadcrumbs=array(
	'Culks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Culk', 'url'=>array('index')),
	array('label'=>'Manage Culk', 'url'=>array('admin')),
);
?>

<h1>Create Culk</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>