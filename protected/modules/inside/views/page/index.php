<div class="title">Manage Articles</div> <a class="btn btn-success" href="<?php echo $this->createUrl('create'); ?>" role="button"> + Створити</a>
<div class="clear"></div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'slug',
		'title',

		'create_time',
		/*
		'update_time',
		'description',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>