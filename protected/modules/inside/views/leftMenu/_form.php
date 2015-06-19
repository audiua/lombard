<?php
/* @var $this LeftMenuController */
/* @var $model LeftMenu */
/* @var $form CActiveForm */
Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'left-menu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'class'=>"form-horizontal"
    ),
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'page_id', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->dropDownList($model,'page_id', Page::getAll(), array('class'=>'col-md-3 col-lg-3 control-label')); ?>
		<?php echo $form->error($model,'page_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sort', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->textField($model,'sort',array('size'=>60,'maxlength'=>255, 'class'=>'col-md-4 col-lg-4 control-label')); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<div class="col-md-9 col-lg-9">
			<?php
			$this->widget('ImperaviRedactorWidget', array(
			    // You can either use it for model attribute
			    'model' => $model,
			    'attribute' => 'description',
				// 'selector' => '.redactor',

			    // or just for input field
			    // 'name' => 'Knowall_text',

			    // Some options, see http://imperavi.com/redactor/docs/
			    'options' => array(
			    	'buttons'=>array(
	                    'html', 'html','formatting', '|', 'bold', 'italic', 'deleted', '|',
	                    'unorderedlist', 'orderedlist', 'outdent', 'indent', '|','link'
	                ),
			        'lang' => 'ru',
			        'toolbar' => true,
			        'iframe' => true,
			        'css' => 'wym.css',

			    ),
			)); 
			?>
		</div>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<?php

	if( ! $model->isNewRecord ){
		$img = $model->getThumb();

		echo '<div class="form-group" data-image="'.$img.'"><div class="col-md-2 col-lg-2 control-label">';
		echo CHtml::image(Yii::app()->createAbsoluteUrl($img),'', array('width'=>'50px', 'height'=>'50px'));
		echo '<a href="#" class="delete_image" data-img="'.$img.'">delete</a>';
		echo '</div></div>';
	}
?>


	<div class="form-group">
	<div class="col-md-4 col-lg-4 control-label">

	<?php $this->widget('CMultiFileUpload', array(
		'name' => 'images',
		'accept' => 'jpeg|jpg|gif|png', // jpeg|jpg|gif|png // useful for verifying files
		'duplicate' => 'Дублирующиеся фото', // useful, i think
		'denied' => 'Только jpeg', // useful, i think
	)); 

	echo '</div></div>'; ?>

	<div class="clear"></div>
	<div class="form-group">
		<div class="col-md-offset-8 col-lg-offset-8 col-md-2 col-lg-2">
			<?php // echo CHtml::link('Вiдмiнити', '/inside/page/index',array('class'=>'btn btn-default')); ?>
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Обновити',array('class'=>'btn btn-success' )); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">


$('.delete_image').click(function(e){
	e.preventDefault();
	var img = $(this).data('img');
	if(img){
		$.post('/inside/leftMenu/deleteImage',{'image': img}, function(data){
        if (data) {
        	console.log($('[data-image="'+img+'"]'));
        	$('[data-image="'+img+'"]').remove();
        } 
    }, 'json');
	}
});

</script>