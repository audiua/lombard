<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */

$this->breadcrumbs=array(
	'Left Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LeftMenu', 'url'=>array('index')),
	array('label'=>'Manage LeftMenu', 'url'=>array('admin')),
);
?>

<h1>Create LeftMenu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>