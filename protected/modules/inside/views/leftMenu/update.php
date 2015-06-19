<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */

$this->breadcrumbs=array(
	'Left Menus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LeftMenu', 'url'=>array('index')),
	array('label'=>'Create LeftMenu', 'url'=>array('create')),
	array('label'=>'View LeftMenu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LeftMenu', 'url'=>array('admin')),
);
?>

<h1>Update LeftMenu <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>