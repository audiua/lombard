<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Manage',
);

?>

<div class="title">Manage Articles</div> <a class="btn btn-success" href="<?php echo $this->createUrl('create'); ?>" role="button"> + Створити</a>
<div class="clear"></div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'slug',
		'title',
		'content',
		'thumbnail_ext',
		'create_time',
		/*
		'update_time',
		'public_time',
		'public',
		'category_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
